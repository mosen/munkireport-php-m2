<?php

namespace Mr\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function backup()
    {
        return view('report.backup');
    }

    public function clients()
    {
        return view('report.clients');
    }

    public function configuration()
    {
        return view('report.configuration');
    }

    public function hardware()
    {
        return view('report.hardware');
    }
}
