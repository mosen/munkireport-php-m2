<?php
namespace Mr\Http\Controllers;

use Illuminate\Http\Response;
use Mr\Module\ModuleManager;

class InstallController extends Controller
{
    /**
     * @var ModuleManager instance of the module manager used to resolve scripts.
     */
    protected $moduleManager;

    public function __construct(ModuleManager $moduleManager) {
        $this->moduleManager = $moduleManager;
    }

    /**
     * Generate the installation bash script.
     *
     * @return Response Plain text response
     */
    public function index() {
        $installScripts = $this->moduleManager->installScripts();
        $uninstallScripts = $this->moduleManager->uninstallScripts();

        return response()
            ->view('install.script', [
                'install_scripts' => $installScripts,
                'uninstall_scripts' => []
            ])
            ->header('Content-Type', 'text/plain');
    }

    /**
     * Download a script from a module directory.
     *
     * @param string $moduleName
     * @param string $scriptName
     * 
     * @return Response script content.
     */
    public function script($moduleName, $scriptName) {
        $modulePath = $this->moduleManager->get($moduleName);
        if ($modulePath === null) abort(404);
        if (strpos($scriptName, '.') !== false) abort(400); // Very rudimentary security

        $scriptPath = $modulePath . "/scripts/" . $scriptName;
        if (file_exists($scriptPath)) {
            return response()
                ->setContent(file_get_contents($scriptPath))
                ->header('Content-Type', 'text/plain');
        } else {
            abort(404);
        }
    }
}
