<?php
namespace Mr\Http\Controllers;

use Illuminate\Http\Request;
use Mr\Machine;

class MachineController extends Controller
{
    public function index(Request $request) {
        $query = Machine::with('reportdata');

        if ($request->has('query')) {
            $query = $query->where('Text1', $request->input('query'));
        }

        if ($request->has('orderBy')) {
            $order = $request->get('ascending', 0) === 1 ? 'ASC' : 'DESC';
            $query = $query->orderBy($request->input('orderBy'), $order);
        }

        $countQuery = clone $query;
        $count = $countQuery->count();

        $limit = $request->input('limit', 100);
        $page = $request->input('page', 1);
        $query = $query->forPage($page, $limit);

        $results = $query->get();

        return response()->json([
            'data' => $results,
            'count' => $count
        ]);
    }

    public function show($id) {
        $result = Machine::findOrFail($id);
        return response()->json($result);
    }

    public function listing() {
        return view('machine.listing');
    }
}