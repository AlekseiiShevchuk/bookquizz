<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1495114045UserAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('user_answers')) {
            Schema::create('user_answers', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('user_id')->unsigned()->nullable();
                $table->foreign('user_id', '38003_591da13dd8c9a')->references('id')->on('users')->onDelete('cascade');
                $table->integer('user_answer_id')->unsigned()->nullable();
                $table->foreign('user_answer_id', '38003_591da13de28ef')->references('id')->on('possible_answers')->onDelete('cascade');
                $table->integer('quiz_id')->unsigned()->nullable();
                $table->foreign('quiz_id', '38003_591da13de76c7')->references('id')->on('quizzes')->onDelete('cascade');
                
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
        Schema::dropIfExists('user_answers');
    }
}
