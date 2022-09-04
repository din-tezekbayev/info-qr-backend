<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    protected $table = 'surveys';

    public function questions() {
        return $this->hasMany(SurveyQuestion::class, 'survey_id');
    }
}
