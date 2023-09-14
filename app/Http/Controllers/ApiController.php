<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;

class ApiController extends Controller
{
    public function getAllProperties()
    {
        $properties = Property::with('City', 'Architect', 'Developer', 'Development')
            ->where('is_assignment', 0)->get();
        return $properties;
    }
}