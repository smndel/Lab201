<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company', 100)->nullable();
            $table->string('first_name', 100)->nullable();
            $table->string('last_name', 100)->nullable();
            $table->string('phone_number')->nullable();
            $table->string('mail')->nullable();
            $table->date('contact')->nullable();
            $table->enum('accepted', ['oui', 'non', 'en_cours']);
            $table->enum('funded', ['oui', 'non', 'en_cours']);
            $table->integer('experience')->nullable();
            $table->string('career', 100)->nullable();
            $table->decimal('price', 6, 2)->nullable();
            $table->date('questionnaire_sent')->nullable();
            $table->date('questionnaire_returned')->nullable();

            $table->unsignedInteger('funding_id')->nullable();
            $table->foreign('funding_id')->references('id')->on('fundings');

            $table->unsignedInteger('education_level_id')->nullable();
            $table->foreign('education_level_id')->references('id')->on('education_levels');

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
        Schema::dropIfExists('applicants');
    }
}
