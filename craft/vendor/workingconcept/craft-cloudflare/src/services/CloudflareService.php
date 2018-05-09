<?php
/**
 * Cloudflare plugin for Craft CMS 3.x
 *
 * Purge Cloudflare caches from Craft.
 *
 * @link      https://workingconcept.com
 * @copyright Copyright (c) 2017 Working Concept
 */

namespace workingconcept\cloudflare\services;

use workingconcept\cloudflare\Cloudflare;

use Craft;
use craft\base\Component;
use GuzzleHttp\Client;
use stdClass;

/**
 * @author    Working Concept
 * @package   Cloudflare
 * @since     1.0.0
 */
class CloudflareService extends Component
{

    /**
     * @var \workingconcept\cloudflare\models\Settings
     */
    public $settings;

    /**
     * @var string
     */
    protected $apiBaseUrl;

    /**
     * @var \GuzzleHttp\Client
     */
    protected $client;

    /**
     * @var boolean
     */
    protected $isConfigured;

    /**
     * Initializes the service.
     *
     * @return void
     */
    public function init()
    {
        parent::init();

        // populate the settings
        $this->settings = Cloudflare::$plugin->getSettings();

        // set the Cloudflare API base URL
        $this->apiBaseUrl = 'https://api.cloudflare.com/client/v4/';

        $apiKey = ! empty(Craft::$app->request->getParam('apiKey')) ? Craft::$app->request->getParam('apiKey') : $this->settings->apiKey;
        $email = ! empty(Craft::$app->request->getParam('email')) ? Craft::$app->request->getParam('email') : $this->settings->email;

        $this->isConfigured = ! empty($apiKey) && ! empty($email);

        if ($this->isConfigured)
        {
            $this->client = new \GuzzleHttp\Client([
                'base_uri' => $this->apiBaseUrl,
                'headers' => [
                    'X-Auth-Key'   => $apiKey,
                    'X-Auth-Email' => $email,
                    'Content-Type' => 'application/json',
                    'Accept'       => 'application/json'
                ],
                'verify' => false,
                'debug' => false
            ]);
        }
    }


    /**
     * Get a list of zones (domains) available for the provided Cloudflare account.
     * https://api.cloudflare.com/#zone-list-zones
     *
     * @return array Cloudflare's response
     */

    public function getZones()
    {
        if ( ! $this->isConfigured)
        {
            return;
        }

        Craft::trace('Getting zones.', __METHOD__);

        try
        {
            $response = $this->client->get('zones');

            if ( ! $response->getStatusCode() == 200)
            {
                Craft::trace('Request failed: ' . $response->getBody(), 'cloudflare');
                return (object) [ 'result' => [] ];
            }
            else
            {
                Craft::trace('Retrieved zones.', 'cloudflare');
            }

            return json_decode($response->getBody(true));
        }
        catch (RequestException $exception)
        {
            // if there is a response, we'll use it's body, otherwise we default to the request URI
            $reason = ( $exception->hasResponse()
                ? $exception->getResponse()->getBody()
                : $exception->getRequest()->getUri()
            );

            Craft::trace('Request failed: ' . $reason, 'cloudflare');

            return (object) [ 'result' => [] ];
        }
    }


    /**
     * Purge the entire zone cache.
     * https://api.cloudflare.com/#zone-purge-all-files
     *
     * @return array Cloudflare's response
     */

    public function purgeZoneCache()
    {
        try
        {
            $response = $this->client->delete(
                sprintf('zones/%s/purge_cache', $this->settings->zone),
                [
                    'body' => json_encode(['purge_everything' => true])
                ]
            );

            $responseBody = json_decode($response->getBody(true));

            if ( ! $response->getStatusCode() == 200)
            {
                Craft::trace('Request failed: ' . json_encode($responseBody), 'cloudflare');
                return (object) [ 'result' => [] ];
            }
            else
            {
                Craft::trace(sprintf('Purged entire zone cache (%s)', $responseBody->result->id), 'cloudflare');
            }

            return $responseBody;
        }
        catch(RequestException $exception)
        {
            // if there is a response, we'll use it's body, otherwise we default to the request URI
            $reason = ( $exception->hasResponse()
                ? $exception->getResponse()->getBody()
                : $exception->getRequest()->getUri()
            );

            Craft::trace('Request failed: ' . $reason, 'cloudflare');
            return (object) [ 'result' => [] ];
        }
    }


    /**
     * Clear specific URLs in Cloudflare's cache.
     * https://api.cloudflare.com/#zone-purge-individual-files-by-url-and-cache-tags
     *
     * @param  array  $urls  array of absolute URLs
     *
     * @return mixed  API response object or null
     */

    public function purgeUrls(array $urls = [], array $tags = []): stdClass
    {
        // trim whitespace from each URL
        $urls = array_map('trim', $urls);

        // remove any invalid URLs
        for ($i=0; $i < count($urls); $i++)
        {
            if (filter_var($urls[$i], FILTER_VALIDATE_URL) === false)
            {
                unset($urls[$i]);
            }
        }

        // don't do anything if URLs are missing
        if (count($urls) === 0)
        {
            Craft::trace('No valid URLs provided for purge.', 'cloudflare');
            return (object) [ 'result' => [] ];
        }

        // TODO: make sure attempts match zone

        try
        {
            $response = $this->client->delete(sprintf('zones/%s/purge_cache', $this->settings->zone), [
                'body' => json_encode(['files' => $urls])
            ]);

            $responseBody = json_decode($response->getBody(true));

            if ( ! $response->getStatusCode() == 200)
            {
                Craft::trace('Request failed: ' . json_encode($responseBody), 'cloudflare');
                return (object) [ 'result' => [] ];
            }
            else
            {
                Craft::trace('Purged URLs ('.$responseBody->result->id.').' . "\n\t" . implode("\n\t", $urls), 'cloudflare');
            }

            return $responseBody;
        }
        catch(\GuzzleHttp\Exception\ClientException $exception)
        {
            return $this->handleApiException($urls, $exception);
        }
        catch(RequestException $exception)
        {
            return $this->handleApiException($urls, $exception);
        }
    }

    public function getApiBaseUrl(): string
    {
        return $this->apiBaseUrl;
    }

    private function handleApiException($urls, $exception)
    {
        if ($responseBody = json_decode($exception->getResponse()->getBody(true)))
        {
            $message = "URL purge failed.\n";
            $message .= "- urls: " . implode($urls, ',') . "\n";

            foreach ($responseBody->errors as $error)
            {
                $message .= "- error code {$error->code}: " . $error->message . "\n";
            }

            Craft::trace($message, 'cloudflare');

            return (object) [ 'result' => [] ];
        }
        else
        {
            $reason = ( $exception->hasResponse()
                ? $exception->getResponse()->getBody()
                : $exception->getRequest()->getUri()
            );

            Craft::trace('Request failed: ' . $reason, 'cloudflare');

            return (object) [ 'result' => [] ];
        }

        return $responseBody;
    }

}
