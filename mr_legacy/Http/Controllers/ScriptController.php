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
     * @param $script
     */
    public function get($moduleName, $script) {
        $mod = $this->moduleManager->get($moduleName);
        if ($mod === null) {
            abort(404);
        }

        // TODO: need to check for insecure relative paths etc.
        $scriptPath = $mod->getPath() . '/scripts/' . $script;
        if (file_exists($scriptPath)) {
            return file_get_contents($scriptPath);
        } else {
            abort(404, 'No such script exists at' . $scriptPath);
        }
    }
}