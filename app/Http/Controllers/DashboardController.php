<?php

namespace Mr\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Show the dashboard
     */
    protected function index() {
        return view('dashboard');
    }
}
