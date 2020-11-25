<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BizCounts24h extends Migration
{
     /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biz_counts_24h', function (Blueprint $table) {
            $table->integer('coin_id');
            $table->integer('name_count')->nullable();
            $table->integer('symbol_count')->nullable();
            $table->integer('name_count_prev')->nullable();
            $table->integer('symbol_count_prev')->nullable();
            $table->integer('total')->nullable();
            $table->primary('coin_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('biz_counts_24h');
    }
}
