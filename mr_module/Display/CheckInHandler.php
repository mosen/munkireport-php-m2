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
        'Type = ' => 'type',
        'Serial = ' => 'display_serial',
        'Vendor = ' => 'vendor',
        'Model = ' => 'model',
        'Manufactured = ' => 'manufactured',
        'Native = ' => 'native'
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
            if ($attrs['Type'] === 'Internal') {
                $attrs['Type'] = Display::TYPE_INTERNAL;
            } elseif ($attrs['Type'] === 'External') {
                $attrs['Type'] = Display::TYPE_EXTERNAL;
            }

            $displayInfo = new Display;
            $displayInfo->serial_number = $serialNumber;
            $displayInfo->fill($attrs);
            $displayInfo->save();
        }
        
//        $displayInfo = new Display;
//        $displayInfo->serial_number = $serialNumber;
//
//        foreach (explode("\n", $data) as $line) {
//            $kv = explode(" = ", $line);
//            $value = trim($kv[1]);
//
//            if ((strpos($line, '----------') === 0) && !$displayInfo->isClean()) {
//                $displayInfo->save();
//
//                $displayInfo = new Display;
//                $displayInfo->serial_number = $serialNumber;
//                continue;
//            }
//
//            if (array_key_exists($kv[0]." = ", $this->translate)) {
//                if ($kv[0] === 'Type') {
//                    if ($value === 'Internal') {
//                        $displayInfo->type = Display::TYPE_INTERNAL;
//                    } elseif ($value === 'External') {
//                        $displayInfo->type = Display::TYPE_EXTERNAL;
//                    }
//                } else {
//                    $displayInfo->{$kv[0]} = $value;
//                }
//            }
//        }
    }
}