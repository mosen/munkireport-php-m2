<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Power extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('power', function (Blueprint $table) {
            $table->increments('id');

            $table->string('serial_number')->unique();
            $table->dateTimeTz('manufacture_date');
            $table->integer('design_capacity');
            $table->integer('max_capacity');
            $table->integer('max_percent');
            $table->integer('current_capacity');
            $table->integer('current_percent');
            $table->integer('cycle_count');
            $table->integer('temperature');
            $table->string('condition');
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
        Schema::dropIfExists('power');
    }
}
