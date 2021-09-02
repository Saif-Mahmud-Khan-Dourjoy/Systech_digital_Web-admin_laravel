<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductPackagePointsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_package_points', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('product_package_id')->unsigned();
            $table->string('package_point')->nullable();
            $table->foreign('product_package_id')->references('id')->on('product_packages')->onDelete('cascade');
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
        Schema::dropIfExists('product_package_points');
    }
}
