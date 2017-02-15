<?php
namespace MrModule\FindMyMac;


use Mr\CheckIn\ParsesText;
use Mr\Contracts\CheckIn\Handler;

class CheckInHandler implements Handler
{
    use ParsesText;

    protected $translate
        = [
            'Status = ' => 'status',
            'OwnerDisplayName = ' => 'ownerdisplayname',
            'Email = ' => 'email',
            'personID = ' => 'personid',
            'hostname = ' => 'hostname'
        ];

    /**
     * Determine whether MunkiReport data with the given module name may be handled by this CheckInHandler.
     *
     * @param $moduleName string The short name of the class of data that needs to be handled.
     * @return boolean
     */
    public function canHandle($moduleName)
    {
        return $moduleName === 'findmymac';
    }

    /**
     * @param $moduleName string The short name of the class of data that needs to be handled.
     * @param $serialNumber
     * @param $data array A hash of data to process.
     * @return mixed
     * @throws \Exception
     */
    public function process($moduleName, $serialNumber, $data)
    {
        if (empty($data)) {
            return;
        }
        if (strpos($data, "\n") === false) {
            throw new \Exception('Invalid report data for FindMyMac module');
        }

        $fmm = FindMyMacInfo::firstOrNew(['serial_number' => $serialNumber]);
        $attrs = $this->parseTextRecord($data, " = ", $this->translate);

        $fmm->fill($attrs);
        $fmm->save();
    }
}