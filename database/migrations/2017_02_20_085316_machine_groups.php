<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MachineGroups extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('machine_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('business_unit_id')->unsigned()->nullable();
            $table->string('name')->unique();
            $table->uuid('key')->unique();
            $table->timestamps();

            $table->foreign('business_unit_id')
                ->references('id')
                ->on('business_units')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('machine_groups');
    }
}
