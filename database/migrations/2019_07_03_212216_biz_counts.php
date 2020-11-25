<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BizCounts extends Migration
{
     /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biz_counts', function (Blueprint $table) {
            $table->integer('coin_id');
            $table->integer('name_count')->nullable();
            $table->integer('symbol_count')->nullable();
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
        Schema::drop('biz_counts');
    }
}
