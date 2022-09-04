<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceType extends Model
{
    public function branch()
    {
        return $this->belongsTo('App\Branch', 'branch_id');
    }
}
