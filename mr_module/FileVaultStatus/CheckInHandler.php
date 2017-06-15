<?php
namespace MrModule\FileVaultStatus;

use Mr\CheckIn\ParsesText;
use Mr\Contracts\CheckIn\Handler;

class CheckInHandler implements Handler
{
    use ParsesText;

    protected $translate = [
        'fv_users' => 'filevault_users'
    ];

    public static $handles = ['filevault_status'];

    /**
     * @param $moduleName string The short name of the class of data that needs to be handled.
     * @param $data array A hash of data to process.
     * @return mixed
     */
    public function process($moduleName, $serialNumber, $data)
    {
        $fvstatus = FileVaultStatus::firstOrNew(['serial_number' => $serialNumber]);

        $attrs = $this->parseTextRecord($data, ' = ', $this->translate);
        $fvstatus->fill($attrs);
        $fvstatus->serial_number = $serialNumber;

        $fvstatus->save();
    }
}