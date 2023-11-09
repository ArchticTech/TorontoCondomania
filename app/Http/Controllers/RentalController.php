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
        $rentals = Rental::latest()->all();
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
        $meta_title = $request->input('meta_title');
        $meta_description = $request->input('meta_description');
        $meta_keywords = $request->input('meta_keywords');
        $meta_tags = $request->input('meta_tags');

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

            'meta_title' => $meta_title,
            'meta_description' => $meta_description,
            'meta_keywords' => $meta_keywords,
            'meta_tags' => $meta_tags,

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

        $rental->name = $request->input('rent_name');
        $rental->description = $request->input('description');

        if ($request->hasFile('image') && $request->file('image')->isValid())
        {
            $prop_imageName = RentalController::saveImage($request->file('image'));
            $rental->image = $prop_imageName;

            $imagePath = public_path('images/' . $request->input('image'));
            if (File::exists($imagePath)) {
                // Delete the image if it exists
                File::delete($imagePath);
            }
        }
        $rental->meta_title = $request->input('meta_title');
        $rental->meta_description = $request->input('meta_description');
        $rental->meta_keywords = $request->input('meta_keywords');
        $rental->meta_tags = $request->input('meta_tags');

        $rental->address = $request->input('rent_address');
        $rental->city_id = $request->input('city_id');
        $rental->latitude = $request->input('latitude');
        $rental->longitude = $request->input('longitude');
        $rental->type = $request->input('type');
        $rental->beds = $request->input('rent_beds');
        $rental->baths = $request->input('rent_baths');
        $rental->sqft = $request->input('rent_sqft');
        $rental->availability_date = $request->input('available_date');
        $rental->monthly_rent = $request->input('monthly_rent');
        $rental->security_deposit = $request->input('security_deposit');
        $rental->basement_available = $request->input('basement_available');
        $rental->parking_available = $request->input('parking_available');
        $rental->laundry_located = $request->input('laundry_located');
        $rental->smoking_policy = $request->input('smoking_policy');
        $rental->pet_policy = $request->input('pet_policy');
        $rental->status = $request->input('rental_status');
        $rental->basement_available = $request->input('basement_available');

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
