<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Munkireport extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('munkireport', function (Blueprint $table) {
            $table->increments('id');

            $table->string('serial_number')->unique();
            $table->string('runtype');
            $table->string('version');
            $table->integer('errors');
            $table->integer('warnings');
            $table->string('manifestname');
            $table->json('error_json');
            $table->json('warning_json');
            $table->dateTimeTz('starttime');
            $table->dateTimeTz('endtime');
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
        Schema::dropIfExists('munkireport');
    }
}
