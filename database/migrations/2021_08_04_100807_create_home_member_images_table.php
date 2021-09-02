<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomeMemberImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_member_images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('home_member_id')->unsigned();
             $table->string('image')->unique();
             $table->foreign('home_member_id')->references('id')->on('home_members')->onDelete('cascade');
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
        Schema::dropIfExists('home_member_images');
    }
}
