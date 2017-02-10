<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Machine extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('machine', function (Blueprint $table) {
            $table->increments('id');

            $table->string('serial_number')->unique();
            $table->string('hostname');
            $table->string('machine_model');
            $table->string('machine_desc');
            $table->string('img_url');
            $table->string('cpu');
            $table->string('current_processor_speed');
            $table->string('cpu_arch');
            $table->integer('os_version');
            $table->integer('physical_memory');
            $table->uuid('platform_UUID');
            $table->integer('number_processors');
            $table->string('SMC_version_system');
            $table->string('boot_rom_version');
            $table->string('bus_speed');
            $table->string('computer_name');
            $table->string('l2_cache');
            $table->string('machine_name');
            $table->string('packages');
            $table->string('buildversion');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('machine');
    }
}
