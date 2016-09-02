<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGlobalPicturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('global_pictures', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('extension', 10);
            $table->integer('picturable_id');
            $table->string('picturable_type');
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
        Schema::drop('global_pictures');
    }
}
