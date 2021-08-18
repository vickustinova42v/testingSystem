<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class QuestionOfUserConnectionToUserTest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('questions_of_users', function (Blueprint $table) {
            $table->unsignedBigInteger('user_test_id') ->unsigned();
            $table->foreign('user_test_id') -> references('id') -> on('test_to_users') -> onDelete('cascade');
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
        Schema::table('user_test', function (Blueprint $table) {

        });
    }
}
