<?php
namespace Mr\Module;


class ModuleManager
{
    protected $modules = [];

    /**
     * Register a new module with the module manager.
     *
     * @param string $moduleName Name of the module, must be the same as the check-in key.
     * @return Metadata Instance of the module metadata.
     */
    public function add($moduleName) {
        $module = new Metadata($moduleName);
        $this->modules[] = $module;
        return $module;
    }
}