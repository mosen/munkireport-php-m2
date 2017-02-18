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

    //// RELATIONSHIPS

    /**
     * Get the machine model associated with this disk report.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function machine() {
        return $this->belongsTo('Mr\Machine', 'serial_number', 'serial_number');
    }
}