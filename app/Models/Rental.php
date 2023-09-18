<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rental extends Model
{
    use HasFactory;
    protected $table = 'rentals';

    protected $fillable = [
        'rent_address',
        'rent_iframe',
        'rent_type',
        'rent_beds',
        'rent_baths',
        'rent_sqft',
        'available_date',
        'monthly_rent',
        'security_deposit',
        'laundry_located',
        'rent_description',
        'pet_policy',
        'smoking_policy',
        'lease_length',
        'lease_terms',
        'rental_status',
        'created_by',
    ];

    public function rentalFeatures()
    {
        return $this->hasMany(RentalFeature::class);
    }
    public function rentalImages()
    {
        return $this->hasMany(RentalImage::class);
    }
}
