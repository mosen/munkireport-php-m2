<?php
namespace MrModule\ManagedInstalls;

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
        return $moduleName === 'managedinstalls';
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

        ManagedInstall::where(['serial_number' => $serialNumber])->delete();

        foreach ($dataArr as $name => $props) {
            $mi = new ManagedInstall;

            $mi->serial_number = $serialNumber;
            $mi->name = $name;
            $mi->display_name = array_get($props, 'display_name', null);
            $mi->version = array_get($props, 'installed_version', null);
            $mi->size = array_get($props, 'installed_size', null);
            $mi->installed = array_get($props, 'installed', null);
            $mi->status = array_get($props, 'status', null);
            $mi->type = array_get($props, 'type', null);

            $mi->save();
        }
    }
}
