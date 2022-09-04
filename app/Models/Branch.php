<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    public function organization()
    {
        return $this->belongsTo(Organization::class, 'organization_id');
    }

    public function cabinets()
    {
        return $this->hasMany(Cabinet::class, 'branch_id');
    }

    public function sales()
    {
        return $this->hasMany(Sale::class, 'branch_id');
    }

    public function serviceTypes()
    {
        return $this->hasMany(ServiceType::class, 'branch_id');
    }

    public function services()
    {
        return $this->hasMany(Service::class, 'branch_id');
    }

    public function doctors()
    {
        return $this->hasMany(Doctor::class, 'branch_id');
    }

    public function departments()
    {
        return $this->hasMany(Department::class, 'branch_id');
    }
}
