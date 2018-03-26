<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePictureActualitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('picture_actualities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 100)->nullable(); //VARCHAR 100
            $table->string('link', 100); //VARCHAR 100
            $table->unsignedInteger('actuality_id');
            $table->foreign('actuality_id')->references('id')->on('actualities')->onDelete('cascade');
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
        Schema::dropIfExists('picture_actualities');
    }
}
