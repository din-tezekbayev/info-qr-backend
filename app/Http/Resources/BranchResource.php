<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Branch */
class BranchResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'address' => $this->address,
            'workHours' => json_decode($this->work_hours),
            'phones' => json_decode($this->phones),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
