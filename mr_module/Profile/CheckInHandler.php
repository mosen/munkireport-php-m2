<?php
namespace MrModule\Profile;

use Mr\CheckIn\ParsesText;
use Mr\Contracts\CheckIn\Handler;

class CheckInHandler implements Handler
{
    use ParsesText;

    protected $translate
        = [
            'ProfileUUID' => 'profile_uuid',
            'ProfileName' => 'profile_name',
            'ProfileRemovalDisallowed' => 'profile_removal_allowed',
            'PayloadName' => 'payload_name',
            'PayloadDisplayName' => 'payload_display',
            'PayloadData' => 'payload_data'
        ];

    /**
     * Determine whether MunkiReport data with the given module name may be handled by this CheckInHandler.
     *
     * @param $moduleName string The short name of the class of data that needs to be handled.
     * @return boolean
     */
    public function canHandle($moduleName)
    {
        return $moduleName == 'profile';
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
        if (empty($data)) return;
        if (strpos($data, "\n") === false) throw new \Exception('Invalid report data for Profile module');

        foreach ($this->parseTextRecords($data, '---------', " = ", $this->translate) as $attrs) {
            $p = new Profile;
            $p->serial_number = $serialNumber;
            $p->fill($attrs);
            $p->save();
        }
    }
}