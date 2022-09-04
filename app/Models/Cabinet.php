<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cabinet extends Model
{
    public function branch()
    {
        return $this->belongsTo('App\Branch', 'branch_id');
    }

    public function doctors()
    {
        return $this->hasMany('App\Doctor', 'cabinet_id');
    }
}
