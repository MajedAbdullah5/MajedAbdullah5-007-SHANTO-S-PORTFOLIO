<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ServiceMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services',function (Blueprint $blueprint){
            $blueprint->bigIncrements('id');
            $blueprint->string('service_name');
            $blueprint->string('service_des');
            $blueprint->string('service_link');
            $blueprint->string('service_image');
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
