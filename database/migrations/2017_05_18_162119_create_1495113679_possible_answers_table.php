<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1495113679PossibleAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('possible_answers')) {
            Schema::create('possible_answers', function (Blueprint $table) {
                $table->increments('id');
                $table->string('text');
                $table->integer('quiz_id')->unsigned()->nullable();
                $table->foreign('quiz_id', '38002_591d9fcf556d6')->references('id')->on('quizzes')->onDelete('cascade');
                $table->tinyInteger('is_correct')->default(0);
                
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
        Schema::dropIfExists('possible_answers');
    }
}
