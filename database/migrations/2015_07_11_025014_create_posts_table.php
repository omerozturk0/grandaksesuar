<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('module_id')->index();
            $table->string('product_code')->nullable();
            $table->string('kyw')->nullable();
            $table->string('dsc')->nullable();
            $table->string('native')->nullable();
            $table->integer('purchase_price')->nullable();
            $table->integer('price')->nullable();
            $table->integer('discount')->nullable();
            $table->boolean('has_slider');
            $table->boolean('is_static');
            $table->boolean('is_active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('posts');
    }
}
