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

    public function stats_free_space() {
        $warningThreshold = config('mr_disk_report.thresholds.warning', 10);
        $dangerThreshold = config('mr_disk_report.thresholds.danger', 5);

        $successCount = DiskReport::where('FreeSpace', '>=', $warningThreshold)->count();
        $warningCount = DiskReport::whereBetween('FreeSpace', [$dangerThreshold, $warningThreshold])->count();
        $dangerCount = DiskReport::where('FreeSpace', '<', $dangerThreshold)->count();

        return [
            'success' => $successCount,
            'warning' => $warningCount,
            'danger' => $dangerCount,
            'warningThreshold' => $warningThreshold,
            'dangerThreshold' => $dangerThreshold
        ];
    }
}