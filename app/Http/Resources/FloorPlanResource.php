<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FloorPlanResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'image' => $this->floor_plan_image,
            'suite_no' => $this->plan_suite_no,
            'suite_name' => $this->plan_suite_name,
            'sq_ft' => $this->plan_sq_ft,
            'bath' => $this->plan_bath,
            'bed' => $this->plan_bed,
            'availability' => $this->plan_availability,
            'terrace_balcony' => $this->plan_terrace_balcony
        ];
    }
}
