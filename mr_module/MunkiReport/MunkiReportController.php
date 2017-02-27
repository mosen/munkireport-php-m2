<?php
namespace MrModule\MunkiReport;

use Mr\Http\Controllers\TableController;

class MunkiReportController extends TableController
{
    protected $tableModel = '\MrModule\MunkiReport\MunkiReport';

    public function listing() {
        return view('munkireport::listing');
    }

    public function report() {
        return view('munkireport::report');
    }
}