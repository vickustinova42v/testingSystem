<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class QuestionsConnectionToTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('question_to_variants', function (Blueprint $table) {
            $table->unsignedBigInteger('question_id') ->unsigned();
            $table->foreign('question_id') -> references('id') -> on('questions') -> onDelete('cascade');
            $table->unsignedBigInteger('variant_id') ->unsigned();
            $table->foreign('variant_id') -> references('id') -> on('variant_of_tests') -> onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tables', function (Blueprint $table) {
            //
        });
    }
}
