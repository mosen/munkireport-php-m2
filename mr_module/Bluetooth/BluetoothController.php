<?php
namespace MrModule\Bluetooth;

use Illuminate\Http\Request;
use Mr\Http\Controllers\Controller;

class BluetoothController extends Controller
{
    /**
     * Retrieve a list of bluetooth statuses.
     *
     * @param Request $request
     * @return array
     */
    public function index(Request $request)
    {
        if ($request->has('filter')) {
            $filterRules = $request->input('filter');
            if (!is_array($filterRules)) {
                // Named filter

                switch ($filterRules) {
                    case "low":
                        $query = BluetoothInfo::where(
                            'battery_percent',
                            '<=', config('bluetooth.battery_threshold', 15)
                        )->where(
                            'device_type', '!=', 'bluetooth_power'
                        )->with('machine');
                }
            }
        } else {
            $query = BluetoothInfo::where();
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

        return $query->get()->toArray();
    }

    protected function show($id)
    {
        $result = BluetoothInfo::findOrFail($id);
        return response()->json($result);
    }

    protected function destroy($id)
    {
        $result = BluetoothInfo::findOrFail($id);
        $result->delete();

        return response()->setStatusCode(204);
    }
}