<?php
namespace MrModule\Wifi;

use Mr\Http\Controllers\TableController;

class WifiController extends TableController
{
    protected $tableModel = '\MrModule\Wifi\Wifi';

    public function listing() {
        return view('wifi::listing');
    }
}