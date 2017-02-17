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
        
    }
}