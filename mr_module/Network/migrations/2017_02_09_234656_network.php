<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Network extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('network', function (Blueprint $table) {
            $table->increments('id');

            $table->string('serial_number');
            $table->string('service');
            $table->integer('order');
            $table->integer('status');
            $table->macAddress('ethernet');
            $table->string('clientid');
            $table->string('ipv4conf');
            $table->ipAddress('ipv4ip')->nullable();
            $table->ipAddress('ipv4mask')->nullable();
            $table->ipAddress('ipv4router')->nullable();
            $table->string('ipv6conf');
            $table->string('ipv6ip')->nullable();
            $table->integer('ipv6prefixlen')->nullable();
            $table->string('ipv6router')->nullable();
//            $table->integer('timestamp');

            $table->index(['serial_number', 'order']);

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
        Schema::dropIfExists('network');
    }
}
