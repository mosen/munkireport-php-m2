<?php
namespace MrModule\DiskReport;

use Illuminate\Database\Eloquent\Model;

class DiskReport extends Model
{
    /**
     * These consts identify the strings to match for SMART statuses.
     */
    const SMART_FAILING = 'Failing';
    const SMART_VERIFIED = 'Verified';
    const SMART_UNSUPPORTED = 'Not Supported';

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

    protected $casts = [
        'TotalSize' => 'integer',
        'FreeSpace' => 'integer',
        'Percentage' => 'integer'
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

    /**
     * Get the report data model associated with this disk report.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function reportData() {
        return $this->belongsTo('Mr\ReportData', 'serial_number', 'serial_number');
    }
}