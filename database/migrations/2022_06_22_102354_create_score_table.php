<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScoreTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        if(!Schema::hasTable('quizzes')){
        Schema::create('scores', function (Blueprint $table) {
            $table->id();
            $table->integer('Teacher_id')->unsigned();
            $table->foreign('Teacher_id')->references('id')->on('users');
            $table->integer('Student_id')->unsigned();
            $table->foreign('Student_id')->references('id')->on('users');
            $table->integer('Course_id')->unsigned();
            $table->foreign('Course_id')->references('id')->on('courses');
            $table->string('email');
            $table->integer('Score');
            $table->integer('Quiz_num')->default(0);
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
        Schema::dropIfExists('score');
    }
}
