<?php

namespace App\Http\Controllers;

use App\Http\Resources\BriefAssignmentResource;
use App\Http\Resources\BriefFavouriteResource;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Http\Resources\BriefPropertyResource;
use App\Http\Resources\BriefRentalResource;
use App\Http\Resources\DetailedRentalResource;
use App\Http\Resources\DetailedAssignmentResource;
use App\Http\Resources\DetailedPropertyResource;
use App\Models\City;
use App\Models\ContactConsultation;
use App\Models\FavoriteProperty;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ApiController extends Controller
{
    public function getAllProperties()
    {
        $properties = PropertyController::allActive();

        $properties = BriefPropertyResource::collection($properties);

        return $properties;
    }
    public function getProperty($slug)
    {
        $property = PropertyController::get($slug);

        if($property)
        {
            $property = DetailedPropertyResource::make($property);
        }

        return $property;
    }

    //ASSIGNMENT MODULE API
    public function getAllAssignments()
    {
        $assignments = AssignmentController::all();

        $assignments = BriefAssignmentResource::collection($assignments);

        return $assignments;
    }
    public function getAssignment($slug)
    {
        $assignment = AssignmentController::get($slug);

        if($assignment)
        {
            $assignment = DetailedAssignmentResource::make($assignment);
        }

        return $assignment;
    }

    public function getCity($name)
    {
        $city = City::whereRaw('city_name COLLATE utf8mb4_general_ci LIKE ?', ["%$name%"])->first();

        $propertyCount = 0;
        if ($city) {
            $propertyCount = Property::where(['city_id' => $city->id, 'is_assignment' => 0])->count();
            // $propertyCount now contains the count of properties in the specified city
        }
        return $propertyCount;
    }

    //RENTALS MODULE API
    public function getAllRentals()
    {
        $rentals = RentalController::all();

        $rentals = BriefRentalResource::collection($rentals);

        return $rentals;
    }

    public function getRental($slug)
    {
        $rental = RentalController::get($slug);

        if($rental)
        {
            $rental = DetailedRentalResource::make($rental);
        }

        return $rental;
    }

    public function getAllFavorites()
    {
        try {
            // User is authenticated
            $user = Auth::user();

            // Retrieve all favorites for the user
            $favorites = $user->favorites;

            // Iterate through favorites and delete invalid property IDs
            $favFiltered = $favorites->filter(function ($favorite) {
                return $favorite->property !== null; 
            });

            // dd($fav);
            $favorites = BriefFavouriteResource::collection($favFiltered);

            return $favorites;
        }
        catch (Exception $e) {
            // Handle other exceptions
            return response()->json(['error' => 'An error occurred', $e], 200);
        }
    }
    public function deleteFavorite($propertyID)
    {
        try {
            // User is authenticated
            $user = Auth::user();

            $favorite = $user->favorites->where('property_id', $propertyID)->first();

            if ($favorite) {
                $favorite->delete();
                return response()->json(['message' => 'Favorite property deleted successfully']);
            }

            return response()->json(['message' => 'Favorite property does not exist']);
        } catch (Exception $e) {
            // Handle other exceptions
            return response()->json(['error' => 'An error occurred', $e], 200);
        }
    }
    public function storeFavorite($propertyID)
    {
        try {
            // User is authenticated
            $user = Auth::user();

            $favorite = $user->favorites()->firstOrNew(['property_id' => $propertyID]);

            if (!$favorite->exists) {
                $favorite->save();
                return response()->json(['message' => 'Added to Favorites successfully']);
            }

            return response()->json(['message' => 'Already in Favorites']);
        }
        catch (Exception $e) {
            // Handle other exceptions
            return response()->json(['error' => 'An error occurred', $e], 200);
        }
    }

    public function storeConsultation(Request $request)
    {
        try {
            ContactConsultation::create($request->all());
            return response()->json(['message' => 'Consultation added successfully'], 200);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while saving the consultation.' , $e], 500);
        }
    }

    public function login()
    {
        return response()->json(['error' => 'invalid_token'], 200);
    }
}
