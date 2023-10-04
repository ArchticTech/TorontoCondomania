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
        'description',
        'image',
        'address',
        'city_id',
        'latitude',
        'longitude',
        'type',
        'beds',
        'baths',
        'sqft',
        'availability_date',
        'monthly_rent',
        'security_deposit',
        'basement_available',
        'parking_available',
        'laundry_located',
        'smoking_policy',
        'pet_policy',
        'status',
    ];

    public function rentalFeatures()
    {
        return $this->hasMany(RentalFeature::class);
    }
    public function rentalImages()
    {
        return $this->hasMany(RentalImage::class);
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
