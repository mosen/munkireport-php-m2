<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Mrevent extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Had to be renamed from `event` due to a name clash with laravel
        Schema::create('mr_event', function (Blueprint $table) {
            $table->increments('id');


            $table->string('serial_number');
            $table->string('type');
            $table->string('module');
            $table->string('msg');
            $table->string('data');
//            $table->integer('timestamp');

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
        //
    }
}
