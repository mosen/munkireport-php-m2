<?php
namespace MrModule\FindMyMac;

use Mr\Http\Controllers\Controller;

class FindMyMacController extends Controller
{
    public function stats() {
        $enabledCount = FindMyMacInfo::where('status', '=', 'Enabled')->count();
        $disabledCount = FindMyMacInfo::where('status', '=', 'Disabled')->count();

        return [
            'Enabled' => $enabledCount,
            'Disabled' => $disabledCount
        ];
    }
}