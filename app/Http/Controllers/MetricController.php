<?php

namespace Mr\Http\Controllers;

use Illuminate\Http\Request;

/**
 * The MetricController class provides a single endpoint for widgets to fetch information from the system.
 * The client sends a list of metrics that it wants to receive, and each module processes and returns metrics for itself.
 * 
 * @package Mr\Http\Controllers
 */
class MetricController extends Controller
{
    public function index(Request $request) {
        $topics = $request->get('topics');

        return response()->json([
            "test" => $topics
        ]);
    }
}
