<?php
namespace MrModule\Bluetooth;

use Mr\Http\Controllers\Controller;

class BluetoothController extends Controller
{
    public function index() {
        $results = BluetoothInfo::all();
        return response()->json($results);
    }
}