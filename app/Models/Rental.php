<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Rental extends Model
{
    use HasFactory;
    protected $table = 'rentals';

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($rental) {
            $slug = Str::slug($rental->name);
            $originalSlug = $slug;
            $count = 1;

            while (static::where('slug', $slug)->exists()) {
                $slug = $originalSlug . '-' . $count;
                $count++;
            }

            $rental->slug = $slug;
        });
    }

    protected $fillable = [
        'name',
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
