<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1495100752UserInterviewAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('user_interview_answers')) {
            Schema::create('user_interview_answers', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('user_id')->unsigned()->nullable();
                $table->foreign('user_id', '37948_591d6d507308d')->references('id')->on('users')->onDelete('cascade');
                $table->integer('interview_answer_id')->unsigned()->nullable();
                $table->foreign('interview_answer_id', '37948_591d6d507afb6')->references('id')->on('interview_answers')->onDelete('cascade');
                $table->integer('interview_id')->unsigned()->nullable();
                $table->foreign('interview_id', '37948_591d6d507f2e2')->references('id')->on('interviews')->onDelete('cascade');
                
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
        Schema::dropIfExists('user_interview_answers');
    }
}
