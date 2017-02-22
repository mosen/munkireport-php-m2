<?php
namespace Mr;

/**
 * Apply this trait to Eloquent models that have a `serial_number` column to automatically have relationships
 * defined for `machine` and `reportdata`.
 * 
 * @package Mr
 */
trait RelatedBySerialNumber
{
    /**
     * Fetch the ReportData model associated with this model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function reportData() {
        return $this->belongsTo('Mr\ReportData', 'serial_number', 'serial_number');
    }

    /**
     * Fetch the Machine model associated with this model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function machine() {
        return $this->belongsTo('Mr\Machine', 'serial_number', 'serial_number');
    }

    /**
     * Fetch events associated with this model.
     *
     * @return mixed
     */
    public function events() {
        return $this->hasMany('Mr\Event', 'serial_number', 'serial_number');
    }
}