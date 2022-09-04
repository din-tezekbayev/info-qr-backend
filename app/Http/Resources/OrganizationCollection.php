<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

/** @see \App\Models\Organization */
class OrganizationCollection extends ResourceCollection
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
            'about_us' => $this->about_us,
            'socials' => $this->socials,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
