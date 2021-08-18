<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class QuestionConnectionToTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('questions', function (Blueprint $table) {
            $table->unsignedBigInteger('topics_id') ->unsigned();
            $table->foreign('topics_id') -> references('id') -> on('topics') -> onDelete('cascade');
            $table->unsignedBigInteger('type_id') ->unsigned();
            $table->foreign('type_id') -> references('id') -> on('type_of_questions') -> onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('questions', function (Blueprint $table) {

        });
    }
}
