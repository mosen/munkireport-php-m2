<?php
namespace Mr\Http\Controllers;

use Illuminate\Http\Request;
use Mr\Event;

/**
 * MunkiReport Events Controller
 * 
 * @package Mr\Http\Controllers
 */
class EventController extends Controller
{
    public function index(Request $request) {
        $query = Event::all();

        if ($request->has('filter')) {
            $filterRules = $request->input('filter');
        }

        if ($request->has('sort')) {
            $sortRules = explode(',', $request->input('sort'));
            foreach ($sortRules as $sortRule) {
                $direction = $sortRule[0] === '-' ? SORT_DESC : SORT_ASC;
                if ($sortRule[0] === '-') {
                    $sortRule = substr($sortRule, 1);
                }
                $query = $query->sortBy($sortRule, $direction);
            }
        }

        if ($request->has('limit')) {
            $query = $query->take($request->input('limit'));
        }

//        if ($request->has('offset')) {
//            $query = $query-
//        }

        return $query->toArray();
    }

    protected function show($id) {
        $result = Event::findOrFail($id);
        return response()->json($result);
    }

    protected function destroy($id) {
        $result = Event::findOrFail($id);
        $result->delete();

        return response()->setStatusCode(204);
    }
}