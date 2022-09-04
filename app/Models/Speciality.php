<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
    protected $table = 'specialities';

    public function organization()
    {
        return $this->belongsTo('App\Organization', 'organization_id');
    }

    public function doctors()
    {
        return $this->hasMany('App\Doctor', 'department_id');
    }
}
