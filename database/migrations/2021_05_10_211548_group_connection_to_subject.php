<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GroupConnectionToSubject extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('group_to_subjects', function (Blueprint $table) {
            $table->unsignedBigInteger('group_id') ->unsigned();
            $table->foreign('group_id') -> references('id') -> on('groups') -> onDelete('cascade');
            $table->unsignedBigInteger('subject_id') ->unsigned();
            $table->foreign('subject_id') -> references('id') -> on('subjects') -> onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('group_to_subjects', function (Blueprint $table) {

        });
    }
}
