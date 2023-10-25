<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DetailedAssignmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    //     public function toArray($request)
    //     {
    //         return [
    //             'id' => $this->id,
    //             'name' => $this->prop_name,
    //             'image' => $this->prop_image,
    //             'type' => $this->prop_type,
    //             'address' => $this->prop_address,
    //             'status' => $this->prop_status,
    //             'est_occupancy_year' => $this->est_occupancy_year,
    //             'vip_featured_promotion' => $this->vip_featured_promotion,
    //             'isHot' => $this->is_hot,
    //             'beds' => $this->no_of_beds,
    //             'baths' => $this->no_of_baths,
    //             'price_from' => $this->prop_price_from,
    //             'price_to' => $this->prop_price_to,
    //             'agent' => $this->property_agent->agent_name,
    //             'unit_no' => $this->assign_unit_no,
    //             'floor_no' => $this->assign_floor_no,
    //             'purchase_price' => $this->assign_purchase_price,
    //             'tentative_occ_date' => $this->assign_tentative_occ_date,
    //             'purchased_date' => $this->assign_purchased_date,
    //             'cooperation_percentage	' => $this->assign_cooperation_percentage	,
    //             'deposit_paid' => $this->assign_deposit_paid,
    //         ];
    //     }
    // }
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'unit_no' => $this->assign_unit_no,
            'floor_no' => $this->assign_floor_no,
            'purchase_price' => $this->assign_purchase_price,
            'tentative_occ_date' => $this->assign_tentative_occ_date,
            'purchased_date' => $this->assign_purchased_date,
            'cooperation_percentage' => $this->assign_cooperation_percentage,
            'deposit_paid' => $this->assign_deposit_paid,
            'isAssignment' => true,
            'property' => DetailedPropertyResource::make($this->property),
        ];
    }
}
