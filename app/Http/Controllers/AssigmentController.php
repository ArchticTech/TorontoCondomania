<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\PropertyController;

use App\Models\Assigment;

class AssigmentController extends Controller
{
    private $propertyController;
    public function __construct(PropertyController $propertyController)
    {
        $this->propertyController = $propertyController;
    }
    public function store(Request $request)
    {
        $property = $this->propertyController->store($request);

        $assignment = new Assigment([
            'assign_unit_no' => $request->input('assign_unit_no'),
            'assign_floor_no' => $request->input('assign_floor_no'),
            'assign_purchase_price' => $request->input('assign_purchase_price'),
            'assign_tentative_occ_date' => $request->input('assign_tentative_occ_date'),
            'assign_purchased_date' => $request->input('assign_purchased_date'),
            'assign_cooperation_percentage' => $request->input('assign_cooperation_percentage'),
            'assign_deposit_paid' => $request->input('assign_deposit_paid'),
            'created_by' => $request->input('created_by'),
        ]);

        // Associate the assignment with the property
        $assigment =  $property->assignment()->save($assignment);


        return $assigment;
    }
}
