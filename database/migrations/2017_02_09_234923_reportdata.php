<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Reportdata extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reportdata', function (Blueprint $table) {
            $table->increments('id');

            $table->string('serial_number')->unique();
            $table->string('console_user')->nullable();
            $table->string('long_username')->nullable();
            $table->ipAddress('remote_ip');
            $table->integer('uptime')->nullable()->default(0);
            $table->timestamp('reg_timestamp')->nullable();
            $table->integer('machine_group')->nullable()->default(0);

            // NOTE: the `timestamp` field has been replaced by Laravel's `updated_at`.
            $table->timestamp('timestamp')->nullable();

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
        Schema::dropIfExists('reportdata');
    }
}
