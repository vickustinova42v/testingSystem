<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TestOfUserConnectionToTests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('test_to_users', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id') ->unsigned();
            $table->foreign('user_id') -> references('id') -> on('users') -> onDelete('cascade');
            $table->unsignedBigInteger('variant_id') ->unsigned();
            $table->foreign('variant_id') -> references('id') -> on('variant_of_tests') -> onDelete('cascade');
            $table->unsignedBigInteger('status_id') ->unsigned();
            $table->foreign('status_id') -> references('id') -> on('status_of_tests') -> onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('test_to_users', function (Blueprint $table) {

        });
    }
}
