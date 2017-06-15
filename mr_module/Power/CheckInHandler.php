<?php
namespace MrModule\Power;

use Mr\CheckIn\ParsesText;
use Mr\Contracts\CheckIn\Handler;

class CheckInHandler implements Handler
{
    use ParsesText;

    protected $translate
        = [
            'manufacture_date = ' => 'manufacture_date',
            'design_capacity = ' => 'design_capacity',
            'max_capacity = ' => 'max_capacity',
            'current_capacity = ' => 'current_capacity',
            'cycle_count = ' => 'cycle_count',
            'temperature = ' => 'temperature',
            'condition = ' => 'condition'
        ];

    public static $handles = ['power'];

    /**
     * @param $moduleName string The short name of the class of data that needs to be handled.
     * @param $data array A hash of data to process.
     * @return mixed
     */
    public function process($moduleName, $serialNumber, $data)
    {
        if (empty($data)) {
            Power::where('serial_number', $serialNumber)->delete();
            return;
        }

        $p = Power::firstOrNew(['serial_number' => $serialNumber]);
        $p->serial_number = $serialNumber;

        $attrs = $this->parseTextRecord($data, " = ", $this->translate);
        $p->fill($attrs);

        if ($p->condition === "No Battery") {
            $p->manufacture_date = null;
            $p->design_capacity = 0;
            $p->max_capacity = 0;
            $p->current_capacity = 0;
            $p->cycle_count = 0;
            $p->temperature = 0;
        }

        // Calculate maximum capacity as percentage of original capacity
        if ( $p->design_capacity > 0) {
            $p->max_percent = round(($p->max_capacity / $p->design_capacity * 100 ), 0 );
        } else {
            $p->max_percent = 0;
        }

        // Calculate percentage of current maximum capacity
        if ( $p->max_capacity > 0) {
            $p->current_percent = round(($p->current_capacity / $p->max_capacity * 100 ), 0 );
        } else {
            $p->current_percent = 0;
        }

        // Convert battery manufacture date to calendar date.
        // Bits 0...4 => day (value 1-31; 5 bits)
        // Bits 5...8 => month (value 1-12; 4 bits)
        // Bits 9...15 => years since 1980 (value 0-127; 7 bits)

        $ManufactureDate = $p->manufacture_date;

        $mfgday = $p->manufacture_date & 31;
        $mfgmonth = ($p->manufacture_date >> 5) & 15;
        $mfgyear = (($p->manufacture_date >> 9) & 127) + 1980;

        $p->manufacture_date = sprintf("%d-%02d-%02d", $mfgyear, $mfgmonth, $mfgday);

        $p->save();
    }
}