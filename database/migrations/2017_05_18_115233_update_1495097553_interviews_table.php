<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Update1495097553InterviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('interviews', function (Blueprint $table) {
            $table->integer('book_id')->unsigned()->nullable();
                $table->foreign('book_id', '37936_591d60d13fe5c')->references('id')->on('books')->onDelete('cascade');
                
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('interviews', function (Blueprint $table) {
            $table->dropForeign('37936_591d60d13fe5c');
            $table->dropIndex('37936_591d60d13fe5c');
            $table->dropColumn('book_id');
            
        });

    }
}
