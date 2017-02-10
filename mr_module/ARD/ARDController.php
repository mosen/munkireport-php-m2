<?php
namespace MrModule\ARD;

use Illuminate\Http\Request;
use Mr\Http\Controllers\Controller;

class ARDController extends Controller
{
    protected function store(Request $request) {

    }

    protected function index() {
        $results = ARDInfo::all();
        return response()->json($results);
    }

    protected function show($id) {
        $result = ARDInfo::findOrFail($id);
        return response()->json($result);
    }

    protected function destroy($id) {
        $result = ARDInfo::findOrFail($id);
        $result->delete();

        return response()->setStatusCode(204);
    }
}