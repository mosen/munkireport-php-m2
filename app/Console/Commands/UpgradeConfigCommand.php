<?php

namespace Mr\Console\Commands;

use Illuminate\Console\Command;

class UpgradeConfigCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'upgrade:config {file}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Upgrade MunkiReport v2 Configuration to v3';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Upgrade e-mail settings from MunkiReport v2
     *
     * @param array $settings A hash containing the contents of $conf['email']
     */
    protected function upgradeMailSettings(array $settings)
    {
        $appEnv = [];
        $appEnv['MAIL_DRIVER'] = 'smtp';
        $appEnv['MAIL_HOST'] = $settings['smtp_host'];
        $appEnv['MAIL_USERNAME'] = $settings['smtp_username'];
        $appEnv['MAIL_PASSWORD'] = $settings['smtp_password'];
        $appEnv['MAIL_PORT'] = $settings['smtp_port'];

        $fromAddresses = array_keys($settings['from']);
        if (count($fromAddresses) > 0) {
            $appEnv['MAIL_FROM_ADDRESS'] = $fromAddresses[0];
            $appEnv['MAIL_FROM_NAME'] = $settings['from'][$fromAddresses[0]];
        } else {
            $this->output('Did not find a `from` address, skipping.');
        }

        $appEnv['MAIL_ENCRYPTION'] = $settings['smtp_secure'];
    }
    
    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $legacyConfigPath = $this->argument('file');
        $this->output("Reading MunkiReport v2 config file from: {$legacyConfigPath}");
        if (!file_exists($legacyConfigPath) || !is_file($legacyConfigPath)) {
            $this->error("File does not exist or is not a file.");
        }

        if (!is_readable($legacyConfigPath)) {
            $this->error("File exists but is not readable.");
        }

        $configFn = function() use ($legacyConfigPath) {
            define('KISS', true);
            $conf = [];
            include_once($legacyConfigPath);
            return $conf;
        };

        $legacyConfig = $configFn();
        if (count($legacyConfig) === 0) {
            $this->error("Config file contains nothing");
        }

        $appEnv = [];

        if (array_key_exists('email', $legacyConfig)) {
            $this->output('Migrating e-mail settings');
            $legacyMail = $legacyConfig['email'];
            $this->upgradeMailSettings($legacyMail);
        }

        // $conf['sitename' to .env APP_NAME

        // $conf['email
    }
}
