<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table = 'feedbacks';

    public function serviceType()
    {
        return $this->belongsTo('App\ServiceType', 'service_type_id');
    }
}
