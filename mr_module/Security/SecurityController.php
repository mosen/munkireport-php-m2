<?php
namespace MrModule\Security;

use Illuminate\Http\Request;
use Mr\Http\Controllers\Controller;

class SecurityController extends Controller
{
    protected $tableModel = '\MrModule\Security\Security';

    public function index(Request $request) {
        $query = Security::with('reportdata', 'machine');

        $results = $query->get();
        $count = $query->count();

        return response()->json([
            'data' => $results,
            'count' => $count
        ]);
    }
}