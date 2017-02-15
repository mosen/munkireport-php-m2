<?php
namespace MrModule\Certificate;

use Carbon\Carbon;
use Mr\Contracts\CheckIn\Handler;
use MrModule\Certificate\Events\CertExpiredEvent;
use MrModule\Certificate\Events\CertExpiryWarningEvent;

class CheckInHandler implements Handler
{
    /**
     * Determine whether MunkiReport data with the given module name may be handled by this CheckInHandler.
     *
     * @param $moduleName string The short name of the class of data that needs to be handled.
     * @return boolean
     */
    public function canHandle($moduleName)
    {
        return $moduleName == 'certificate';
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
        Certificate::where('serial_number', $serialNumber)->delete();

        if (empty($data) || strpos($data, "\n") === false) {
            throw new \Exception('Invalid data in certificate submission');
        }

        foreach (explode("\n", $data) as $line) {
            // Invalid log entry
            if (substr_count($line, "\t") !== 3) continue;

            $parts = explode("\t", $line);

            $c = new Certificate;
            $c->serial_number = $serialNumber;
            $c->cert_exp_time = new Carbon(intval($parts[0])); // Timestamp
            // Trim path to 255 chars. TODO: this restriction shouldnt exist if using a TEXT column.
            $c->cert_path = substr($parts[1], 0, 254);
            // Get Common name out of subject.
            if (preg_match('/subject= CN = ([^,]+)/', $parts[2], $matches)) {
                $c->cert_cn = $matches[1];
            } else {
                $c->cert_cn = 'Unknown';
            }

            if ($c->cert_exp_time->diff(new \DateTime)->invert === 1) {
                event(new CertExpiredEvent($c, 'danger'));
            } elseif ($c->cert_exp_time->diff(new \DateTime) > new \DateInterval('PT4W')) {
                // TODO: configurable expiry warning period
                event(new CertExpiryWarningEvent($c, 'warning'));
            }

            $c->save();
        }
    }
}