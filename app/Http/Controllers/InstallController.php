<?php

namespace Mr\Http\Controllers;

use Illuminate\Http\Request;

class InstallController extends Controller
{
    public function index() {
        return response()
            ->view('install.script', [
                'install_scripts' => [],
                'uninstall_scripts' => []
            ])
            ->header('Content-Type', 'text/plain');
    }
}
