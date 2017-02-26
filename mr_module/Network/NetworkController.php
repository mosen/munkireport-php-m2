<?php
namespace MrModule\Network;

use Mr\Http\Controllers\TableController;

class NetworkController extends TableController
{
    protected $tableModel = '\MrModule\Network\Network';

    public function listing() {
        return view('network::listing');
    }
}