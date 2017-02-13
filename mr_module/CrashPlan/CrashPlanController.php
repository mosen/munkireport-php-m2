<?php
namespace MrModule\CrashPlan;

use Mr\Http\Controllers\Controller;
use MrModule\CrashPlan\CrashPlan;

class CrashPlanController extends Controller
{
    public function index() {
        $results = CrashPlan::all();
        return response()->json($results);
    }

    protected function show($id) {
        $result = CrashPlan::findOrFail($id);
        return response()->json($result);
    }

    protected function destroy($id) {
        $result = CrashPlan::findOrFail($id);
        $result->delete();

        return response()->setStatusCode(204);
    }
}