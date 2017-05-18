<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1495100635UserTestAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('user_test_answers')) {
            Schema::create('user_test_answers', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('user_id')->unsigned()->nullable();
                $table->foreign('user_id', '37947_591d6cdb0dfb7')->references('id')->on('users')->onDelete('cascade');
                $table->integer('test_answer_id')->unsigned()->nullable();
                $table->foreign('test_answer_id', '37947_591d6cdb1584c')->references('id')->on('test_answers')->onDelete('cascade');
                $table->integer('test_id')->unsigned()->nullable();
                $table->foreign('test_id', '37947_591d6cdb19f9c')->references('id')->on('tests')->onDelete('cascade');
                
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
        Schema::dropIfExists('user_test_answers');
    }
}
