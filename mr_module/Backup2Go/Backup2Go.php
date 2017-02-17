<?php
namespace MrModule\Backup2Go;

use Illuminate\Database\Eloquent\Model;

class Backup2Go extends Model
{
    protected $table = 'backup2go';

    protected $fillable = [
        'backupdate'
    ];
}