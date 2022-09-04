<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $table = 'employees';
    protected $fillable = [
        'branch_id', 'name', 'work_hours', 'description', 'experience', 'speciality_id', 'department_id', 'cabinet_id'
    ];
    protected $dates = [
        'created_at', 'updated_at'
    ];

    public function feedbacks()
    {
        return $this->hasMany(Feedback::class, 'doctor_id');
    }

    public function speciality()
    {
        return $this->belongsTo(Speciality::class, 'speciality_id');
    }

    public function cabinet()
    {
        return $this->belongsTo(Cabinet::class, 'cabinet_id');
    }
}
