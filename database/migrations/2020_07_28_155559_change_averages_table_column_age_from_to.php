<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeAveragesTableColumnAgeFromTo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('averages', function (Blueprint $table) {
            $table->integer('age_from')->change();
            $table->integer('age_to')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('averages', function (Blueprint $table) {
            $table->string('age_from')->change();
            $table->string('age_to')->change();
        });
    }
}
