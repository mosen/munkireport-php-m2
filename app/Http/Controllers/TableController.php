<?php
namespace Mr\Http\Controllers;

use Illuminate\Http\Request;

/**
 * The table controller implements the REST index() method in a way that is compatible with vue-tables-2.
 * It assumes your model has relations `reportdata` and `machine` defined.
 *
 * You can inherit from this controller and specify the $tableModel property to automatically get table index
 * functionality. If you find that you need some special query parameters or you need to use a different SQL statement
 * then you can remove inheritance from this controller.
 * 
 * @package Mr\Http\Controllers
 */
class TableController extends Controller
{
    protected $tableModel = null;

    public function index(Request $request) {
        if ($this->tableModel === null) {
            abort(500, 'Tried to use a TableController with no defined model');
        }
        $query = call_user_func([$this->tableModel, 'with'], 'reportdata', 'machine');

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
}