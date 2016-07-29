<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttributesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attributes', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('parent_id')->nullable();
            $table->integer('lft')->nullable();
            $table->integer('rgt')->nullable();
            $table->integer('depth')->nullable();

            $table->boolean('is_active');
            $table->timestamps();
        });

        Schema::create('attribute_customer_group', function (Blueprint $table) {
            $table->integer('customer_group_id')->unsigned();
            $table->integer('attribute_id')->unsigned();
            $table->integer('post_id')->unsigned();

            $table->foreign('customer_group_id')
                ->references('id')
                ->on('customer_groups')
                ->onDelete('cascade');

            $table->foreign('attribute_id')
                ->references('id')
                ->on('attributes')
                ->onDelete('cascade');
        });

        Schema::create('attribute_post', function (Blueprint $table) {
            $table->integer('post_id')->unsigned();
            $table->integer('attribute_id')->unsigned();

            $table->foreign('post_id')
                ->references('id')
                ->on('posts')
                ->onDelete('cascade');

            $table->foreign('attribute_id')
                ->references('id')
                ->on('attributes')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('attribute_post');
        Schema::drop('attribute_customer_group');
        Schema::drop('attributes');
    }
}
