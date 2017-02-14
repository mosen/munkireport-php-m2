<?php
namespace MrModule\DiskReport;


use Mr\Contracts\CheckIn\Handler;
use MrModule\DiskReport\Events\LowFreeSpaceEvent;
use MrModule\DiskReport\Events\SMARTFailureEvent;

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
        return $moduleName == 'disk_report';
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
        if (empty($data)) {
            throw new \Exception('No disks in report');
        }

        // Convert old style reports from not migrated clients
        if (isset($data['DeviceIdentifier'])) {
            $data = array($data);
        }

        DiskReport::where('serial_number', $serialNumber)->delete();

        foreach ($data as $disk) {
            // Calculate percentage
            if (isset($disk['TotalSize']) && isset($disk['FreeSpace'])) {
                $disk['Percentage'] = round(($disk['TotalSize'] - $disk['FreeSpace']) /
                    max($disk['TotalSize'], 1) * 100);
            }

            // Determine VolumeType
            $disk['VolumeType'] = "hdd";
            if (isset($disk['SolidState']) && $disk['SolidState'] == true) {
                $disk['VolumeType'] = "ssd";
            }
            if (isset($disk['CoreStorageCompositeDisk']) && $disk['CoreStorageCompositeDisk'] == true) {
                $disk['VolumeType'] = "fusion";
            }
            if (isset($disk['RAIDMaster']) && $disk['RAIDMaster'] == true) {
                $disk['VolumeType'] = "raid";
            }
            if (isset($disk['Content']) && $disk['Content'] == 'Microsoft Basic Data') {
                $disk['VolumeType'] = "bootcamp";
            }

            $diskModel = new DiskReport;
            $diskModel->serial_number = $serialNumber;
            $diskModel->fill($disk);
            // Typecast Boolean values
            $diskModel->Internal = (bool)$disk['Internal'];
            $diskModel->CoreStorageEncrypted = (bool)$disk['CoreStorageEncrypted'];

            $diskModel->save();

            if ($diskModel->MountPoint == '/') {
                if ($diskModel->SMARTStatus == 'Failing') {
                    event(new SMARTFailureEvent($diskModel));
                }

                foreach (config('mr_disk_report.thresholds') as $name => $value) {
                    if ($diskModel->FreeSpace < $value * 10^9) {
                        // omitted: lowvalue 1gb
                        event(new LowFreeSpaceEvent($diskModel, $name));
                        break;
                    }
                }
            }
        }
    }
}