<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DetailedPropertyResource extends JsonResource
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
        $descriptions = $this->propertyDescriptions->pluck('prop_description');
        $imageUrls = $this->propertyImages->pluck('image');

        return [
            'id' => $this->id,
            'name' => $this->prop_name,
            'image' => $this->prop_image,
            'type' => $this->prop_type,
            'address' => $this->prop_address,
            'status' => $this->prop_status,
            'stories' => $this->no_of_stories,
            'suites' => $this->no_of_suites,
            'est_occupancy_month' => $this->est_occupancy_month,
            'est_occupancy_year' => $this->est_occupancy_year,
            'vip_launch_date' => $this->vip_launch_date,
            'public_launch_date' => $this->public_launch_date,
            'const_start_date' => $this->const_start_date,
            'vip_featured_promotion' => $this->vip_featured_promotion,
            'isHot' => $this->is_hot,
            'suites_starting_floor' => $this->suites_starting_floor,
            'suites_per_floor' => $this->suites_per_floor,
            'floor_plans' => $this->floor_plans,
            'suite_size_from' => $this->suite_size_from,
            'suite_size_to' => $this->suite_size_to,
            'ceiling_height' => $this->ceiling_height,
            'price_per_sqft_from' => $this->price_per_sqft_from,
            'price_per_sqft_to' => $this->price_per_sqft_to,
            'parking_price' => $this->parking_price,
            'locker_price' => $this->locker_price,
            'min_deposit_percentage' => $this->min_deposit_percentage	,
            'beds' => $this->no_of_beds,
            'baths' => $this->no_of_baths,
            'price_from' => $this->prop_price_from,
            'price_to' => $this->prop_price_to,
            'city' => $this->city->city_name,
            'development' => $this->property_agent->agent_name,
            'developer' => $this->property_agent->agent_name,
            'architect' => $this->property_agent->agent_name,
            'designer' => $this->property_agent->agent_name,
            'agent' => $this->property_agent->agent_name,
            'features' => $features->toArray(),
            'descriptions' => $descriptions->toArray(),
            'images' => $imageUrls->toArray(),
        ];
    }
}
