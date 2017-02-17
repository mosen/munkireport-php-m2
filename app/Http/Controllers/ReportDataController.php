<?php
namespace Mr\Http\Controllers;

use Illuminate\Http\Request;
use Mr\ReportData;
use DB;

class ReportDataController extends Controller
{
    public function index(Request $request) {
        $query = ReportData::all();

        if ($request->has('filter')) {
            $filterRules = $request->input('filter');
        }
        
        if ($request->has('sort')) {
            $sortRules = explode(',', $request->input('sort'));
            foreach ($sortRules as $sortRule) {
                $direction = $sortRule[0] === '-' ? SORT_DESC : SORT_ASC;
                if ($sortRule[0] === '-') {
                    $sortRule = substr($sortRule, 1);
                }
                $query = $query->sortBy($sortRule, $direction);
            }
        }

        if ($request->has('limit')) {
            $query = $query->take($request->input('limit'));
        }

//        if ($request->has('offset')) {
//            $query = $query-
//        }

        return $query->get();
    }

    public function show($id) {
        return ReportData::findOrFail($id);
    }

    public function update($id, Request $request) {
        $reportData = ReportData::findOrFail($id);
        $reportData->fill($request->json());
        $reportData->save();

        return $reportData;
    }

    public function destroy($id) {
        $reportData = ReportData::findOrFail($id);
        $reportData->delete();
    }

    /**
     * Retrieve statistics about the age of reporting clients.
     *
     * NOTE: This may be slower than the equivalent SQL query w/CASE statements.
     * Change back to DB query builder if that is the case.
     *
     * @return array
     */
    public function stats() {
        $lastHour = ReportData::updatedSince(new \DateInterval('PT1H'))->count();
        $lastDay = ReportData::updatedSince(new \DateInterval('P1D'))->count();
        $lastWeek = ReportData::updatedSince(new \DateInterval('P1W'))->count();
        $lastMonth = ReportData::updatedSince(new \DateInterval('P1M'))->count();

        $inactiveWeek = ReportData::updatedBetween(new \DateInterval('P1W'), new \DateInterval('P1M'))->count();
        $inactiveMonth = ReportData::updatedBetween(new \DateInterval('P1M'), new \DateInterval('P3M'))->count();
        $inactiveThreeMonth = ReportData::notUpdatedFor(new \DateInterval('P3M'))->count();

        return [
            'seen_last_hour' => $lastHour,
            'seen_last_day' => $lastDay,
            'seen_last_week' => $lastWeek,
            'seen_last_month' => $lastMonth,
            'inactive_week' => $inactiveWeek,
            'inactive_month' => $inactiveMonth,
            'inactive_three_months' => $inactiveThreeMonth
        ];
    }
}