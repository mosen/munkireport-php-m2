<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Directoryservice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('directoryservice', function (Blueprint $table) {
            $table->increments('id');

            $table->string('serial_number')->unique();
            $table->string('which_directory_service');
            $table->string('directory_service_comments');
            $table->string('adforest');
            $table->string('addomain');
            $table->string('computeraccount');
            $table->boolean('createmobileaccount');
            $table->boolean('requireconfirmation');
            $table->boolean('forcehomeinstartup');
            $table->boolean('mounthomeassharepoint');
            $table->boolean('usewindowsuncpathforhome');
            $table->string('networkprotocoltobeused');
            $table->string('defaultusershell');
            $table->string('mappinguidtoattribute');
            $table->string('mappingusergidtoattribute');
            $table->string('mappinggroupgidtoattr');
            $table->boolean('generatekerberosauth');
            $table->string('preferreddomaincontroller');
            $table->string('allowedadmingroups');
            $table->boolean('authenticationfromanydomain');
            $table->string('packetsigning');
            $table->string('packetencryption');
            $table->string('passwordchangeinterval');
            $table->string('restrictdynamicdnsupdates');
            $table->string('namespacemode');
            
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
        Schema::dropIfExists('directoryservice');
    }
}
