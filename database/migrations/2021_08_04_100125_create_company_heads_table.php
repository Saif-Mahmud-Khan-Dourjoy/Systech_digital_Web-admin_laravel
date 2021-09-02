<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanyHeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_heads', function (Blueprint $table) {
             $table->increments('id');
             $table->integer('about_company_id')->unsigned();
             $table->string('name');
             $table->string('designation');
             $table->string('signature')->unique();
             $table->foreign('about_company_id')->references('id')->on('about_companies')->onDelete('cascade');
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
        Schema::dropIfExists('company_heads');
    }
}
