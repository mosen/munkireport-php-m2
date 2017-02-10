<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Profile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profile', function (Blueprint $table) {
            $table->increments('id');

            $table->string('serial_number')->unique();
            $table->uuid('profile_uuid');
            $table->string('profile_name');
            $table->string('profile_removal_allowed');
            $table->string('payload_name');
            $table->string('payload_display');
            $table->string('payload_data');
//            $table->integer('timestamp');

            $table->index(['serial_number', 'profile_uuid']);

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
        Schema::dropIfExists('profile');
    }
}
