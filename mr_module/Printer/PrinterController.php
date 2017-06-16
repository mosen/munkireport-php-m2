<?php
namespace MrModule\Printer;

use Illuminate\Http\Request;
use Mr\Http\Controllers\TableController;
use Mr\Http\Controllers\Controller;

class PrinterController extends Controller
{
    protected $tableModel = '\MrModule\Printer\Printer';

    public function index(Request $request) {
        $query = Printer::with('reportdata', 'machine');

        $results = $query->get();
        $count = $query->count();

        return response()->json([
            'data' => $results,
            'count' => $count
        ]);
    }
}