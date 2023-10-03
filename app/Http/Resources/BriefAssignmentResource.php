<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BriefAssignmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $features = $this->property->propertyFeatures->pluck('prop_feature');
        return [
            'id' => $this->id,
            'slug' => $this->property->slug,
            'name' => $this->property->prop_name,
            'code' => $this->property->prop_code,
            'image' => $this->property->prop_image,
            'type' => $this->property->prop_type,
            'address' => $this->property->prop_address,
            'status' => $this->property->prop_status,
            'yearBuilt' => $this->property->est_occupancy_year,
            'vip_featured_promotion' => $this->property->vip_featured_promotion,
            'isHot' => $this->property->is_hot,
            'beds' => $this->property->no_of_beds,
            'baths' => $this->property->no_of_baths,
            'price_from' => $this->property->prop_price_from,
            'price_to' => $this->property->prop_price_to,
            'agent' => $this->property->agent_name,
            'unit_no' => $this->assign_unit_no,
            'floor_no' => $this->assign_floor_no,
            'purchase_price' => $this->assign_purchase_price,
            'tentative_occ_date' => $this->assign_tentative_occ_date,
            'purchased_date' => $this->assign_purchased_date,
            'cooperation_percentage' => $this->assign_cooperation_percentage,
            'deposit_paid' => $this->assign_deposit_paid,
            'features' => $features,
            'agent' => BriefAgentResource::make($this->property->property_agent),
            'latitude' => $this->property->latitude,
            'longitude' => $this->property->longitude,
            'isAssignment' => true,
        ];
    }
}
