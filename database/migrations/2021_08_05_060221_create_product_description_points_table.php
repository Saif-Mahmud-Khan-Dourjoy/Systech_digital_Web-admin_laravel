<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductDescriptionPointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_description_points', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('product_description_id')->unsigned();
            $table->string('point');
            $table->foreign('product_description_id')->references('id')->on('product_descriptions')->onDelete('cascade');
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
        Schema::dropIfExists('product_description_points');
    }
}
