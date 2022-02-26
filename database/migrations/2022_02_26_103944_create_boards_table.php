<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBoardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boards', function (Blueprint $table) {
            $table->unsignedBigInteger('id', true);
            // peopleテーブルのidを割り当てる（誰の投稿かを紐付ける
            $table->unsignedBigInteger('person_id');
            $table->foreign('person_id')->references('id')->on('people');

            $table->string('title');
            $table->string('message');
            $table->timestamps();

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('boards');
    }
}
