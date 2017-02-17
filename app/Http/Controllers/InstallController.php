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
                'uninstall_scripts' => $uninstallScripts
            ])
            ->header('Content-Type', 'text/plain');
    }
}
