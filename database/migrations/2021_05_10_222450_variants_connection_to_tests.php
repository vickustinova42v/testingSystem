<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class VariantsConnectionToTests extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('variant_of_tests', function (Blueprint $table) {
            $table->unsignedBigInteger('test_id') ->unsigned();
            $table->foreign('test_id') -> references('id') -> on('tests') -> onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('variant_of_tests', function (Blueprint $table) {

        });
    }
}
