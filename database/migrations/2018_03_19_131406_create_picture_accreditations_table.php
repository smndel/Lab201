<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePictureAccreditationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('picture_accreditations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 100)->nullable(); //VARCHAR 100
            $table->string('link', 100); //VARCHAR 100
            $table->unsignedInteger('accreditation_id');
            $table->foreign('accreditation_id')->references('id')->on('accreditations')->onDelete('cascade');
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
        Schema::dropIfExists('picture_accreditations');
    }
}
