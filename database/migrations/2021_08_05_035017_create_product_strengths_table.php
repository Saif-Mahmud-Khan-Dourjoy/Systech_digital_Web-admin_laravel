<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductStrengthsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_strengths', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('product_our_strength_id')->unsigned();
            $table->string('strength_icon');
            $table->string('strength_headtext');
            $table->text('strength_subtext');
            $table->foreign('product_our_strength_id')->references('id')->on('product_our_strengths')->onDelete('cascade');
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
        Schema::dropIfExists('product_strengths');
    }
}
