<?php
namespace MrModule\Printer;

use Mr\CheckIn\ParsesText;
use Mr\Contracts\CheckIn\Handler;

class CheckInHandler implements Handler
{
    use ParsesText;

    /**
     * @var array Hash of strings to match and their respective database fields.
     */
    protected $translate = [
        'Name' => 'name',
        'PPD' => 'ppd',
        'Driver Version' => 'driver_version',
        'URL' => 'url',
        'Default Set' => 'default_set',
        'Printer Status' => 'printer_status',
        'Printer Sharing' => 'printer_sharing'
    ];

    public static $handles = ['printer'];

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
        if (strpos($data, "\n") === false) throw new \Exception('Invalid report data for printers');

        Printer::where('serial_number', $serialNumber)->delete();

        $p = new Printer;
        $p->serial_number = $serialNumber;

        foreach (explode("\n", $data) as $line) {
            if (strpos($line, ": ") === false) continue;

            $kv = explode(": ", $line, 2);
            $value = trim($kv[1]);

            if (array_key_exists($kv[0], $this->translate)) {
                $p->{$this->translate[$kv[0]]} = $value;
            }

            if ($this->translate[$kv[0]] === 'printer_sharing') {
                $p->save();
                $p = new Printer;
                $p->serial_number = $serialNumber;
            }
        }
    }
}