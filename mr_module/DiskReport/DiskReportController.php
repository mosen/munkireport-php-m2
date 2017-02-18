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

    public function stats_filevault_status() {
        $encryptedCount = DiskReport::where('CoreStorageEncrypted', '=', true)
            ->where('MountPoint', '=', '/')
            ->count();
        $unencryptedCount = DiskReport::where('CoreStorageEncrypted', '=', false)
            ->where('MountPoint', '=', '/')
            ->count();

        return [
            'encrypted' => $encryptedCount,
            'unencrypted' => $unencryptedCount
        ];
    }

    public function stats_smart_status() {
        $failingCount = DiskReport::where('SMARTStatus', '=', DiskReport::SMART_FAILING)->count();
        $verifiedCount = DiskReport::where('SMARTStatus', '=', DiskReport::SMART_VERIFIED)->count();
        $unsupportedCount = DiskReport::where('SMARTStatus', '=', DiskReport::SMART_UNSUPPORTED)->count();

        return [
            'failing' => $failingCount,
            'verified' => $verifiedCount,
            'unsupported' => $unsupportedCount
        ];
    }
}