<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Installhistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('installhistory', function (Blueprint $table) {
            $table->increments('id');

            $table->string('serial_number')->unique();
            $table->dateTimeTz('date');
            $table->string('displayName');
            $table->string('displayVersion');
            $table->string('packageIdentifiers');
            $table->string('processName');

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
        Schema::dropIfExists('installhistory');
    }
}
