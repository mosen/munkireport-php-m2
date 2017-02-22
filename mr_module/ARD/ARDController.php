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
        $query = ARDInfo::with('reportdata', 'machine');

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

    protected function show($id) {
        $result = ARDInfo::findOrFail($id);
        return response()->json($result);
    }

    protected function destroy($id) {
        $result = ARDInfo::findOrFail($id);
        $result->delete();

        return response()->setStatusCode(204);
    }

    public function listing() {
        return view('ard::listing');
    }
}