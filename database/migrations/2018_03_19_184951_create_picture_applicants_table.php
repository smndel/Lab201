<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePictureApplicantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('picture_applicants', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 100)->nullable(); //VARCHAR 100
            $table->string('link', 100); //VARCHAR 100
            $table->unsignedInteger('applicant_id');
            $table->foreign('applicant_id')->references('id')->on('applicants')->onDelete('cascade');
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
        Schema::dropIfExists('picture_applicants');
    }
}
