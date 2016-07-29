<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('is_active');
            $table->timestamps();
        });

        Schema::create('customer_group_post', function (Blueprint $table) {
            $table->integer('post_id')->unsigned();
            $table->integer('customer_group_id')->unsigned();

            $table->foreign('post_id')
                ->references('id')
                ->on('posts')
                ->onDelete('cascade');

            $table->foreign('customer_group_id')
                ->references('id')
                ->on('customer_groups')
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
        Schema::drop('customer_group_post');
        Schema::drop('customer_groups');
    }
}
