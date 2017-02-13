<?php
namespace MrModule\Machine;

use Mr\Contracts\CheckIn\Handler;

class CheckInHandler implements Handler
{
    public function process($moduleName, $serialNumber, $data)
    {
        $machine = Machine::firstOrNew(['serial_number' => $serialNumber]);
        $machine->serial_number = $serialNumber;
        
        if (isset($data['physical_memory'])) {
            $machine->physical_memory = intval($data['physical_memory']);
        }

        // Convert OS version to int
        if (isset($data['os_version'])) {
            $digits = explode('.', $data['os_version']);
            $mult = 10000;
            $mylist['os_version'] = 0;
            foreach ($digits as $digit) {
                $data['os_version'] += $digit * $mult;
                $mult = $mult / 100;
            }
        }

        // Dirify buildversion
        if (isset($data['buildversion'])) {
            $data['buildversion'] = preg_replace('/[^A-Za-z0-9]/', '', $data['buildversion']);
        }

        $machine->fill($data);
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