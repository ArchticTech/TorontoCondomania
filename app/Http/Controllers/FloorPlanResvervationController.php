<?php

namespace App\Http\Controllers;

use App\Models\FloorPlanResvervation;
use Illuminate\Http\Request;

class FloorPlanResvervationController extends Controller
{
    public function store(Request $request)
    {
        $reservedFloor = FloorPlanResvervation::where([
            ['property_floor_plan_id', $request->property_floor_plan_id],
            ['tbl_user_id', $request->tbl_user_id]
        ])->first();

        if (!$reservedFloor)
        {
            $reservedFloor = new FloorPlanResvervation();
        }
        $reservedFloor->property_floor_plan_id = $request->property_floor_plan_id;
        $reservedFloor->tbl_user_id = $request->tbl_user_id;
        $reservedFloor->first_name_1 = $request->first_name_1;
        $reservedFloor->last_name_1 = $request->last_name_1;
        $reservedFloor->email_1 = $request->email_1;
        $reservedFloor->phone_number_1 = $request->phone_number_1;
        $reservedFloor->street_address_1 = $request->street_address_1;
        $reservedFloor->city_1 = $request->city_1;
        $reservedFloor->postal_code_1 = $request->postal_code_1;
        $reservedFloor->occupation_1 = $request->occupation_1;
        $reservedFloor->first_name_2 = $request->first_name_2;
        $reservedFloor->last_name_2 = $request->last_name_2;
        $reservedFloor->email_2 = $request->email_2;
        $reservedFloor->phone_number_2 = $request->phone_number_2;
        $reservedFloor->street_address_2 = $request->street_address_2;
        $reservedFloor->city_2 = $request->city_2;
        $reservedFloor->postal_code_2 = $request->postal_code_2;
        $reservedFloor->occupation_2 = $request->occupation_2;

        $reservedFloor->save();

        // try {
        //     FloorPlanResvervation::create($request->all());
        //     // Redirect to a success page or return a response
        //     // return redirect()->back()->route('success.page');
        //     return response()->json(['message' => 'Floor plan added successfully'], 201);
        // } catch (\Exception $e) {
        //     return response()->json(['error' => 'An error occurred while saving the Floor plan.' , $e]);
        // }
    }
}
