<?php
namespace MrModule\Bluetooth;

use Mr\Http\Controllers\Controller;

class BluetoothController extends Controller
{
    public function index() {
        $results = BluetoothInfo::all();
        return response()->json($results);
    }

    protected function show($id) {
        $result = BluetoothInfo::findOrFail($id);
        return response()->json($result);
    }

    protected function destroy($id) {
        $result = BluetoothInfo::findOrFail($id);
        $result->delete();

        return response()->setStatusCode(204);
    }
}