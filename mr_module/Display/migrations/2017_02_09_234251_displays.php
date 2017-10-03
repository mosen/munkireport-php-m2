<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Displays extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('displays', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('type');
            $table->string('display_serial');
            $table->string('serial_number');
            $table->string('vendor');
            $table->string('model');
            $table->integer('manufactured');
            $table->string('native');
//            $table->integer('timestamp');

            $table->unique(['serial_number', 'display_serial'], 'displays_serial_number_display_serial_unique');
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
        Schema::dropIfExists('displays');
    }
}
