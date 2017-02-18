<?php
namespace MrLegacy\Http\Controllers;


class ScriptController extends Controller
{
    /**
     * Download a module script.
     *
     * @param $moduleName
     * @param $script
     */
    public function get($moduleName, $script) {
        return $moduleName;
    }
}