<?php

namespace Mr;

use Illuminate\Database\Eloquent\Model;

class MachineGroup extends Model
{
    const PROP_NAME = 'name';
    const PROP_KEY = 'key';

    protected $table = 'machine_group';

    protected $fillable = [
        'property',
        'value'
    ];

    protected $casts = [
        'groupid' => 'integer'
    ];
    
    //// RELATIONSHIPS

    /**
     * Retrieve all report data rows associated with this machine group.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reportData()
    {
        return $this->hasMany('Mr\ReportData', 'machine_group', 'groupid');
    }

    /**
     * Retrieve all machine models associated with this machine group via ReportData.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasManyThrough
     */
    public function machines()
    {
        return $this->hasManyThrough('Mr\ReportData', 'Mr\Machine');
    }
}
