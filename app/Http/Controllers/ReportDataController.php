<?php
namespace Mr\Http\Controllers;

use Illuminate\Http\Request;
use Mr\ReportData;

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
}