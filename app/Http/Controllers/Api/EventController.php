<?php
namespace Mr\Http\Controllers\Api;

use Illuminate\Http\Request;
use Mr\Event;
use Mr\Http\Controllers\Controller;
/**
 * MunkiReport Events Controller
 * 
 * @package Mr\Http\Controllers
 */
class EventController extends Controller
{
    public function index(Request $request) {
        if ($request->has('filter')) {
            $filterRules = $request->input('filter');
        } else {
            $query = Event::with('machine');
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



//        if ($request->has('offset')) {
//            $query = $query-
//        }
        if ($request->has('limit')) {
            $query = $query->limit($request->input('limit'));
        }

        return $query->get();
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