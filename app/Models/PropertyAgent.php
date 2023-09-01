<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyAgent extends Model
{
    use HasFactory;

    protected $fillable = [
        'city_id',
        'agent_name',
        'agent_image',
        'agent_contact_no',
        'agent_address',
        'agent_email',
        'agent_website',
        'agent_agency',
        'agent_company',
        'company_phone_no',
        'company_address',
        'status',
        'created_by',
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
