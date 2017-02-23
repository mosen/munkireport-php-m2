<?php
namespace MrModule\Display;

use Mr\Http\Controllers\TableController;

class DisplayController extends TableController
{
    protected $tableModel = '\MrModule\Display\Display';

    protected function show($id) {
        $result = Display::findOrFail($id);
        return response()->json($result);
    }

    protected function destroy($id) {
        $result = Display::findOrFail($id);
        $result->delete();

        return response()->setStatusCode(204);
    }

    public function listing() {
        return view('display::listing');
    }
}