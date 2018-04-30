<?php

$vendorDir = dirname(__DIR__);

return array (
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
    'version' => '3.1.5',
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
    'version' => '1.1.0',
    'description' => 'Edit rich text content in Craft CMS using Redactor by Imperavi.',
    'developer' => 'Pixel & Tonic',
    'developerUrl' => 'https://pixelandtonic.com/',
    'developerEmail' => 'support@craftcms.com',
    'documentationUrl' => 'https://github.com/craftcms/redactor',
    'changelogUrl' => 'https://raw.githubusercontent.com/craftcms/redactor/master/CHANGELOG.md',
    'downloadUrl' => 'https://github.com/craftcms/redactor/archive/master.zip',
  ),
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
);
