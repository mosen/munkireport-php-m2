<?php
namespace Mr;

use Illuminate\Database\Eloquent\Model;
use Mr\Scopes\NotUpdatedForScope;
use Mr\Scopes\UpdatedBetweenScope;
use Mr\Scopes\UpdatedSinceScope;

class ReportData extends Model
{
    /**
     * @inheritDoc
     */
    protected $table = 'reportdata';

    /**
     * @inheritDoc
     */
    protected $fillable = [
        'console_user',
        'long_username',
        'uptime',
        'machine_group'
    ];

    //// RELATIONSHIPS

    /**
     * Retrieve the machine model associated with this report data.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function machine() {
        return $this->belongsTo('Mr\Machine', 'serial_number', 'serial_number');
    }


    //// SCOPES

    use UpdatedSinceScope;
    use NotUpdatedForScope;
    use UpdatedBetweenScope;
    
}