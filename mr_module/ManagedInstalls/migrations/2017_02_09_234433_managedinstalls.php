<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Managedinstalls extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('managedinstalls', function (Blueprint $table) {
            $table->increments('id');

            $table->string('serial_number');
            $table->string('name');
            $table->string('display_name');
            $table->string('version')->nullable();
            $table->integer('size')->nullable();
            $table->integer('installed');
            $table->string('status');
            $table->string('type');

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
        Schema::dropIfExists('managedinstalls');
    }
}
