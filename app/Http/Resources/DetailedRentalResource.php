<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DetailedRentalResource extends JsonResource
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
        $imageUrls = $this->rentalImages->pluck('image');

        return [
            'id' => $this->id,
            'slug' => $this->slug,
            'name' => $this->name,
            'description' => $this->description,
            'image' => $this->image,
            'address' => $this->address,
            'city' => $this->city->city_name,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'type' => $this->type,
            'beds' => $this->beds,
            'baths' => $this->baths,
            'sqft' => $this->sqft,
            'availability_date' => $this->availability_date,
            'monthly_rent' => $this->monthly_rent,
            'security_deposit' => $this->security_deposit,
            'basement_available' => $this->basement_available,
            'parking_available' => $this->parking_available,
            'laundry_located' => $this->laundry_located,
            'smoking_policy' => $this->smoking_policy,
            'pet_policy' => $this->pet_policy,
            'status' => $this->status,
            'features' => $features->toArray(),
            'images' => $imageUrls->toArray(),
        ];
    }
}
