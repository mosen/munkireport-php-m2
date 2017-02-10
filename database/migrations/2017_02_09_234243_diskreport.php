<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Diskreport extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diskreport', function (Blueprint $table) {
            $table->increments('id');

            $table->string('serial_number')->unique();
            $table->bigInteger('TotalSize');
            $table->bigInteger('FreeSpace');
            $table->bigInteger('Percentage');
            $table->string('SMARTStatus');
            $table->string('VolumeType');
            $table->string('BusProtocol');
            $table->boolean('Internal');
            $table->string('MountPoint');
            $table->string('VolumeName');
            $table->boolean('CoreStorageEncrypted');
//            $table->string('timestamp');

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
        Schema::dropIfExists('diskreport');
    }
}
