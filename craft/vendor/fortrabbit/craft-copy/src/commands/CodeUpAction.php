<?php

namespace fortrabbit\Copy\commands;

use fortrabbit\Copy\Plugin;
use fortrabbit\Copy\services\Git;
use GitWrapper\GitException;
use ostark\Yii2ArtisanBridge\base\Action;
use yii\console\ExitCode;

class CodeUpAction extends Action
{


    /**
     * Git push
     *
     * @return int
     * @throws \Exception
     */
    public function run()
    {
        $git = Plugin::getInstance()->git;
        $git->getWorkingCopy()->init();
        $git->assureDotGitignore();

        $localBranches = $git->getLocalBranches();
        $branch        = $git->getLocalHead();

        if (count($localBranches) > 1) {
            $branch = str_replace('* ', '', $this->choice('Select a local branch:', $localBranches, $branch));
            $git->run('checkout', $branch);
        }

        if (!$git->getWorkingCopy()->hasChanges()) {
            if (!$this->confirm("No changes detected. Push anyways?", true)) {
                return ExitCode::OK;
            }
        }

        // Ask for remote
        // or create one
        // or pick the only one
        if (!$upstream = $this->getUpstream($git)) {
            return ExitCode::UNSPECIFIED_ERROR;
        }

        if ($status = $git->getWorkingCopy()->getStatus()) {

            // Changed files
            $this->noteBlock("Uncommitted changes:" . PHP_EOL . $status);
            $defaultMessage = ($this->interactive) ? null : 'init Craft';

            if (!$msg = $this->ask("Enter a commit message, or leave it empty to abort the commit", $defaultMessage)) {
                $this->errorBlock('Abort');

                return ExitCode::UNSPECIFIED_ERROR;
            }

            // Add and commit
            $git->getWorkingCopy()->add('.');
            $git->getWorkingCopy()->commit($msg);

        } else {
            $msg = 'empty commit';
        }


        try {
            $this->section("git push ($msg)");
            $git->getWorkingCopy()->getWrapper()->streamOutput();
            $git->push($upstream, 'master');
        } catch (GitException $exception) {
            $lines = count(explode(PHP_EOL, $exception->getMessage()));
            $this->output->write(str_repeat("\x1B[1A\x1B[2K", $lines));
            $this->errorBlock('Ooops.');
            $this->output->write("<fg=red>{$exception->getMessage()}</>");

            return ExitCode::UNSPECIFIED_ERROR;
        }

        $this->output->write(PHP_EOL);
        $this->successBlock('Code deployed successfully.');

        return ExitCode::OK;

    }


    /**
     * Dialog helper to choose the Remote
     *
     * @param \fortrabbit\Copy\services\Git $git
     *
     * @return string upstream
     */
    protected function getUpstream(Git $git): string
    {
        // Non
        if (!$remotes = $git->getRemotes()) {
            $remote = getenv(Plugin::ENV_NAME_SSH_REMOTE);
            if ($this->confirm("No remotes configured. Do you want to add '{$remote}''?")) {
                return $git->addRemote($remote);
            }
        }

        // There is just one
        if (count($remotes) == 1) {
            return array_keys($remotes)[0];
        }

        // Multiple
        return $this->choice('Select a remote', $remotes, $git->getTracking());
    }
}
