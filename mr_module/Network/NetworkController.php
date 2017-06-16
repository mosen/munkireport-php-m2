<?php
namespace MrModule\Network;

use Mr\Http\Controllers\TableController;

class NetworkController extends TableController
{
    protected $tableModel = '\MrModule\Network\Network';

//    public function index(Request $request) {
//        $query = Network::with('reportdata', 'machine');
//
//        $results = $query->get();
//        $count = $query->count();
//
//        return response()->json([
//            'data' => $results,
//            'count' => $count
//        ]);
//    }
}