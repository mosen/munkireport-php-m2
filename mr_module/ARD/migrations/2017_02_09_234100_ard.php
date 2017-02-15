<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Ard extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ard', function (Blueprint $table) {
            $table->increments('id');
            $table->string('serial_number')->unique();
            $table->text('Text1')->nullable();
            $table->text('Text2')->nullable();
            $table->text('Text3')->nullable();
            $table->text('Text4')->nullable();
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
        Schema::dropIfExists('ard');
    }
}
