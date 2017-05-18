<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1495098821InterviewAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('interview_answers')) {
            Schema::create('interview_answers', function (Blueprint $table) {
                $table->increments('id');
                $table->string('text');
                $table->integer('interview_id')->unsigned()->nullable();
                $table->foreign('interview_id', '37940_591d65c5d5d6a')->references('id')->on('interviews')->onDelete('cascade');
                
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
        Schema::dropIfExists('interview_answers');
    }
}
