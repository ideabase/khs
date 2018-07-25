<?php

$vendorDir = dirname(__DIR__);

return array (
  'firstborn/migrationmanager' => 
  array (
    'class' => 'firstborn\\migrationmanager\\MigrationManager',
    'basePath' => $vendorDir . '/firstborn/migrationmanager/src',
    'handle' => 'migrationmanager',
    'aliases' => 
    array (
      '@firstborn/migrationmanager' => $vendorDir . '/firstborn/migrationmanager/src',
    ),
    'name' => 'Migration Manager',
    'version' => '3.0.5',
    'description' => 'Quickly create migrations for settings and content at the click of a mouse.',
    'developer' => 'FirstBorn',
    'developerUrl' => 'https://firstborn.com',
    'documentationUrl' => 'https://github.com/Firstborn/Craft-Migration-Manager/blob/master/README.md',
    'changelogUrl' => 'https://raw.githubusercontent.com/Firstborn/Craft-Migration-Manager/master/CHANGELOG.md',
    'hasCpSettings' => false,
    'hasCpSection' => true,
  ),
  'mmikkel/cp-field-inspect' => 
  array (
    'class' => 'mmikkel\\cpfieldinspect\\CpFieldInspect',
    'basePath' => $vendorDir . '/mmikkel/cp-field-inspect/src',
    'handle' => 'cp-field-inspect',
    'aliases' => 
    array (
      '@mmikkel/cpfieldinspect' => $vendorDir . '/mmikkel/cp-field-inspect/src',
    ),
    'name' => 'CP Field Inspect',
    'version' => '1.0.4',
    'schemaVersion' => '1.0.0',
    'description' => 'Inspect field handles and easily edit field settings',
    'developer' => 'Mats Mikkel Rummelhoff',
    'developerUrl' => 'http://mmikkel.no',
    'documentationUrl' => 'https://github.com/mmikkel/CpFieldInspect-Craft/blob/master/README.md',
    'changelogUrl' => 'https://raw.githubusercontent.com/mmikkel/CpFieldInspect-Craft/master/CHANGELOG.md',
    'hasCpSettings' => false,
    'hasCpSection' => false,
  ),
  'workingconcept/craft-cloudflare' => 
  array (
    'class' => 'workingconcept\\cloudflare\\Cloudflare',
    'basePath' => $vendorDir . '/workingconcept/craft-cloudflare/src',
    'handle' => 'cloudflare',
    'aliases' => 
    array (
      '@workingconcept/cloudflare' => $vendorDir . '/workingconcept/craft-cloudflare/src',
    ),
    'name' => 'Cloudflare',
    'version' => '0.2.0',
    'schemaVersion' => '1.0.0',
    'description' => 'Purge Cloudflare caches from Craft.',
    'developer' => 'Working Concept',
    'developerUrl' => 'https://workingconcept.com/',
    'documentationUrl' => 'https://github.com/workingconcept/cloudflare-craft-plugin/blob/master/README.md',
    'changelogUrl' => 'https://raw.githubusercontent.com/workingconcept/cloudflare-craft-plugin/master/CHANGELOG.md',
    'downloadUrl' => 'https://github.com/workingconcept/cloudflare-craft-plugin/archive/master.zip',
    'hasCpSettings' => true,
    'hasCpSection' => false,
    'components' => 
    array (
      'cloudflareService' => 'workingconcept\\cloudflare\\services\\CloudflareService',
      'rulesService' => 'workingconcept\\cloudflare\\services\\RulesService',
    ),
  ),
  'wbrowar/adminbar' => 
  array (
    'class' => 'wbrowar\\adminbar\\AdminBar',
    'basePath' => $vendorDir . '/wbrowar/adminbar/src',
    'handle' => 'admin-bar',
    'aliases' => 
    array (
      '@wbrowar/adminbar' => $vendorDir . '/wbrowar/adminbar/src',
    ),
    'name' => 'Admin Bar',
    'version' => '3.1.6',
    'schemaVersion' => '3.1.0',
    'description' => 'Front-end shortcuts for clients logged into Craft CMS.',
    'developer' => 'Will Browar',
    'developerUrl' => 'https://wbrowar.com/plugins/adminbar',
    'documentationUrl' => 'https://github.com/wbrowar/craft-3-adminbar/blob/master/README.md',
    'changelogUrl' => 'https://raw.githubusercontent.com/wbrowar/craft-3-adminbar/master/CHANGELOG.md',
    'hasCpSettings' => true,
    'hasCpSection' => false,
    'components' => 
    array (
      'bar' => 'wbrowar\\adminbar\\services\\Bar',
      'editLinks' => 'wbrowar\\adminbar\\services\\EditLinks',
    ),
  ),
  'craftcms/contact-form' => 
  array (
    'class' => 'craft\\contactform\\Plugin',
    'basePath' => $vendorDir . '/craftcms/contact-form/src',
    'handle' => 'contact-form',
    'aliases' => 
    array (
      '@craft/contactform' => $vendorDir . '/craftcms/contact-form/src',
    ),
    'name' => 'Contact Form',
    'version' => '2.2.2',
    'description' => 'Add a simple contact form to your Craft CMS site',
    'developer' => 'Pixel & Tonic',
    'developerUrl' => 'https://pixelandtonic.com/',
    'developerEmail' => 'support@craftcms.com',
    'documentationUrl' => 'https://github.com/craftcms/contact-form',
    'changelogUrl' => 'https://raw.githubusercontent.com/craftcms/contact-form/v2/CHANGELOG.md',
    'downloadUrl' => 'https://github.com/craftcms/contact-form/archive/v2.zip',
    'components' => 
    array (
      'mailer' => 'craft\\contactform\\Mailer',
    ),
  ),
  'enupal/paypal' => 
  array (
    'class' => 'enupal\\paypal\\Paypal',
    'basePath' => $vendorDir . '/enupal/paypal/src',
    'handle' => 'enupal-paypal',
    'aliases' => 
    array (
      '@enupal/paypal' => $vendorDir . '/enupal/paypal/src',
    ),
    'name' => 'PayPal',
    'version' => '1.0.5',
    'schemaVersion' => '1.0.0',
    'description' => 'Sell products or services on your website using a PayPal Buy Now Button',
    'developer' => 'Enupal',
    'developerUrl' => 'http://enupal.com',
    'developerEmail' => 'support@enupal.com',
    'documentationUrl' => 'https://enupal.com/craft-plugins/paypal/docs',
    'changelogUrl' => 'https://raw.githubusercontent.com/enupal/paypal/master/CHANGELOG.md',
    'components' => 
    array (
      'app' => 'enupal\\paypal\\services\\App',
    ),
  ),
  'craftcms/redactor' => 
  array (
    'class' => 'craft\\redactor\\Plugin',
    'basePath' => $vendorDir . '/craftcms/redactor/src',
    'handle' => 'redactor',
    'aliases' => 
    array (
      '@craft/redactor' => $vendorDir . '/craftcms/redactor/src',
    ),
    'name' => 'Redactor',
    'version' => '2.1.3',
    'description' => 'Edit rich text content in Craft CMS using Redactor by Imperavi.',
    'developer' => 'Pixel & Tonic',
    'developerUrl' => 'https://pixelandtonic.com/',
    'developerEmail' => 'support@craftcms.com',
    'documentationUrl' => 'https://github.com/craftcms/redactor',
    'changelogUrl' => 'https://raw.githubusercontent.com/craftcms/redactor/master/CHANGELOG.md',
    'downloadUrl' => 'https://github.com/craftcms/redactor/archive/master.zip',
  ),
);
