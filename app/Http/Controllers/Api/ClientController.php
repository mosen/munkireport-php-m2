<?php
namespace Mr\Http\Controllers\Api;

use Illuminate\Http\Request;
use Mr\Http\Controllers\Controller;
use Mr\ReportData;
use Mr\Machine;

class ClientController extends Controller
{
    protected function show($serial) {
        $reportData = ReportData::where('serial_number', $serial)->firstOrFail();
        $client = $reportData->with('machine')->first();

        return response()->json($client->toArray());
    }

    public function index(Request $request) {
        if ($request->has('filter')) {
            $filterRules = $request->input('filter');
        } else {
            $query = ReportData::with('machine', 'munkireport', 'warranty');
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



//        if ($request->has('offset')) {
//            $query = $query-
//        }
        if ($request->has('limit')) {
            $query = $query->limit($request->input('limit'));
        }

        return ['data' => $query->get(), 'count' => $query->count()];
    }
}