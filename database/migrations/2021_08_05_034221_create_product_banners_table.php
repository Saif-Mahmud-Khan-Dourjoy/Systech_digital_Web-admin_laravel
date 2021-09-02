<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_banners', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('product_id')->unsigned();
            $table->string('background_image',150)->unique();
            $table->string('product_icon',150)->unique();
            $table->string('banner_headline');
            $table->text('banner_text');
            $table->string('button1_text',30)->nullable();
            $table->string('button1_link',150)->nullable();
            $table->string('button2_text',30)->nullable();
            $table->string('button2_link',150)->nullable();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
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
        Schema::dropIfExists('product_banners');
    }
}
