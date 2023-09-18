<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RentalImage extends Model
{
    use HasFactory;
    
    protected $table = 'rental_images';
    protected $fillable = [
        'id',
        'image',
        'created_by',
    ];

    public function rental()
    {
        return $this->belongsTo(Rental::class);
    }
}
