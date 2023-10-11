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
        $assignment = AssignmentController::get($id);

        $assignment = DetailedAssignmentResource::make($assignment);

        return $assignment;
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
        // $user = Auth::user();
        $userId = 1;

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
        // User is authenticated
        //$user = auth()->user();
        $userId = 1;

        // Retrieve all favorites for the user
        $favorites = FavoriteProperty::where('user_id', $userId)->get();

        // Iterate through favorites and delete invalid property IDs
        $favFiltered = $favorites->filter(function ($favorite) {
            return $favorite->property !== null; // Replace with your condition
        });

        // dd($fav);
        $favorites = BriefFavouriteResource::collection($favFiltered);

        return $favorites;
    }

    public function deleteFavorite($id)
    {
        try {
            // $user = Auth::user();
            $userId = 1;
            // $favorite = FavoriteProperty::findOrFail($user && $id);
            // $favorite = FavoriteProperty::find([$userId, $id]);
            FavoriteProperty::where('user_id', $userId)
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
            return response()->json(['error' => 'An error occurred', $e], 500);
        }
    }

    public function showAllConsultation()
    {
        // Get all records from tbl_contact_consultation
        $consultations = ContactConsultation::all();

        return view('admin.consulting-form', compact('consultations'));
    }

    public function storeConsultation(Request $request)
    {
        // Validate the request data
        // $request->validate([
        //     'full_name' => 'required',
        //     'phone_no' => 'required',
        //     'email_address' => 'required',
        //     'message_consultation' => 'required',
        //     'created_date' => 'required',
        // ]);
        try {
            ContactConsultation::create($request->all());
            return response()->json(['message' => 'Consultation added successfully'], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred while saving the consultation.' , $e], 500);
        }
    }
}
