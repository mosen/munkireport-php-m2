<?php
namespace MrModule\Display;

use Mr\Http\Controllers\Controller;

class DisplayController extends Controller
{
    public function index() {
        $results = Display::all();
        return response()->json($results);
    }

    protected function show($id) {
        $result = Display::findOrFail($id);
        return response()->json($result);
    }

    protected function destroy($id) {
        $result = Display::findOrFail($id);
        $result->delete();

        return response()->setStatusCode(204);
    }
}