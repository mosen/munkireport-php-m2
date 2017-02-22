<?php
namespace MrModule\Backup2Go;

use Mr\SerialNumberModel;

class Backup2Go extends SerialNumberModel
{
    protected $table = 'backup2go';

    protected $fillable = [
        'backupdate'
    ];
}