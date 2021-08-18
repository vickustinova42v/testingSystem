<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AnswerOfUserConnectionToUserQuestion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('answers_of_users', function (Blueprint $table) {
            $table->unsignedBigInteger('question_of_user_id') ->unsigned();
            $table->foreign('question_of_user_id') -> references('id') -> on('questions_of_users') -> onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('answers_of_users', function (Blueprint $table) {

        });
    }
}
