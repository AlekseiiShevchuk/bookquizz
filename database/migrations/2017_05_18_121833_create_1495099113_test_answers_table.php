<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1495099113TestAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('test_answers')) {
            Schema::create('test_answers', function (Blueprint $table) {
                $table->increments('id');
                $table->string('text');
                $table->integer('test_id')->unsigned()->nullable();
                $table->foreign('test_id', '37942_591d66e961a96')->references('id')->on('tests')->onDelete('cascade');
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
        Schema::dropIfExists('test_answers');
    }
}
