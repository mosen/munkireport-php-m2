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

    //// SCOPES

    use UpdatedSinceScope;
    use NotUpdatedForScope;
    use UpdatedBetweenScope;
    
}