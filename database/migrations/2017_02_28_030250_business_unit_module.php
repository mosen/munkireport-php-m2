<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BusinessUnitModule extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_unit_module', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('business_unit_id')->unsigned();
            $table->integer('module_id')->unsigned();

            $table->foreign('business_unit_id')
                ->references('id')
                ->on('business_units')
                ->onDelete('cascade');

            $table->foreign('module_id')
                ->references('id')
                ->on('modules')
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
        Schema::dropIfExists('business_unit_module');
    }
}
