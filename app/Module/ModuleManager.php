<?php
namespace Mr\Module;

use Log;

class ModuleManager
{
    /**
     * @var array Array of Metadata instances
     */
    protected $modules = [];

    /**
     * Register a new module with the module manager.
     *
     * @param string $moduleName Name of the module, must be the same as the check-in key.
     * @param string $modulePath The root path of the module, used to calculate relative paths of non-code assets.
     * @return Metadata Instance of the module metadata.
     */
    public function add($moduleName, $modulePath) {
        $module = new Metadata($moduleName, $modulePath);
        $this->modules[] = $module;
        Log::debug("Registered module: {$moduleName}");
        return $module;
    }

    /**
     * Get a hash containing all install scripts keyed by their module name.
     *
     * @return array
     */
    public function installScripts() {
        $scripts = [];
        foreach ($this->modules as $m) {
            $moduleInstallScripts = $m->getInstalls();
            if (count($moduleInstallScripts > 0)) {
                $scripts[$m->getName()] = $moduleInstallScripts[0];
            }
        }

        return $scripts;
    }
}