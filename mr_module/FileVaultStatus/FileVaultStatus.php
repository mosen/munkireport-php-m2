<?php
namespace MrModule\FileVaultStatus;


use Illuminate\Database\Eloquent\Model;

class FileVaultStatus extends Model
{
    protected $table = 'filevault_status';

    protected $fillable = [
        'filevault_status',
        'filevault_users'
    ];
}