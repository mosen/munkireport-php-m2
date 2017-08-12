<?php
namespace MrLegacy\Http\Controllers;


use Mr\Module\ModuleManager;

class ScriptController extends Controller
{
    protected $moduleManager;

    public function __construct(ModuleManager $moduleManager) {
        $this->moduleManager = $moduleManager;
    }

    /**
     * Download a module script.
     *
     * @param $moduleName
     * @param $scriptName
     */
    public function get($moduleName, $scriptName) {
        $m = $this->moduleManager->get($moduleName);
        if ($m->getPath() === null) abort(400);
        //if (strpos($scriptName, '.') !== false) abort(400); // Very rudimentary security

        $scriptName = preg_replace('/_(sh|py)/', '.$1', $scriptName);

        $scriptPath = $m->getPath() . "/scripts/" . $scriptName;
        if (file_exists($scriptPath)) {
            return file_get_contents($scriptPath);
        } else {
            abort(404);
        }
    }
}