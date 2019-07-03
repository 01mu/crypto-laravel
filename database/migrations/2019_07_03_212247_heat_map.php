<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class HeatMap extends Migration
{
     /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('heat_map', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('symbol')->nullable();
            $table->integer('time')->nullable();
            $table->integer('instance')->nullable();
            $table->float('difference', null, null)->nullable();
            $table->integer('rank')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('heat_map');
    }
}
