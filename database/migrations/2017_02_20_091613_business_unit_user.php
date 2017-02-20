<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BusinessUnitUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_unit_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('business_unit_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->enum('role', ['admin', 'manager', 'user', 'nobody']);
            $table->timestamps();
            
            $table->foreign('business_unit_id')
                ->references('id')
                ->on('business_units')
                ->onDelete('cascade');

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('business_unit_user');
    }
}
