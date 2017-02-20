<?php

namespace Mr;

use Illuminate\Database\Eloquent\Model;
use Webpatser\Uuid\Uuid;

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

    /**
     * Create a machine group by passing the values for the `name` and `key` properties.
     *
     * @param int $machineGroupId The machine group id to use.
     * @param string $machineGroupName The name of the machine group.
     * @param null|string $machineGroupKey The machine group key you want to use, omit for auto generated key.
     * @return array A hash containing keys that correspond to the properties that were created. Each points to an
     *  Eloquent model.
     */
    public static function createWithParameters($machineGroupId, $machineGroupName, $machineGroupKey = null) {
        if ($machineGroupKey === null) {
            $machineGroupKey = Uuid::generate();
        }

        $nameRow = MachineGroup::create(
            ['property' => MachineGroup::PROP_NAME, 'value' => $machineGroupName, 'groupid' => $machineGroupId]);

        $keyRow = MachineGroup::create(
            ['property' => MachineGroup::PROP_KEY, 'value' => $machineGroupKey, 'groupid' => $machineGroupId]);

        return [
            'name' => $nameRow,
            'key' => $keyRow
        ];
    }

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
