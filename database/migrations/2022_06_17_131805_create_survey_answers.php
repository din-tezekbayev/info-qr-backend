<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveyAnswers extends Migration
{
    public function up()
    {
        Schema::create('survey_answers', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('organization_id');
            $table->unsignedBigInteger('branch_id');
            $table->unsignedBigInteger('survey_id');

            $table->string('phone')->nullable();
            $table->string('user_name')->nullable();
            $table->string('comment')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('survey_answers');
    }
}
