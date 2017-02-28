<?php
namespace MrModule\MunkiReport;


use CFPropertyList\CFPropertyList;
use Mr\Contracts\CheckIn\Handler;

class CheckInHandler implements Handler
{
    /**
     * Determine whether MunkiReport data with the given module name may be handled by this CheckInHandler.
     *
     * @param $moduleName string The short name of the class of data that needs to be handled.
     * @return boolean
     */
    public function canHandle($moduleName)
    {
        return $moduleName == 'munkireport';
    }

    /**
     * @param $moduleName string The short name of the class of data that needs to be handled.
     * @param $serialNumber string The serial number of the client reporting the data.
     * @param $data array A hash of data to process.
     * @return mixed
     */
    public function process($moduleName, $serialNumber, $data)
    {
        $dataObj = new CFPropertyList;
        $dataObj->parse($data);
        $dataArr = $dataObj->toArray();

        $mr = MunkiReport::firstOrNew(['serial_number' => $serialNumber]);
        $mr->serial_number = $serialNumber;
        $mr->version = $dataArr['ManagedInstallVersion'];
        $mr->manifestname = array_get($dataArr, 'ManifestName', null);
        $mr->runtype = $dataArr['RunType'];
        $mr->starttime = $dataArr['StartTime'];
        $mr->endtime = $dataArr['EndTime'];

        // Parse errors and warnings
        $errorsWarnings = array('Errors' => 'error_json', 'Warnings' => 'warning_json');
        foreach ($errorsWarnings as $key => $json) {
            $dbkey = strtolower($key);
            if (isset($dataArr[$key]) && is_array($dataArr[$key])) {
                // Store count
                $mr->{$dbkey} = count($dataArr[$key]);

                // Store json
                $mr->{$json} = json_encode($dataArr[$key]);
            } else {
                // reset
                $mr->{$dbkey} = 0;
                $mr->{$json} = json_encode(array());
            }
        }

        $mr->save();
    }
}