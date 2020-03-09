<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BizPosts extends Migration
{
     /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biz_posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->longText('comment')->nullable();
            $table->integer('timestamp')->nullable();
            $table->integer('post_id')->nullable();
            $table->integer('added')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('biz_posts');
    }
}
