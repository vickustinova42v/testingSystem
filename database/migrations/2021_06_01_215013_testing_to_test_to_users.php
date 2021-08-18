<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TestingToTestToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('test_to_users', function (Blueprint $table) {
            $table->unsignedBigInteger('testing_id') ->unsigned();
            $table->foreign('testing_id') -> references('id') -> on('testings') -> onDelete('cascade');
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
