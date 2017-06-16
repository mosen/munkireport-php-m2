<?php
namespace MrModule\DirectoryService;

use Illuminate\Http\Request;
use Mr\Http\Controllers\Controller;

class DirectoryServiceController extends Controller
{
    public function index(Request $request) {
        $query = DirectoryService::with('reportdata', 'machine');

        $results = $query->get();
        $count = $query->count();

        return response()->json([
            'data' => $results,
            'count' => $count
        ]);
    }

    protected function show($id) {
        $result = DirectoryService::findOrFail($id);
        return response()->json($result);
    }

    protected function destroy($id) {
        $result = DirectoryService::findOrFail($id);
        $result->delete();

        return response()->setStatusCode(204);
    }

    public function stats() {
        $bound = DirectoryService::bound()->count();
        $unbound = DirectoryService::unbound()->count();

        return [
            'bound' => $bound,
            'unbound' => $unbound
        ];
    }
}