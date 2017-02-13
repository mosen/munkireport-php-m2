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
        'serial_number' // Required for firstOrNew to work
    ];
}