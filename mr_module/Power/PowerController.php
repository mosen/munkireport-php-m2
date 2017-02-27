<?php
namespace MrModule\Power;

use Mr\Http\Controllers\TableController;

class PowerController extends TableController
{
    protected $tableModel = '\MrModule\Power\Power';

//    public function listing() {
//        return view('network::listing');
//    }

    public function report() {
        return view('power::report');
    }
}