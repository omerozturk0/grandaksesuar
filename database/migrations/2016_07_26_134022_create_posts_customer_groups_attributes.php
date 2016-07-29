<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsCustomerGroupsAttributes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts_customer_groups_attributes', function (Blueprint $table) {
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

            $table->foreign('post_id')
                ->references('id')
                ->on('posts')
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
        Schema::drop('posts_customer_groups_attributes');
    }
}
