<?php

namespace MrModule\Ard;


use Illuminate\Database\Eloquent\Model;

class ARDInfo extends Model
{
    protected $table = 'ard';

    protected $fillable = [
        'serial_number',
        'Text1',
        'Text2',
        'Text3',
        'Text4'
    ];
}