<?php
namespace MrModule\ARD;

use Illuminate\Http\Request;
use Mr\Http\Controllers\Controller;

class ARDController extends Controller
{
    protected function store(Request $request) {

    }

    /**
     * Get a listing of ARD info rows
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    protected function index(Request $request) {
        // Magic via VueTableScope
        $query = ARDInfo::with('reportdata', 'machine');
        
        $results = $query->get();
        $count = $query->count();

        return response()->json([
            'data' => $results,
            'count' => $count
        ]);
    }

    protected function show($id) {
        $result = ARDInfo::findOrFail($id);
        return response()->json($result);
    }

    protected function destroy($id) {
        $result = ARDInfo::findOrFail($id);
        $result->delete();

        return response()->setStatusCode(204);
    }
}