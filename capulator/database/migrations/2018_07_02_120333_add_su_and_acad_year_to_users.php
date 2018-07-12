<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSuAndAcadYearToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users',function($table){
            $table->integer('su');
            $table->integer('year_start');
            $table->integer('year_end');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users',function($table){
            $table->dropColumn('su');
            $table->dropColumn('year_start');
            $table->dropColumn('year_end');
        });
    }
}
