<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BriefPropertyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $features = $this->propertyFeatures->pluck('prop_feature');
        return [
            'id' => $this->id,
            'name' => $this->prop_name,
            'code' => $this->prop_code,
            'city' => $this->city_id,
            'image' => $this->prop_image,
            'type' => $this->prop_type,
            'address' => $this->prop_address,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'status' => $this->prop_status,
            'yearBuilt' => $this->est_occupancy_year,
            'vip_featured_promotion' => $this->vip_featured_promotion,
            'isHot' => $this->is_hot,
            'beds' => $this->no_of_beds,
            'baths' => $this->no_of_baths,
            'price_from' => $this->prop_price_from,
            'price_to' => $this->prop_price_to,
            'areaMin' => $this->suite_size_from,
            'areaMax' => $this->suite_size_to,
            'features' => $features,
            'agent' => BriefAgentResource::make($this->property_agent),
        ];
    }
}
