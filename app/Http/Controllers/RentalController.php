<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use App\Models\RentFeatures;
use Illuminate\Http\Request;

class RentalController extends Controller
{
    //Rentals CRUD Operation
    public function viewRentals()
    {
        $rentals = Rental::all();
        return view('admin.rentals-view', ['rentals' => $rentals]);
    }

    public function addRentals()
    {
        return view('admin.rentals-add');
    }

    public function storeRentals(Request $request)
    {
        $rent_address = $request->input('rent_address');
        $rent_iframe = $request->input('rent_iframe');
        $rent_type = $request->input('rent_type');
        $rent_beds = $request->input('rent_beds');
        $rent_baths = $request->input('rent_baths');
        $rent_sqft = $request->input('rent_sqft');
        $available_date = $request->input('available_date');
        $security_deposit = $request->input('security_deposit');
        $laundry_located = $request->input('laundry_located');
        $rent_description = $request->input('rent_description');
        $pet_policy = $request->input('pet_policy');
        $lease_length = $request->input('lease_length');
        $lease_terms = $request->input('lease_terms');
        $rental_status = $request->input('rental_status');
        $monthly_rent = $request->input('monthly_rent');
        $smoking_policy = $request->input('smoking_policy');

        $rental = new Rental([
            'rent_address' => $rent_address,
            'rent_iframe' => $rent_iframe,
            'rent_type' => $rent_type,
            'rent_beds' => $rent_beds,
            'rent_baths' => $rent_baths,
            'rent_sqft' => $rent_sqft,
            'available_date' => $available_date,
            'security_deposit' => $security_deposit,
            'laundry_located' => $laundry_located,
            'rent_description' => $rent_description,
            'pet_policy' => $pet_policy,
            'lease_length' => $lease_length,
            'lease_terms' => $lease_terms,
            'rental_status' => $rental_status,
            'monthly_rent' => $monthly_rent,
            'smoking_policy' => $smoking_policy,
        ]);

        // dd($request->input('rent_feature'), $rental);
        $saved = $rental->save();


        if ($saved) {
            if ($request->input('rent_feature')) {
                $this->addFeatures($request->input('rent_feature'), $rental);
            }
        }
        if ($saved) {
            return redirect()->route('admin.rentals.view')
                ->with('message', 'Rental Added Successfully!');
        } else {
            return redirect()->route('admin.rentals.add')
                ->with('message', 'Rental Failed to Add!');
        }
    }

    public function editRentals($id)
    {
        $rental = Rental::find($id);
        return view('admin.rental-edit', ['rental' => $rental]);
    }

    public function updateRentals(Request $request, $id)
    {
        // Find the rental by its ID
        $rental = Rental::find($id);

        if (!$rental) {
            return redirect()->route('admin.rentals.view')
                ->with('message', 'Rental Not Found');
        }

        //updating rental
        $rental->rent_address = $request->input('rent_address');
        $rental->rent_iframe = $request->input('rent_iframe');
        $rental->rent_type = $request->input('rent_type');
        $rental->rent_beds = $request->input('rent_beds');
        $rental->rent_baths = $request->input('rent_baths');
        $rental->rent_sqft = $request->input('rent_sqft');
        $rental->available_date = $request->input('available_date');
        $rental->security_deposit = $request->input('security_deposit');
        $rental->laundry_located = $request->input('laundry_located');
        $rental->rent_description = $request->input('rent_description');
        $rental->pet_policy = $request->input('pet_policy');
        $rental->lease_length = $request->input('lease_length');
        $rental->lease_terms = $request->input('lease_terms');
        $rental->rental_status = $request->input('rental_status');
        $rental->monthly_rent = $request->input('monthly_rent');
        $rental->smoking_policy = $request->input('smoking_policy');

        $saved = $rental->save();

        if ($saved) {
            if ($request->input('rent_feature')) {
                $this->addFeatures($request->input('rent_feature'), $rental);
            }
        }

        // if ($saved) {
        //     return redirect()->route('admin.rentals.view')
        //         ->with('message', 'Rental Updated Successfully!');
        // } else {
        //     return redirect()->route('admin.rentals.update')
        //         ->with('message', 'Rental Failed to Update!');
        // }
    }

    public function addFeatures($features, $rental)
    {
        foreach ($features as $feature) {

            $rentFeatures = new RentFeatures([
                'feature' => $feature
            ]);

            $rental->rentFeatures()->save($rentFeatures);
        }
    }
    public function removeFeatures($rental)
    {
        $rental->rentFeatures()->delete();
        return;
    }
}
