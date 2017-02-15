<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Munkiinfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('munkiinfo', function (Blueprint $table) {
            $table->increments('id');

            $table->string('serial_number');
            $table->string('munkiinfo_key');
            $table->string('munkiinfo_value');

            $table->index(['serial_number', 'munkiinfo_key']);

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
        Schema::dropIfExists('munkiinfo');
    }
}
