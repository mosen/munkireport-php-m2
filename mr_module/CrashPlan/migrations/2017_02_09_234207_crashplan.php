<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Crashplan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crashplan', function (Blueprint $table) {
            $table->increments('id');
            $table->string('serial_number')->unique();
            $table->text('destination');
            $table->timestamp('last_success');
            $table->integer('duration');
            $table->timestamp('last_failure');
            $table->text('reason');
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
        Schema::dropIfExists('crashplan');
    }
}
