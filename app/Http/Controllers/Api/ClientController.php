<?php
namespace Mr\Http\Controllers\Api;

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
}