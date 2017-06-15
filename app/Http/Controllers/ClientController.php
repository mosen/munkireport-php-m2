<?php

namespace Mr\Http\Controllers;

use Illuminate\Http\Request;
use Mr\Machine;

class ClientController extends Controller
{
    /**
     * @param string $serialNumber
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    protected function show($serialNumber) {
        $machine = Machine::where('serial_number', $serialNumber)->firstOrFail();

        return view('client.detail', [
            'machine' => $machine
        ]);
    }

    public function listing() {
        return view('client.listing');
    }


}
