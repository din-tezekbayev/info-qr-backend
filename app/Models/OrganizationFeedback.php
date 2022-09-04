<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrganizationFeedback extends Model
{
    protected $table = 'organization_feedback';

    public function organization() {
        return $this->belongsTo(Organization::class, 'organization_id');
    }

    public function branch() {
        return $this->belongsTo(Branch::class, 'branch_id');
    }
}
