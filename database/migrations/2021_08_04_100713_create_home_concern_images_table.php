<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeConcernImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_concern_images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('home_concern_id')->unsigned();
             $table->string('image')->unique();
             $table->foreign('home_concern_id')->references('id')->on('home_concerns')->onDelete('cascade');
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
        Schema::dropIfExists('home_concern_images');
    }
}
