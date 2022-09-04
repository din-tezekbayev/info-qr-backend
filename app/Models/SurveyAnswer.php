<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SurveyAnswer extends Model
{
    protected $table = 'survey_answers';

    public function answers() {
        return $this->hasMany(SurveyAnswerValue::class, 'survey_answer_id');
    }
}
