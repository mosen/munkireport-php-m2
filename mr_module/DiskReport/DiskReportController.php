<?php
namespace MrModule\DiskReport;

use Mr\Http\Controllers\Controller;

class DiskReportController extends Controller
{
    public function index() {
        $results = DiskReport::all();
        return response()->json($results);
    }

    protected function show($id) {
        $result = DiskReport::findOrFail($id);
        return response()->json($result);
    }

    protected function destroy($id) {
        $result = DiskReport::findOrFail($id);
        $result->delete();

        return response()->setStatusCode(204);
    }
}