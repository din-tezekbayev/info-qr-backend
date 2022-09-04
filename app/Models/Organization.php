<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    public function branches()
    {
        return $this->hasMany('App\Branch', 'organization_id');
    }

    public function surveys()
    {
        return $this->hasMany(Survey::class, 'organization_id');
    }
}
