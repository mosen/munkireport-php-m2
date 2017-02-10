<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Location extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('location', function (Blueprint $table) {
            $table->increments('id');

            $table->string('serial_number')->unique();
            $table->string('address');
            $table->integer('altitude');
            $table->string('currentstatus');
            $table->boolean('ls_enabled');
            $table->string('lastlocationrun');
            $table->string('lastrun');
            $table->double('latitude');
            $table->integer('latitudeaccuracy');
            $table->double('longitude');
            $table->integer('longitudeaccuracy');
            $table->string('stalelocation');

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
        Schema::dropIfExists('location');
    }
}
