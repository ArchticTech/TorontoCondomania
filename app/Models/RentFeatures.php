<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentFeatures extends Model
{
    use HasFactory;

    protected $table = 'rent_features';
    protected $fillable = [
        'rental_id',
        'feature',
        'created_by',
    ];

    public function property()
    {
        return $this->belongsTo(Rental::class);
    }
}
