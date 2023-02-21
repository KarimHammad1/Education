<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizzesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('quizzes')){
        Schema::create('quizzes', function (Blueprint $table) {
            $table->id();
            $table->integer('Teacher_id')->unsigned(); 
            $table->foreign('Teacher_id')->references('id')->on('users'); 
            $table->integer('course_id')->unsigned(); 
            $table->foreign('course_id')->references('id')->on('courses'); 
            $table->string('Quiz_1');
            $table->string('Quiz_2');
            $table->string('Quiz_3');
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
        Schema::dropIfExists('quizzes');
    }
}
