<?php

namespace App\Http\Controllers;

use App\Models\Rental;
use App\Models\RentalFeature;
use App\Models\RentalImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class RentalController extends Controller
{
    //Rentals CRUD Operation
    public static function all()
    {
        $rentals = Rental::all();
        return $rentals;
    }

    public static function addRentals()
    {
        return view('admin.rentals-add');
    }

    public static function store(Request $request)
    {

        $name = $request->input('rent_name');
        $description = $request->input('description');
        // $image = $request->input('image');
        $image = '';
        if ($request->hasFile('image') && $request->file('image')->isValid())
        {
            $image = RentalController::saveImage($request->file('image'));
        }

        $address = $request->input('rent_address');
        $city_id = $request->input('city_id');
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');
        $type = $request->input('type');
        $beds = $request->input('rent_beds');
        $baths = $request->input('rent_baths');
        $sqft = $request->input('rent_sqft');
        $availability_date = $request->input('available_date');
        $monthly_rent = $request->input('monthly_rent');
        $security_deposit = $request->input('security_deposit');
        $basement_available = $request->input('basement_available');
        $parking_available = $request->input('parking_available');
        $laundry_located = $request->input('laundry_located');
        $smoking_policy = $request->input('smoking_policy');
        $pet_policy = $request->input('pet_policy');
        $status = $request->input('rental_status');
        $basement_available = $request->input('basement_available');

        $rental = new Rental([
            'name' => $name,
            'description' => $description,
            'image' => $image,
            'address' => $address,
            'city_id' => $city_id,
            'latitude' => $latitude,
            'longitude' => $longitude,
            'type' => $type,
            'beds' => $beds,
            'baths' => $baths,
            'sqft' => $sqft,
            'availability_date' => $availability_date,
            'monthly_rent' => $monthly_rent,
            'security_deposit' => $security_deposit,
            'basement_available' => $basement_available,
            'parking_available' => $parking_available,
            'laundry_located' => $laundry_located,
            'smoking_policy' => $smoking_policy,
            'pet_policy' => $pet_policy,
            'status' => $status,

        ]);

        $saved = $rental->save();

        if ($saved) {
            if ($request->input('rent_feature')) {
                RentalController::addFeatures($request->input('rent_feature'), $rental);
            }
            if ($request->file('rental_image')) {
                RentalController::addImages($request->file('rental_image'), $rental);
            }
        }

        return $saved;
    }

    public static function get($slug)
    {
        return Rental::where('slug', $slug)->firstOrFail();
    }

    public static function update(Request $request, $id)
    {
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

        RentalController::removeFeatures($rental);
        RentalController::removeImages($request->input('rentalImageName'), $rental);
        if ($saved) {
            if ($request->input('rent_feature')) {
                RentalController::addFeatures($request->input('rent_feature'), $rental);
            }
            if ($request->file('rental_image')) {
                RentalController::addImages($request->file('rental_image'), $rental);
            }
        }

        return $saved;
    }

    public static function saveImage($image)
    {
        if($image)
        {
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            return $imageName;
        }
        return '';
    }

    public static function addFeatures($features, $rental)
    {
        foreach ($features as $feature) {

            $rentalFeature = new RentalFeature([
                'feature' => $feature
            ]);

            $rental->rentalFeatures()->save($rentalFeature);
        }
    }
    public static function removeFeatures($rental)
    {
        $rental->rentalFeatures()->delete();
        return;
    }

    public static function addImages($images, $rental)
    {
        foreach($images as $image) {
            $imageName = RentalController::saveImage($image);
            $rentalImage = new RentalImage([
                'image' => $imageName,
                'status' => 1
            ]);

            $rental->rentalImages()->save($rentalImage);
        }
    }
    public static function removeImages($imageNames, $rental)
    {
        $oldImages = $rental->rentalImages->pluck('image')->toArray();
        $deletedImages = $imageNames ? array_diff($oldImages, $imageNames) : $oldImages;
        foreach($deletedImages as $image) {
            $imagePath = public_path('images/' . $image);
            if (File::exists($imagePath)) {
                // Delete the image if it exists
                File::delete($imagePath);
            }

            $rental->rentalImages()->where('image', $image)->delete();
        }
        return;
    }
}
