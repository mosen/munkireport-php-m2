<?php

namespace Mr;

use Illuminate\Database\Eloquent\Model;

class MachineGroup extends Model
{
    protected $fillable = [
        'name',
        'business_unit_id'
    ];

    //// RELATIONSHIPS

    /**
     * Retrieve the business unit that this machine group is associated with.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function businessUnit() {
        return $this->belongsTo('Mr\BusinessUnit');
    }

    /**
     * Get report data for machines in this machine group.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reportData() {
        return $this->hasMany('Mr\ReportData', 'machine_group');
    }

    /**
     * Get a list of machines associated with this machine group through
     * the report data table.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function machines() {
        return $this->hasManyThrough(
            'Mr\Machine', 'Mr\ReportData',
            'machine_group', 'serial_number'
        );
    }
}
