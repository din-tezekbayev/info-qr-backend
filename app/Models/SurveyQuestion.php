<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurveyQuestion extends Model
{
    protected $table = 'survey_questions';

    public function answers() {
        return $this->hasMany(SurveyQuestionValue::class, 'question_id');
    }
}
