<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanySubSectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_sub_sections', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('about_company_id')->unsigned();
             $table->string('head_text');
             $table->text('sub_text');
             $table->string('icon')->unique();
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
        Schema::dropIfExists('company_sub_sections');
    }
}
