<?php
namespace MrModule\ARD;

use Illuminate\Database\Eloquent\Model;
use Mr\RelatedBySerialNumber;

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

    //// RELATIONSHIPS

    use RelatedBySerialNumber;
}