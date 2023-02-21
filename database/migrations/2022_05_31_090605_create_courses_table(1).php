<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('courses')){
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->integer('Teacher_id')->unsigned(); 
            $table->foreign('user_id')->references('id')->on('users'); 
            $table->string('description');
            $table->string('duration');
            $table->string('modules');
            $table->string('url');
            $table->string('image_path');
            $table->string('video_path');
            $table->integer('subject_id'); 
            $table->foreign('subject_id')->references('id')->on('subjects'); 
            $table->timestamps();
        });
    }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
