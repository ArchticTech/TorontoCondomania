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
