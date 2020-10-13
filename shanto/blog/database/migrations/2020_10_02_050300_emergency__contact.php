<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EmergencyContact extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('emergency_contact',function (Blueprint $blueprint){
          $blueprint->bigIncrements('id');
          $blueprint->string('emergency_name');
          $blueprint->string('emergency_address');
          $blueprint->string('emergency_mobile');
          $blueprint->string('emergency_email');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
