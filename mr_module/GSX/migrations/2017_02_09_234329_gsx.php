<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Gsx extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gsx', function (Blueprint $table) {
            $table->increments('id');

            $table->string('serial_number')->unique();
            $table->string('warrantystatus');
            $table->string('coverageenddate');
            $table->string('coveragestartdate');
            $table->string('daysremaining');
            $table->string('estimatedpurchasedate');
            $table->string('purchasecountry');
            $table->string('registrationdate');
            $table->string('productdescription');
            $table->string('configdescription');
            $table->string('contractcoverageenddate');
            $table->string('contractcoveragestartdate');
            $table->string('contracttype');
            $table->string('laborcovered');
            $table->string('partcovered');
            $table->string('warrantyreferenceno');
            $table->string('isloaner');
            $table->string('warrantymod');
            $table->string('isvintage');
            $table->string('isobsolete');

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
        Schema::dropIfExists('gsx');
    }
}
