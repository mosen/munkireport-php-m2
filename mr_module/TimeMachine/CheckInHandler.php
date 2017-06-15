<?php
namespace MrModule\TimeMachine;


use Mr\Contracts\CheckIn\Handler;

class CheckInHandler implements Handler
{
    public static $handles = ['timemachine'];

    /**
     * @param $moduleName string The short name of the class of data that needs to be handled.
     * @param $serialNumber
     * @param $data array A hash of data to process.
     * @return mixed
     */
    public function process($moduleName, $serialNumber, $data)
    {
        $tm = TimeMachine::firstOrNew(['serial_number' => $serialNumber]);

        // Parse log data
        $start = ''; // Start date
        foreach (explode("\n", $data) as $line) {
            $date = substr($line, 0, 19);
            $message = substr($line, 21);
            
            if (preg_match('/^Starting (automatic|manual) backup/', $message)) {
                $start = $date;
            } elseif (preg_match('/^Backup completed successfully/', $message)) {
                if ($start) {
                    $tm->duration = strtotime($date) - strtotime($start);
                } else {
                    $tm->duration = 0;
                }
                $tm->last_success = $date;
            } elseif (preg_match('/^Backup failed/', $message)) {
                $tm->last_failure = $date;
                $tm->last_failure_msg = $message;
            }
        }

        // Only store if there is data
        if ($tm->last_success or $tm->last_failure) {
            $tm->save();
        }
    }
}