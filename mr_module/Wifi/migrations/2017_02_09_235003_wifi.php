<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Wifi extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wifi', function (Blueprint $table) {
            $table->increments('id');
            
            $table->string('serial_number')->unique();
            $table->integer('agrctlrssi');
            $table->integer('agrextrssi');
            $table->integer('agrctlnoise');
            $table->integer('agrextnoise');
            $table->string('state');
            $table->string('op_mode');
            $table->integer('lasttxrate');
            $table->string('lastassocstatus');
            $table->integer('maxrate');
            $table->string('x802_11_auth');
            $table->string('link_auth');
            $table->string('bssid');
            $table->string('ssid');
            $table->integer('mcs');
            $table->string('channel');

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
        Schema::dropIfExists('wifi');
    }
}
