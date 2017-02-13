<?php
namespace Mr\CheckIn;

use Mr\Contracts\CheckIn\Handler;
use Mr\ReportData;

class ReportDataCheckInHandler implements Handler
{
    /**
     * Determine whether MunkiReport data with the given module name may be handled by this CheckInHandler.
     *
     * @param $moduleName string The short name of the class of data that needs to be handled.
     * @return boolean
     */
    public function canHandle($moduleName)
    {
        return $moduleName == 'reportdata';
    }

    /**
     * @param $moduleName string The short name of the class of data that needs to be handled.
     * @param $data array A hash of data to process.
     * @return mixed
     */
    public function process($moduleName, $serialNumber, $data)
    {
        $rdata = ReportData::firstOrNew(['serial_number' => $serialNumber]);
        $rdata->serial_number = $serialNumber;

        $rdata->fill($data);
        $rdata->save();
    }
}