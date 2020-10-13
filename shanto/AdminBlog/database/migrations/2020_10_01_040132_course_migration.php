<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CourseMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses',function(Blueprint $blueprint){
            $blueprint->bigIncrements('id');
            $blueprint->string('course_name');
            $blueprint->string('course_des');
            $blueprint->string('course_fee');
            $blueprint->string('course_total_class');
            $blueprint->string('course_total_enroll');
            $blueprint->string('course_image');
            $blueprint->string('course_link');
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
