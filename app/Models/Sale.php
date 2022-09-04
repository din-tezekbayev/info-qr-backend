<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Sale extends Model
{
    public function branch(): BelongsTo
    {
        return $this->belongsTo('App\Branch', 'branch_id');
    }
}
