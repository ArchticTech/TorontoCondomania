<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;

class HomeController extends Controller
{
    public function index()
    {
        $properties = Property::all();

        return view('main', compact('properties'));
    }
    
}
