<?php
namespace MrModule\FindMyMac;


use Illuminate\Database\Eloquent\Model;

class FindMyMacInfo extends Model
{
    protected $table = 'findmymac';

    protected $fillable = [
        'serial_number',
        'status',
        'ownerdisplayname',
        'email',
        'personid',
        'hostname'
    ];
}