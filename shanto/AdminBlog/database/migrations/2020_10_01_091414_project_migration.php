<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ProjectMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::create('projects',function (Blueprint $blueprint){
           $blueprint->bigIncrements('id');
           $blueprint->string('project_name');
           $blueprint->string('project_des');
           $blueprint->string('project_link');
           $blueprint->string('project_image');
           $blueprint->string('project_image1');
           $blueprint->string('project_image2');
           $blueprint->string('project_image3');
           $blueprint->string('project_image4');
           $blueprint->string('project_image5');
           $blueprint->string('project_image6');
           $blueprint->string('project_image7');
           $blueprint->string('project_image8');
           $blueprint->string('project_image9');
           $blueprint->string('project_image10');
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
