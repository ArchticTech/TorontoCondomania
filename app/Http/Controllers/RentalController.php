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
        $slug = $request->input('name');
        $name = $request->input('name');
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
            'slug' => $slug,
            'name' => $name,
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

        $saved = $rental->save();

        if ($saved) {
            if ($request->input('rent_feature')) {
                $this->addFeatures($request->input('rent_feature'), $rental);
            }
            if ($request->file('rental_image')) {
                $this->addImages($request->file('rental_image'), $rental);
            }
        }

        return $saved;
    }

    public static function get($slug)
    {
        // return Rental::find($id);
        return Rental::where('slug', $slug)->firstOrFail();
    }

    public static function update(Request $request, $id)
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

        $this->removeFeatures($rental);
        $this->removeImages($request->input('rentalImageName'), $rental);
        if ($saved) {
            if ($request->input('rent_feature')) {
                $this->addFeatures($request->input('rent_feature'), $rental);
            }
            if ($request->file('rental_image')) {
                $this->addImages($request->file('rental_image'), $rental);
            }
        }

        return $saved;
    }

    public function saveImage($image)
    {
        if($image)
        {
            $imageName = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            return $imageName;
        }
        return '';
    }

    public function addFeatures($features, $rental)
    {
        foreach ($features as $feature) {

            $rentalFeature = new RentalFeature([
                'feature' => $feature
            ]);

            $rental->rentalFeatures()->save($rentalFeature);
        }
    }
    public function removeFeatures($rental)
    {
        $rental->rentalFeatures()->delete();
        return;
    }

    public function addImages($images, $rental)
    {
        foreach($images as $image) {
            $imageName = $this->saveImage($image);
            $rentalImage = new RentalImage([
                'image' => $imageName,
                'status' => 1
            ]);

            $rental->rentalImages()->save($rentalImage);
        }
    }
    public function removeImages($imageNames, $rental)
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
