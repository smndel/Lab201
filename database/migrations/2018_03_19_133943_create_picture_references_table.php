<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePictureReferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('picture_references', function (Blueprint $table) {
            $table->string('title', 100)->nullable(); //VARCHAR 100
            $table->string('link', 100); //VARCHAR 100
            $table->unsignedInteger('reference_id');
            $table->foreign('reference_id')->references('id')->on('references')->onDelete('cascade');
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
        Schema::dropIfExists('picture_references');
    }
}
