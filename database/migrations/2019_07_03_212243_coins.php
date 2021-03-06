<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Coins extends Migration
{
     /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coins', function (Blueprint $table) {
            $table->integer('coin_id');
            $table->text('name')->nullable();
            $table->text('symbol')->nullable();
            $table->text('slug')->nullable();
            $table->integer('rank')->nullable();
            $table->float('price_btc', null, null)->nullable();
            $table->float('price_usd', null, null)->nullable();
            $table->float('price_eth', null, null)->nullable();
            $table->float('total_supply', null, null)->nullable();
            $table->float('circulating_supply', null, null)->nullable();
            $table->float('max_supply', null, null)->nullable();
            $table->float('change_1h', null, null)->nullable();
            $table->float('change_24h', null, null)->nullable();
            $table->float('change_7d', null, null)->nullable();
            $table->float('market_cap', null, null)->nullable();
            $table->float('market_cap_percent', null, null)->nullable();
            $table->float('volume_24h', null, null)->nullable();
            $table->float('volume_24h_percent', null, null)->nullable();
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
        Schema::drop('coins');
    }
}
