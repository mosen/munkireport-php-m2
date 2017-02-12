<?php
namespace MrModule\DeployStudio;

use Mr\Http\Controllers\Controller;

class DeployStudioController extends Controller
{
    public function index() {
        $results = DeployStudioInfo::all();
        return response()->json($results);
    }

    protected function show($id) {
        $result = DeployStudioInfo::findOrFail($id);
        return response()->json($result);
    }

    protected function destroy($id) {
        $result = DeployStudioInfo::findOrFail($id);
        $result->delete();

        return response()->setStatusCode(204);
    }
}