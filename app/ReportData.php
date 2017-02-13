<?php
namespace Mr;

use Illuminate\Database\Eloquent\Model;

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
        'console_user', 'long_username', 'uptime', 'machine_group'
    ];
}