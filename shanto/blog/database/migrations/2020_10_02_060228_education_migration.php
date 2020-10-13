<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EducationMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education',function (Blueprint $blueprint){
            $blueprint->bigIncrements('id');
            $blueprint->string('education_duration');
            $blueprint->string('education_institute');
            $blueprint->string('education_certificate');
            $blueprint->string('education_major');
            $blueprint->string('education_gpa');
            $blueprint->string('education_board');
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
