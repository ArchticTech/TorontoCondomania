<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoriteProperty extends Model
{
    use HasFactory;

    protected $table = 'favorites_property';

    // Disable automatic primary key detection
    protected $primaryKey = null;

    // Disable auto-incrementing primary key assumption
    public $incrementing = false;

    protected $fillable = [
        'user_id',
        'property_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    // Override the getKeyName method to specify the composite primary key
    public function getKeyName()
    {
        return ['user_id', 'property_id'];
    }
}
