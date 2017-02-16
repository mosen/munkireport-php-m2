<?php
namespace Mr;

use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    protected $table = 'machine';

    protected $fillable = [
        'hostname',
        'machine_model',
        'machine_desc',
        'img_url',
        'cpu',
        'current_processor_speed',
        'cpu_arch',
        'os_version',
        'physical_memory',
        'platform_UUID',
        'number_processors',
        'SMC_version_system',
        'boot_rom_version',
        'bus_speed', 
        'computer_name',
        'l2_cache',
        'machine_name',
        'packages',
        'buildversion'
    ];

    //// RELATIONSHIPS

    


    //// SCOPES

    public function scopeDuplicate($query) {
        return $query;
    }
}