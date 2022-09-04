<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyAnswerValues extends Migration
{
    public function up()
    {
        Schema::create('survey_answer_values', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('survey_id');
            $table->unsignedBigInteger('survey_answer_id');
            $table->unsignedBigInteger('survey_question_id');
            $table->unsignedBigInteger('survey_question_value_id');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('survey_answer_values');
    }
}
