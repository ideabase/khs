<?php

namespace fortrabbit\Copy\commands;

use \Craft;
use ostark\Yii2ArtisanBridge\base\Action as BaseAction;
use fortrabbit\Copy\Plugin;
use yii\console\ExitCode;


/**
 * Class DbDownAction
 *
 * @package fortrabbit\DeployTools\commands
 */
class DbUpAction extends BaseAction
{
    /**
     * Upload database
     *
     * @return int
     *
     * @throws \craft\errors\ShellCommandException
     * @throws \fortrabbit\Copy\exceptions\CraftNotInstalledException
     * @throws \fortrabbit\Copy\exceptions\PluginNotInstalledException
     * @throws \fortrabbit\Copy\exceptions\RemoteException
     * @throws \yii\base\Exception
     * @throws \yii\console\Exception
     */
    public function run()
    {
        $plugin       = Plugin::getInstance();
        $path         = './storage/';
        $transferFile = $path . 'craft-copy-transfer.sql';
        $backupFile   = $path . 'craft-copy-recent.sql';
        $steps        = 4;
        $messages     = [];

        $this->section('Export DB local - import on remote: ' . getenv(Plugin::ENV_NAME_APP));

        if (!$this->confirm("Are you sure?", true)) {
            return ExitCode::UNSPECIFIED_ERROR;
        }

        $bar = $this->output->createProgressBar($steps);

        // Custom format
        $bar->setFormat('%message%' . PHP_EOL . '%bar% %percent:3s% %' . PHP_EOL . 'time:  %elapsed:6s%/%estimated:-6s%' . PHP_EOL . PHP_EOL);
        $bar->setBarCharacter('<info>' . $bar->getBarCharacter() . '</info>');
        $bar->setBarWidth(70);

        // Step 1: Create dump of the current database
        $bar->setMessage($messages[] = "Creating local dump");
        if ($plugin->dump->export($transferFile)) {
            $bar->advance();
        }

        // Step 2: Upload that dump to remote
        $bar->setMessage($messages[] = "Uploading dump to remote {$transferFile}");
        if ($plugin->ssh->upload($transferFile, $transferFile)) {
            $bar->advance();
        }

        // Step 3: Backup the remote database before importing the uploaded dump
        $bar->setMessage($messages[] = "Creating DB Backup on remote ({$backupFile})");
        if ($plugin->ssh->exec("php craft copy/db/to-file {$backupFile} --interactive=0")) {
            $bar->advance();
        }

        // Step 4: Import on remote
        $bar->setMessage($messages[] = "Importing dump on remote");
        if ($plugin->ssh->exec("php craft copy/db/from-file {$transferFile} --interactive=0")) {
            $bar->advance();
            $bar->setMessage("Dump imported");
        }

        $bar->finish();

        $this->section('Performed steps:');
        $this->listing($messages);

        $this->section('Rollback?');
        $this->line("ssh {$plugin->ssh->remote} 'php craft copy/db/from-file {$backupFile}'" . PHP_EOL);

        return ExitCode::OK;
    }
}
