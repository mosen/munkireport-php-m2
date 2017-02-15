<?php
namespace MrModule\MunkiReport;


use Illuminate\Database\Eloquent\Model;

class MunkiReport extends Model
{
    protected $table = 'munkireport';

    protected $fillable = [
        'runtype',
        'version',
        'errors',
        'warnings',
        'manifestname',
        'error_json',
        'warning_json',
        'starttime',
        'endtime'
    ];
}