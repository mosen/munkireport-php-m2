<?php
namespace Mr\Http\Controllers;

use Mr\Machine;

class MachineController extends Controller
{
    public function index() {
        $results = Machine::all();
        return response()->json($results);
    }

    public function show($id) {
        $result = Machine::findOrFail($id);
        return response()->json($result);
    }
}