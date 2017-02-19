<?php
namespace MrModule\TimeMachine;

use Mr\Http\Controllers\Controller;
use MrModule\TimeMachine\TimeMachine;

class TimeMachineController extends Controller
{
    public function index() {
        $results = TimeMachine::all();
        return response()->json($results);
    }

    protected function show($id) {
        $result = TimeMachine::findOrFail($id);
        return response()->json($result);
    }

    protected function destroy($id) {
        $result = TimeMachine::findOrFail($id);
        $result->delete();

        return response()->setStatusCode(204);
    }

    public function stats() {
        $lastDay = new \DateTime();
        $lastDay->sub(new \DateInterval('P1D'));

        $lastWeek = new \DateTime();
        $lastWeek->sub(new \DateInterval('P1W'));

        $todayCount = TimeMachine::where('last_success', '>', $lastDay)->count();
        $lastWeekCount = TimeMachine::whereBetween('last_success', [$lastWeek, $lastDay])->count();
        $earlierCount = TimeMachine::where('last_success', '<', $lastWeek)->count();

        return [
            'today' => $todayCount,
            'lastweek' => $lastWeekCount,
            'weekplus' => $earlierCount
        ];
    }
}
