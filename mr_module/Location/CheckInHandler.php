<?php
namespace MrModule\Location;

use CFPropertyList\CFPropertyList;
use Mr\Contracts\CheckIn\Handler;

class CheckInHandler implements Handler
{
    protected $translate = array(
        'Address' => 'address',
        'Altitude' => 'altitude',
        'CurrentStatus' => 'currentstatus',
        'LS_Enabled' => 'ls_enabled',
        'LastLocationRun' => 'lastlocationrun',
        'LastRun' => 'lastrun',
        'Latitude' => 'latitude',
        'LatitudeAccuracy' => 'latitudeaccuracy',
        'Longitude' => 'longitude',
        'LongitudeAccuracy' => 'longitudeaccuracy',
        'StaleLocation' => 'stalelocation'
    );

    /**
     * Determine whether MunkiReport data with the given module name may be handled by this CheckInHandler.
     *
     * @param $moduleName string The short name of the class of data that needs to be handled.
     * @return boolean
     */
    public function canHandle($moduleName)
    {
        return $moduleName == 'location';
    }

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

        $location = Location::firstOrNew(['serial_number' => $serialNumber]);
        $location->serial_number = $serialNumber;

        foreach ($this->translate as $search => $field) {
            if (isset($dataArr[$search])) {
                $location->{$field} = $dataArr[$search];
            }
        }

        $location->save();
    }
}