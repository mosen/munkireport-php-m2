<?php
namespace Mr\CheckIn;

use CFPropertyList\CFPropertyList;
use Mr\Contracts\CheckIn\Handler;
use Mr\Machine;

class CheckInHandler implements Handler
{
    public function process($moduleName, $serialNumber, $data)
    {
        $dataObj = new CFPropertyList;
        $dataObj->parse($data);
        $dataArr = $dataObj->toArray();

        $machine = Machine::firstOrNew(['serial_number' => $serialNumber]);
        $machine->serial_number = $serialNumber;
        
        if (isset($dataArr['physical_memory'])) {
            $machine->physical_memory = intval($dataArr['physical_memory']);
        }

        // Convert OS version to int
        if (isset($dataArr['os_version'])) {
            $digits = explode('.', $dataArr['os_version']);
            $mult = 10000;
            $dataArr['os_version'] = 0;
            foreach ($digits as $digit) {
                $dataArr['os_version'] += $digit * $mult;
                $mult = $mult / 100;
            }
        }

        // Dirify buildversion
        if (isset($dataArr['buildversion'])) {
            $dataArr['buildversion'] = preg_replace('/[^A-Za-z0-9]/', '', $dataArr['buildversion']);
        }

        $machine->fill($dataArr);
        $machine->save();
    }

    /**
     * Determine whether MunkiReport data with the given module name may be handled by this CheckInHandler.
     *
     * @param $moduleName
     * @return boolean
     */
    public function canHandle($moduleName)
    {
        return $moduleName == 'machine';
    }
}