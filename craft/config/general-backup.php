<?php

/** Note: Rename this file to general.php and set it to IGNORE before commiting!  */

/**
 * General Configuration
 *
 * All of your system's general configuration settings go in here.
 * You can see a list of the default settings in craft/app/etc/config/defaults/general.php
 */

return array(
  '*' => array(
	       'extraAllowedFileExtensions' => 'eps',
         'siteUrl' => 'PRODUCTION URL',
         'enableCsrfProtection' => true,
         'omitScriptNameInUrls' => true,
         'cpTrigger' => 'admin',
         'environmentVariables' => array(
           'basePath' => '',
           'baseUrl'  => 'PRODUCTION URL',
        )
	),
	'test.web' => array(
	    'devMode' => true,
      'siteUrl' => 'http://DEV URL GOES HERE',
      'environmentVariables' => array(
        'basePath' => '',
        'baseUrl'  => 'http://DEV URL GOES HERE',
      )
	)
);
