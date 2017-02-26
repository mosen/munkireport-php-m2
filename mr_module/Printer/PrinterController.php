<?php
namespace MrModule\Printer;

use Mr\Http\Controllers\TableController;

class PrinterController extends TableController
{
    protected $tableModel = '\MrModule\Printer\Printer';

    public function listing() {
        return view('printer::listing');
    }
}