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
            $table->string('address')->nullable();
            $table->integer('altitude')->default(0);
            $table->string('currentstatus');
            $table->boolean('ls_enabled')->default(false);
            $table->string('lastlocationrun');
            $table->string('lastrun');
            $table->double('latitude')->default(0.0);
            $table->integer('latitudeaccuracy')->default(0);
            $table->double('longitude')->default(0.0);
            $table->integer('longitudeaccuracy')->default(0);
            $table->string('stalelocation')->nullable();

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
