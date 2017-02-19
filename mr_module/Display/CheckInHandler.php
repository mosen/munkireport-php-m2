<?php
namespace MrModule\Display;


use Mr\CheckIn\ParsesText;
use Mr\Contracts\CheckIn\Handler;

class CheckInHandler implements Handler
{
    use ParsesText;

    /**
     * @var array Hash of strings in the text submission and their respective database fields.
     */
    protected $translate = [
        'Type' => 'type',
        'Serial' => 'display_serial',
        'Vendor' => 'vendor',
        'Model' => 'model',
        'Manufactured' => 'manufactured',
        'Native' => 'native'
    ];

    /**
     * Determine whether MunkiReport data with the given module name may be handled by this CheckInHandler.
     *
     * @param $moduleName string The short name of the class of data that needs to be handled.
     * @return boolean
     */
    public function canHandle($moduleName)
    {
        return $moduleName == 'displays_info';
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
        if (empty($data) || strpos($data, "\n") === false) {
            return;
            //throw new \Exception('Invalid data submitted in displays info');
        }

        Display::where(['serial_number' => $serialNumber])->delete();

        foreach ($this->parseTextRecords($data, '----------', " = ", $this->translate) as $attrs) {
            if ($attrs['type'] === 'Internal') {
                $attrs['type'] = Display::TYPE_INTERNAL;
            } elseif ($attrs['type'] === 'External') {
                $attrs['type'] = Display::TYPE_EXTERNAL;
            }
            
            // Convert to year.
            if (preg_match('/^(\d{4}).*/', $attrs['manufactured'], $matches)) {
                $attrs['manufactured'] = $matches[1];
            }
            else {
                $attrs['manufactured'] = 0;
            }
            
            $displayInfo = new Display;
            $displayInfo->serial_number = $serialNumber;
            $displayInfo->fill($attrs);
            $displayInfo->save();
        }
    }
}