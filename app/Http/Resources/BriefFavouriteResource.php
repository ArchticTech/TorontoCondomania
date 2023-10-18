<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BriefFavouriteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);

        // dd($this->property);
        // if($this->property)
            return [
                'id' => $this->property_id,
                'name' => $this->property->prop_name,
                'slug' => $this->property->slug,
                'image' => $this->property->prop_image,
                'type' => $this->property->prop_type,
                'address' => $this->property->prop_address,
                'price_from' => $this->property->prop_price_from,
                'price_to' => $this->property->prop_price_to,
            ];
    }
}
