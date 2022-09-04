<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    public function branch()
    {
        return $this->belongsTo('App\Branch', 'branch_id');
    }

    public function serviceType()
    {
        return $this->belongsTo('App\ServiceType', 'service_type_id');
    }
}
