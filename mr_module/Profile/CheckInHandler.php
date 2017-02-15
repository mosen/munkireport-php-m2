<?php
namespace MrModule\Profile;


use Mr\Contracts\CheckIn\Handler;

class CheckInHandler implements Handler
{
    protected $translate
        = [
            'ProfileUUID = ' => 'profile_uuid',
            'ProfileName = ' => 'profile_name',
            'ProfileRemovalDisallowed = ' => 'profile_removal_allowed',
            'PayloadName = ' => 'payload_name',
            'PayloadDisplayName = ' => 'payload_display',
            'PayloadData = ' => 'payload_data'
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

        $profile = Array();
        foreach (explode("\n", $data) as $line) {
            if ((strpos($line, '---------') === 0) && (!empty($profile))) {
                $p = new Profile;
                $p->serial_number = $serialNumber;
                $p->fill($profile);
                $p->save();

                $profile = Array();
                continue;
            }

            if (strpos($line, " = ") === false) continue;

            $kv = explode(" = ", $line, 2);
            $value = trim($kv[1]);

            if (in_array($kv[0]." = ", array_keys($this->translate))) {
                $tkey = $this->translate[$kv[0]." = "];
                $profile[$tkey] = $value;
            }
        }
    }
}