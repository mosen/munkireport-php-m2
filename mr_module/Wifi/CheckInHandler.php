<?php
namespace MrModule\Wifi;

use Mr\CheckIn\ParsesText;
use Mr\Contracts\CheckIn\Handler;

class CheckInHandler implements Handler
{
    use ParsesText;

    /**
     * @var array Hash of text fields in the submitted output respective to their database column names.
     */
    protected $translate = [
        'agrCtlRSSI' => 'agrctlrssi',
        'agrExtRSSI' => 'agrextrssi',
        'agrCtlNoise' => 'agrctlnoise',
        'agrExtNoise' => 'agrextnoise',
        'state' => 'state',
        'op mode' => 'op_mode',
        'lastTxRate' => 'lasttxrate',
        'maxRate' => 'maxrate',
        'lastAssocStatus' => 'lastassocstatus',
        '802.11 auth' => 'x802_11_auth',
        'link auth' => 'link_auth',
        'BSSID' => 'bssid',
        'SSID' => 'ssid',
        'MCS' => 'mcs',
        'channel' => 'channel'
    ];

    public static $handles = ['wifi'];

    /**
     * @param $moduleName string The short name of the class of data that needs to be handled.
     * @param $data array A hash of data to process.
     * @return mixed
     */
    public function process($moduleName, $serialNumber, $data)
    {
        $wifi = Wifi::firstOrNew(['serial_number' => $serialNumber]);
        $wifi->serial_number = $serialNumber;

        $attrs = $this->parseTextRecord($data, ": ", $this->translate);
        $wifi->fill($attrs);
        $wifi->save();
    }
}