<?php
namespace MrModule\DiskReport;

use Illuminate\Database\Eloquent\Model;

class DiskReport extends Model
{
    protected $table = 'diskreport';

    protected $fillable = [
        'TotalSize',
        'FreeSpace',
        'Percentage',
        'SMARTStatus',
        'VolumeType',
        'BusProtocol',
        'Internal',
        'MountPoint',
        'VolumeName',
        'CoreStorageEncrypted'
    ];
}