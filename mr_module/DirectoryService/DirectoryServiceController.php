<?php
namespace MrModule\DirectoryService;

use Mr\Http\Controllers\Controller;

class DirectoryServiceController extends Controller
{
    public function index() {
        $results = DirectoryService::all();
        return response()->json($results);
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
}