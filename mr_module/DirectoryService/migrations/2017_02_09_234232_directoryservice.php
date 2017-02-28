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
            $table->string('which_directory_service')->nullable();
            $table->string('directory_service_comments')->nullable();
            $table->string('adforest')->nullable();
            $table->string('addomain')->nullable();
            $table->string('computeraccount')->nullable();
            $table->boolean('createmobileaccount')->nullable();
            $table->boolean('requireconfirmation')->nullable();
            $table->boolean('forcehomeinstartup')->nullable();
            $table->boolean('mounthomeassharepoint')->nullable();
            $table->boolean('usewindowsuncpathforhome')->nullable();
            $table->string('networkprotocoltobeused')->nullable();
            $table->string('defaultusershell')->nullable();
            $table->string('mappinguidtoattribute')->nullable();
            $table->string('mappingusergidtoattribute')->nullable();
            $table->string('mappinggroupgidtoattr')->nullable();
            $table->boolean('generatekerberosauth')->nullable();
            $table->string('preferreddomaincontroller')->nullable();
            $table->string('allowedadmingroups')->nullable();
            $table->boolean('authenticationfromanydomain')->nullable();
            $table->string('packetsigning')->nullable();
            $table->string('packetencryption')->nullable();
            $table->string('passwordchangeinterval')->nullable();
            $table->string('restrictdynamicdnsupdates')->nullable();
            $table->string('namespacemode')->nullable();
            
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
