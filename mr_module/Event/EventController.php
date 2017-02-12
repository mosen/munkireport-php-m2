<?php
namespace MrModule\Event;

use Mr\Http\Controllers\Controller;

class EventController extends Controller
{
    public function index() {
        $results = Event::all();
        return response()->json($results);
    }

    protected function show($id) {
        $result = Event::findOrFail($id);
        return response()->json($result);
    }

    protected function destroy($id) {
        $result = Event::findOrFail($id);
        $result->delete();

        return response()->setStatusCode(204);
    }
}