<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Deploystudio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deploystudio', function (Blueprint $table) {
            $table->increments('id');
            $table->string('serial_number')->unique();
            $table->string('architecture');
            $table->text('cn');
            $table->string('dstudio_host_new_network_location');
            $table->string('dstudio_host_primary_key');
            $table->string('dstudio_host_serial_number');
            $table->string('dstudio_host_type');
            $table->string('dstudio_hostname');
            $table->string('dstudio_last_workflow');
            $table->string('dstudio_last_workflow_duration');
            $table->string('dstudio_last_workflow_execution_date');
            $table->string('dstudio_last_workflow_status');
            $table->macAddress('dstudio_mac_addr');
            $table->string('dstudio_auto_disable');
            $table->string('dstudio_auto_reset_workflow');
            $table->string('dstudio_auto_started_workflow');
            $table->string('dstudio_bootcamp_windows_computer_name');
            $table->boolean('dstudio_disabled');
            $table->string('dstudio_group');
            $table->string('dstudio_host_ard_field_1');
            $table->string('dstudio_host_ard_field_2');
            $table->string('dstudio_host_ard_field_3');
            $table->string('dstudio_host_ard_field_4');
            $table->string('dstudio_host_ard_ignore_empty_fields');
            $table->string('dstudio_host_delete_other_locations');
            $table->string('dstudio_host_model_identifier');

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
        Schema::dropIfExists('deploystudio');
    }
}
