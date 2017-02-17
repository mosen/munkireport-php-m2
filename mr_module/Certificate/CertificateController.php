<?php
namespace MrModule\Certificate;

use Mr\Http\Controllers\Controller;

class CertificateController extends Controller
{
    public function index() {
        $results = Certificate::all();
        return response()->json($results);
    }

    protected function show($id) {
        $result = Certificate::findOrFail($id);
        return response()->json($result);
    }

    protected function destroy($id) {
        $result = Certificate::findOrFail($id);
        $result->delete();

        return response()->setStatusCode(204);
    }

    /**
     * Get counters for different certificate expiry statuses.
     */
    public function stats() {
        $now = new \DateTime();
        
        $inThreeMonths = new \DateTime();
        $inThreeMonths->add(new \DateInterval('P3M'));

        $expired = Certificate::where('cert_exp_time', '<', $now)->count();
        $soon = Certificate::whereBetween('cert_exp_time', [$now, $inThreeMonths])->count();
        $ok = Certificate::where('cert_exp_time', '>', $inThreeMonths)->count();

        return [
            'expired' => $expired,
            'soon' => $soon,
            'ok' => $ok
        ];
    }
}