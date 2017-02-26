<?php
namespace MrModule\Printer;

use Mr\Http\Controllers\TableController;

class SecurityController extends TableController
{
    protected $tableModel = '\MrModule\Security\Security';

    public function listing() {
        return view('security::listing');
    }
}