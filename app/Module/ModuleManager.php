<?php
namespace Mr\Module;

use Log;

class ModuleManager
{
    /**
     * @var array Array of Metadata instances keyed by the module short checkin name
     */
    protected $modules = [];

    public function __construct($moduleProviders) {
        //print_r($moduleProviders);
    }

    /**
     * Register a new module with the module manager.
     *
     * @param string $moduleName Name of the module, must be the same as the check-in key.
     * @param string $modulePath The root path of the module, used to calculate relative paths of non-code assets.
     * @return Metadata Instance of the module metadata.
     */
    public function add($moduleName, $modulePath) {
        $module = new Metadata($moduleName, $modulePath);
        $this->modules[$moduleName] = $module;
        Log::debug("Registered module: {$moduleName}");
        return $module;
    }

    /**
     * Get module metadata by registered name.
     *
     * @param $moduleName
     * @return Metadata|null
     */
    public function get($moduleName) {
        if (isset($this->modules[$moduleName])) {
            return $this->modules[$moduleName];
        } else {
            return null;
        }
    }

    /**
     * Get a hash containing all install scripts keyed by their module name.
     *
     * @return array
     */
    public function installScripts() {
        $scripts = [];
        foreach ($this->modules as $name => $m) {
            $moduleInstallScripts = $m->getInstalls();
            if (count($moduleInstallScripts) > 0) {
                $scripts[$name] = $moduleInstallScripts[0];
            }
        }

        return $scripts;
    }

    /**
     * Get a hash containing all uninstall scripts keyed by their module name.
     *
     * @return array
     */
    public function uninstallScripts() {
        $scripts = [];
        foreach ($this->modules as $name => $m) {
            $moduleUninstallScripts = $m->getUninstalls();
            if (count($moduleUninstallScripts) > 0) {
                $scripts[$name] = $moduleUninstallScripts[0];
            }
        }

        return $scripts;
    }
}