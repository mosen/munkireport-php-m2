<?php

namespace Mr;

use Illuminate\Database\Eloquent\Model;

/**
 * Business Unit Model.
 *
 * Currently business units are implemented as a key - value table containing three things:
 * 
 * - A business unit identifier (unitid).
 * - A property name eg. (name, address and link).
 * - A property value (corresponding to the property name).
 *
 * Property names CAN be duplicate (i.e machine_group can have multiple values)
 *
 * @package Mr
 */
class BusinessUnit extends Model
{
    // Standard values for the `property` column.
    const PROP_NAME = 'name';
    const PROP_ADDRESS = 'address';
    const PROP_LINK = 'link';
    const PROP_USER = 'user';
    const PROP_MANAGER = 'manager';
    const PROP_MACHINE_GROUP = 'machine_group';

    protected $table = 'business_unit';

    protected $fillable = [

    ];

    protected $casts = [
        'unitid' => 'integer'
    ];

    //// RELATIONSHIPS
    
    //// SCOPES

    

}
