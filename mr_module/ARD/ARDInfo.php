<?php
namespace MrModule\ARD;

use Mr\SerialNumberModel;

class ARDInfo extends SerialNumberModel
{
    protected $table = 'ard';

    protected $fillable = [
        'serial_number',
        'Text1',
        'Text2',
        'Text3',
        'Text4'
    ];

    //// RELATIONSHIPS
}