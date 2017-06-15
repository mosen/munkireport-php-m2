<?php
namespace MrModule\InstallHistory;


use CFPropertyList\CFPropertyList;
use Mr\Contracts\CheckIn\Handler;

class CheckInHandler implements Handler
{
    public static $handles = ['installhistory'];

    /**
     * @param $moduleName string The short name of the class of data that needs to be handled.
     * @param $data array A hash of data to process.
     * @return mixed
     */
    public function process($moduleName, $serialNumber, $data)
    {
        $dataObj = new CFPropertyList;
        $dataObj->parse($data);
        $dataArr = $dataObj->toArray();
        
        InstallHistory::where('serial_number', $serialNumber)->delete();

        foreach ($dataArr as $item) {
            if (!empty($item['packageIdentifiers'])) {
                // PackageIdentifiers is an array, so we only retain one
                // packageidentifier so we can differentiate between
                // Apple and third party tools
                $item['packageIdentifiers'] = array_pop($item['packageIdentifiers']);
            }
            
            $item['serial_number'] = $serialNumber;

            $ih = InstallHistory::create($item);
        }
    }
}