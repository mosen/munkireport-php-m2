<?php
namespace MrModule\DirectoryService;

use Illuminate\Http\Request;
use Mr\Http\Controllers\Controller;

class DirectoryServiceController extends Controller
{
    public function index(Request $request) {
        $query = DirectoryService::with('reportdata', 'machine');

        if ($request->has('query')) {
            // TODO: query
        }

        if ($request->has('orderBy')) {
            $order = (int)$request->input('ascending', 0) === 1 ? 'ASC' : 'DESC';
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
        $result = DirectoryService::findOrFail($id);
        return response()->json($result);
    }

    protected function destroy($id) {
        $result = DirectoryService::findOrFail($id);
        $result->delete();

        return response()->setStatusCode(204);
    }

    public function stats() {
        $bound = DirectoryService::bound()->count();
        $unbound = DirectoryService::unbound()->count();

        return [
            'bound' => $bound,
            'unbound' => $unbound
        ];
    }

    public function listing() {
        return view('directoryservice::listing');
    }
}