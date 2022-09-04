<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyQuestionValuesTable extends Migration
{
    public function up()
    {
        Schema::create('survey_question_values', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('survey_id');
            $table->unsignedBigInteger('question_id');
            $table->string('title');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('survey_question_values');
    }
}
