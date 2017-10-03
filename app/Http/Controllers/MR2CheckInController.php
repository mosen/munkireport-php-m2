<?php

namespace Mr\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Mr\CheckIn\CheckInRouter;
use Mr\ReportData;
use Mr\Hash;
use Mr\Event;

/**
 * The Check-In controller handles all client requests submitted in preflight/postflight by MunkiReport PHP v2 Clients
 *
 * @package Mr\Http\Controllers
 */
class MR2CheckInController extends Controller
{
    /**
     * @var CheckInRouter
     */
    protected $ciRouter = null;

    private function normalizedKey($key) {
        $key = strtolower($key);

        // InventoryItem legacy
        $key = str_replace('inventoryitem', 'inventory', $key);

        // Remove _model legacy
        if (substr($key, -6) == '_model') {
            $key = substr($key, 0, -6);
        }

        if (preg_match('/[^\da-z_]/', $key)) {
            throw new \Exception('Model has an illegal name');
        }

        return $key;
    }

    private function getHashList($serial)
    {
        $hashList = [];
        foreach(Hash::where('serial', '=', $serial)->get() as $entry){
            $hashList[$entry->name] = $entry->hash;
        }
        return $hashList;
    }

    public function __construct(CheckInRouter $ciRouter) {
        $this->ciRouter = $ciRouter;
    }

    /**
     * Hash check script for clients
     *
     * Clients check in hashes using $_POST
     * This script returns a JSON array with
     * hashes that are different
     *
     * @author mosen
     * @param Request $request
     * @return Response
     */
    protected function hash_check(Request $request) {
        if (!$request->has('serial')) {
            abort(400, 'Serial is missing');
        }

        if (!$request->has('unserialized_items')) {
            abort(400, 'Items are missing');
        }

        $itemarr = array('error' => '', 'info' => '');

        $report = ReportData::firstOrNew(['serial_number' => $request->serial]);
        $report->serial_number = $request->serial;
        $report->remote_ip = $request->getClientIp();
        $report->save();

        $reqItems = $request->unserialized_items;

        // Messages_model did not exist in source?

        // Get all hashes for serial
        $hashList = $this->getHashList($request->serial);

        foreach ($reqItems as $name => $val) {
            $lkey = $this->normalizedKey($name);

            if( ! array_key_exists($lkey, $hashList) or $hashList[$lkey] != $val['hash']){
                $itemarr[$name] = 1;
            }
        }

        // TODO: Handle errors (replacement for $_GLOBALS['alerts'])

        return serialize($itemarr);
    }

    /**
     * Check in script for clients
     *
     * Clients check in client data using $_POST
     *
     * @author mosen
     * @param Request $request
     * @return Response
     */
    protected function check_in(Request $request) {
        if (!$request->has('unserialized_items')) {
            abort(400, 'No items in POST');
        }

        $reqItems = $request->unserialized_items;

        if (!is_array($reqItems)) {
            abort(400, 'Could not parse items, not a proper serialized file');
        }

        foreach ($reqItems as $name => $val) {
            if (!isset($val['data'])) {
                continue;
            }

            $module = $this->normalizedKey($name);

            try {
                $didHandle = $this->ciRouter->route($module, $request->serial, $val['data']);

                $hash = Hash::firstOrNew(['serial' => $request->serial, 'name' => $module]);
                $hash->hash = $val['hash'];
                $hash->save();
            } catch (\Exception $e) {

            }
        }
    }

    /**
     * Report broken client
     *
     * Use this method to report on client-side
     * errors that prevent the client to
     * report properly
     *
     * @author mosen
     * @param Request $request
     * @return Response|string
     */
    protected function broken_client(Request $request) {
        if (!$request->has('serial')) {
            abort(400, 'serial is missing');
        }

        $report = new ReportData;
        $report->serial_number = $request->serial;
        $report->remote_ip = $request->getClientIp();
        $report->save();

        $module = $request->input('module', 'generic');
        $type = $request->input('type', 'danger');
        $msg = $request->input('msg', 'Unknown');

        // Store event
        $event = new Event;
        $event->serial_number = $request->serial;
        $event->type = $type;
        $event->module = $module;
        $event->msg = $msg;
        $event->save();

        return "Recorded this message: {$msg}\n";
    }
}
