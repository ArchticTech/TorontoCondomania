<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    
    protected $table = 'countries';

    protected $fillable = [
        'country_name',
        'is_main',
        'status',
        'created_by',
        'created_date',
    ];

    public function cities()
    {
        return $this->hasMany(City::class);
    }
}