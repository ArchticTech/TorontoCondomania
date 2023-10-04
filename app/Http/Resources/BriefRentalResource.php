<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BriefRentalResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $features = $this->rentalFeatures->pluck('feature');
        return [
            'id' => $this->id,
            'slug' => $this->slug,
            'name' => $this->name,
            'description' => $this->description,
            'city' => $this->city->city_name,
            'image' => $this->image,
            'type' => $this->type,
            'address' => $this->address,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'status' => $this->status,
            'sqft' => $this->sqft,
            'beds' => $this->beds,
            'baths' => $this->baths,
            'availability_date' => $this->availability_date,
            'monthly_rent' => $this->monthly_rent,
            'security_deposit' => $this->security_deposit,
            'basement_available' => $this->basement_available,
            'parking_available' => $this->parking_available,
            'laundry_located' => $this->laundry_located,
            'smoking_policy' => $this->smoking_policy,
            'pet_policy' => $this->pet_policy,
            'features' => $features,
        ];
    }
}
