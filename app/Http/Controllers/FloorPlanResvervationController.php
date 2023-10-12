<?php

namespace App\Http\Controllers;

use App\Models\FloorPlanResvervation;
use Illuminate\Http\Request;

class FloorPlanResvervationController extends Controller
{
    public function store(Request $request)
    {
        // Validate the incoming request data
        // $validatedData = $request->validate([
        //     'property_floor_plan_id' => 'required',
        //     'tbl_u_id' => 'required',
        //     'email_1' => 'required|email',
        //     'occupation_1' => 'required',
        //     'reservation_status' => 'required',
        //     // Add validation rules for other fields as needed
        // ]);

        // Create a new FloorPlanResvervation model instance
        try {
            FloorPlanResvervation::create($request->all());
            // Redirect to a success page or return a response
            // return redirect()->back()->route('success.page');
            return response()->json(['message' => 'Floor plan added successfully'], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while saving the Floor plan.' , $e]);
        }
    }
}
