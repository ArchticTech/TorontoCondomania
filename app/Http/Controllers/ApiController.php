<?php

namespace App\Http\Controllers;

use App\Http\Resources\BriefAssignmentResource;
use Illuminate\Http\Request;
use App\Models\Property;
use App\Http\Resources\BriefPropertyResource;
use App\Http\Resources\BriefRentalResource;
use App\Http\Resources\DetailedRentalResource;
use App\Http\Resources\DetailedAssignmentResource;
use App\Http\Resources\DetailedPropertyResource;
use App\Models\City;
use App\Models\FavoriteProperty;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{
    public function getAllProperties()
    {
        $properties = PropertyController::all();

        $properties = BriefPropertyResource::collection($properties);

        return $properties;
    }
    public function getProperty($slug)
    {
        $property = PropertyController::get($slug);

        $property = DetailedPropertyResource::make($property);

        return $property;
    }

    //ASSIGNMENT MODULE API
    public function getAllAssignments()
    {
        $assignments = AssignmentController::all();

        $assignments = BriefAssignmentResource::collection($assignments);

        return $assignments;
    }
    public function getAssignment($id)
    {
        $property = PropertyController::get($id);

        $property = DetailedAssignmentResource::make($property);

        return $property;
    }

    public function getCity($name)
    {
        $city = City::whereRaw('city_name COLLATE utf8mb4_general_ci LIKE ?', ["%$name%"])->first();

        $propertyCount = 0;
        if ($city) {
            $propertyCount = Property::where('city_id', $city->id)->count();
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

        $rental = DetailedRentalResource::make($rental);

        return $rental;
    }

    //Client favorite api
    public function storeFavorite($id)
    {
        $user = Auth::user();
        $userId = $user['id'];

        // Create a new favorite record
        FavoriteProperty::create([
            'user_id' => $userId,
            'property_id' => $id,
        ]);

        // Return a response, e.g., a success message
        return response()->json(['message' => 'Added to Favorites successfully']);
    }


    public function getAllFavorites()
    {
        $user = Auth::user();

        return response()->json($user->favorites);
    }

    public function deleteFavorite($id)
    {
        try {
            $user = Auth::user();
            $userId = $user['id'];
            // $favorite = FavoriteProperty::findOrFail($user && $id);
            // $favorite = FavoriteProperty::find([$userId, $id]);
            $favorite = FavoriteProperty::where('user_id', $userId)
                ->where('property_id', $id)
                ->delete();
            // dd($favorite);

            // Delete the favorite record
            // $favorite->delete();

            // Return a success response
            return response()->json(['message' => 'Favorite property deleted successfully']);
        } catch (ModelNotFoundException $e) {
            // Handle the case where the favorite record is not found
            return response()->json(['error' => 'Favorite property not found'], 404);
        } catch (\Exception $e) {
            // Handle other exceptions
            return response()->json(['error' => 'An error occurred' ,$e], 500);
        }
    }
}
