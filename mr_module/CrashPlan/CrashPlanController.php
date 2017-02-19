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

    public function stats() {
        $lastDay = new \DateTime();
        $lastDay->sub(new \DateInterval('P1D'));

        $lastWeek = new \DateTime();
        $lastWeek->sub(new \DateInterval('P1W'));

        $todayCount = CrashPlan::where('last_success', '>', $lastDay)->count();
        $lastWeekCount = CrashPlan::whereBetween('last_success', [$lastWeek, $lastDay])->count();
        $earlierCount = CrashPlan::where('last_success', '<', $lastWeek)->count();

        return [
            'today' => $todayCount,
            'lastweek' => $lastWeekCount,
            'weekplus' => $earlierCount
        ];
    }
}