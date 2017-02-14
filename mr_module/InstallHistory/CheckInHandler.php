<?php
namespace MrModule\InstallHistory;


use Mr\Contracts\CheckIn\Handler;

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
        return $moduleName == 'installhistory';
    }

    /**
     * @param $moduleName string The short name of the class of data that needs to be handled.
     * @param $data array A hash of data to process.
     * @return mixed
     */
    public function process($moduleName, $serialNumber, $data)
    {
        InstallHistory::where('serial_number', $serialNumber)->delete();

        foreach ($data as $item) {
            if (!empty($item['packageIdentifiers'])) {
                // PackageIdentifiers is an array, so we only retain one
                // packageidentifier so we can differentiate between
                // Apple and third party tools
                $item['packageIdentifiers'] = array_pop($item['packageIdentifiers']);
            }
            
            $item['serial_number'] = $serialNumber;

            $ih = InstallHistory::create($item);
        }
    }
}