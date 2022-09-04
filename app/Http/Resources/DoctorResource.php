<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin \App\Models\Doctor */
class DoctorResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'branch_id' => $this->branch_id,
            'name' => $this->name,
            'img' => $this->img,
            'work_hours' => json_decode($this->work_hours),
            'description' => $this->description,
            'experience' => $this->experience,
            'speciality_id' => $this->speciality_id,
            'department_id' => $this->department_id,
            'cabinet_id' => $this->cabinet_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

            'feedBackCount' => $this->feedbacks_count,
            'feedbacksAvgRating' => $this->feedbacks_avg_rating,
            'speciality' => $this->whenLoaded('speciality'),
        ];
    }
}
