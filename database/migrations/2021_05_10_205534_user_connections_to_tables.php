<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UserConnectionsToTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('group_id') ->nullable()->unsigned();
            $table->foreign('group_id') -> references('id') -> on('groups') -> onDelete('cascade');
            $table->unsignedBigInteger('faculty_id')->unsigned()->nullable();
            $table->foreign('faculty_id') -> references('id') -> on('faculties') -> onDelete('cascade');
            $table->unsignedBigInteger('role_id')->unsigned();
            $table->foreign('role_id') -> references('id') -> on('roles') -> onDelete('cascade');
            $table->unsignedBigInteger('status_id')->unsigned();
            $table->foreign('status_id') -> references('id') -> on('statuses') -> onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {

        });
    }
}
