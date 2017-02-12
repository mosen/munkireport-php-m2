<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class WidgetInstances extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('widget_instances', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');

            $table->integer('dashboard_id')->unsigned();
            $table->foreign('dashboard_id')
                ->references('id')->on('dashboards');
            $table->integer('width_units')->unsigned()->default(1);
            $table->integer('height_units')->unsigned()->default(1);
            $table->string('type');
            $table->string('endpoint_uri'); // URI
            $table->string('endpoint_type'); // JSON, JSONP, XML
            $table->string('aggregate_function'); // NULL, SUM, COUNT, AVG, MIN, MAX
            $table->string('value_path'); // field.subfield

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
        Schema::dropIfExists('widget_instances');
    }
}
