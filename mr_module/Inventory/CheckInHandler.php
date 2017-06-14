<?php
namespace MrModule\Inventory;

use Illuminate\Support\Facades\Log;
use CFPropertyList\CFPropertyList;
use Illuminate\Support\Arr;
use Mr\Contracts\CheckIn\Handler;

class CheckInHandler implements Handler
{
    public static $handles = ['inventory'];
    
    /**
     * @param $moduleName string The short name of the class of data that needs to be handled.
     * @param $data array A hash of data to process.
     * @return mixed
     */
    public function process($moduleName, $serialNumber, $data)
    {
        Log::debug('Processing inventory data');
        $dataObj = new CFPropertyList;
        $dataObj->parse($data);
        $dataArr = $dataObj->toArray();

        InventoryItem::where('serial_number', $serialNumber)->delete();

        foreach ($dataArr as $data) {
            $inv = new InventoryItem;
            
            $inv->serial_number = $serialNumber;
            $inv->name = $data['name'];
            $inv->version = $data['version'];
            $inv->bundleid = $data['bundleid'];
            $inv->bundlename = isset($data['CFBundleName']) ? $data['CFBundleName'] : '';
            $inv->path = $data['path'];

            $inv->save();
        }
    }
}