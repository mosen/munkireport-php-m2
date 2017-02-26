<?php
namespace MrModule\Warranty;

use Mr\Http\Controllers\TableController;

class WarrantyController extends TableController
{
    protected $tableModel = '\MrModule\Warranty\Warranty';

    public function listing() {
        return view('warranty::listing');
    }
}
