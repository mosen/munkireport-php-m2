<?php
namespace MrModule\InstallHistory;

use Illuminate\Database\Eloquent\Model;

class InstallHistory extends Model
{
    protected $table = 'installhistory';

    protected $fillable = [
        'serial_number',
        'date',
        'displayName',
        'displayVersion',
        'packageIdentifiers',
        'processName'
    ];
}