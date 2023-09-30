<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use App\Models\Architect;
use App\Models\City;
use App\Models\Developer;
use App\Models\Development;
use App\Models\InteriorDesigner;
use App\Models\PropertyAgent;
use App\Models\Country;
use App\Models\Property;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    private function getFormData()
    {
        return [
            'architects' => Architect::orderby('architects_name', 'asc')->get(),
            'cities' => City::orderBy('city_name', 'asc')->get(),
            'developers' => Developer::orderby('developer_name', 'asc')->get(),
            'developments' => Development::orderby('development_name', 'asc')->get(),
            'interiorDesigners' => InteriorDesigner::orderby('interior_designer_name', 'asc')->get(),
            'propertyAgents' => PropertyAgent::orderby('agent_name', 'asc')->get(),
            'propertyTypeEnums' => Property::getPropertyTypeEnums(),
            'propertyStatusEnums' => Property::getPropertyStatusEnums(),
        ];
    }

    public function clearSessionMessage()
    {
        Session::forget('message');

        return response()->json(['message' => 'Session message cleared! controller']);
    }
    public function dashboard()
    {
        $architects = Architect::count();
        $cities = City::count();
        $country = Country::count();
        $developers = Developer::count();
        $developments = Development::all();
        $interiorDesigners = InteriorDesigner::count();
        $propertyAgents = PropertyAgent::all();

        return view('admin.index', compact('architects', 'cities', 'developers', 'developments', 'interiorDesigners', 'propertyAgents', 'country'));
    }
    public function viewProperty()
    {
        $properties = PropertyController::all();

        return view('admin.property-view', ['properties' => $properties]);
    }
    public function addProperty()
    {
        $data = $this->getFormData();

        return view('admin.property-add', $data);
    }
    public function storeProperty(Request $request)
    {
        $result = PropertyController::store($request);

        if ($result['saved']) {
            return redirect()->route('admin.property.view')
                ->with('message', 'Property Added Successfully');
        } else {
            return redirect()->route('admin.property.add')
                ->with('message', 'Property Failed to Add');
        }
    }
    public function editProperty($id)
    {
        $data = $this->getFormData();

        $data['property'] = PropertyController::get($id);

        if(!$data['property'])
            return redirect()->route('admin.property.view')
                ->with('message', 'Property Not Found!');

        $data['features'] = $data['property']->propertyFeatures;
        $data['images'] = $data['property']->propertyImages;
        $data['floorPlans'] = $data['property']->propertyFloorPlans;

        return view('admin.property-edit', $data);
    }
    public function updateProperty(Request $request, $id)
    {
        $result = PropertyController::update($request, $id);

        if ($result['saved']) {
            return redirect()->route('admin.property.view')
                ->with('message', 'Property Updated Successfully');
        }
        else {
            return redirect()->route('admin.property.update')
            ->with('message', 'Property Failed to Update');
        }
    }

    // Assignments CRUD

    public function viewAssignments()
    {
        $assignments = AssignmentController::all();

        return view('admin.assigment-view', ['assignments' => $assignments]);
    }

    public function addAssignment()
    {
        $data = $this->getFormData();

        return view('admin.assigment-add', $data);
    }

    public function storeAssignment(Request $request)
    {
        $assignmentSaved = AssignmentController::store($request);

        if ($assignmentSaved) {
            return redirect()->route('admin.assignment.view')
                ->with('message', 'Assignment Added Successfully');
        } else {
            return redirect()->route('admin.assignment.add')
                ->with('message', 'Assignment Failed to Add');
        }
    }
    public function editAssignment($id)
    {
        $data = $this->getFormData();

        $data['assignment'] = AssignmentController::get($id);

        if(!$data['assignment'])
            return redirect()->route('admin.assignment.view')
                ->with('message', 'Assignment Not Found!');

        $data['features'] = $data['assignment']->property->propertyFeatures;
        $data['images'] = $data['assignment']->property->propertyImages;
        $data['floorPlans'] = $data['assignment']->property->propertyFloorPlans;

        return view('admin.assignment-edit', $data);
    }
    public function updateAssignment(Request $request, $id)
    {
        $assignmentSaved = AssignmentController::update($request, $id);

        if ($assignmentSaved) {
            return redirect()->route('admin.assignment.view')
                ->with('message', 'Assignment Updated Successfully');
        }
        else {
            return redirect()->route('admin.assignment.update')->with('message', 'Assignment Failed to Update');
        }
    }

    public function viewRentals()
    {
        $rentals = RentalController::all();

        return view('admin.rentals-view', ['rentals' => $rentals]);
    }
    public function addRental()
    {
        return view('admin.rentals-add');
    }
    public function storeRental(Request $request)
    {
        $saved = RentalController::store($request);

        if ($saved) {
            return redirect()->route('admin.rentals.view')
                ->with('message', 'Rental Added Successfully!');
        } else {
            return redirect()->route('admin.rentals.add')
                ->with('message', 'Rental Failed to Add!');
        }
    }
    public function editRental($id)
    {
        $rental = RentalController::get($id);

        if(!$rental)
            return redirect()->route('admin.rentals.view')
                ->with('message', 'Rental Not Found!');

        $rentalFeatures = $rental->rentalFeatures;
        $rentalImages = $rental->rentalImages;

        return view('admin.rental-edit', ['rental' => $rental,
            'rentalFeatures' => $rentalFeatures, 'rentalImages' => $rentalImages]);
    }
    public function updateRental(Request $request, $id)
    {
        $saved = RentalController::update($request, $id);

        if ($saved) {
            return redirect()->route('admin.rentals.view')
                ->with('message', 'Rental Updated Successfully!');
        } else {
            return redirect()->route('admin.rentals.update')
                ->with('message', 'Rental Failed to Update!');
        }
    }

    // Consulting form
    public function consultingForm()
    {
        return view('admin.consulting-form');
    }

    // Subscription Form
    public function subscriptionForm()
    {
        return view('admin.subscription-form');
    }

    public function login()
    {
        if (Auth::user() && Auth::user()->isAdmin()) {
            return redirect()->route('admin.dashboard');
        }
        else {
            return view('admin.login');
        }
    }

     //Autenticate User
     public function authenticate(Request $request)
     {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed
            if (Auth::user()->isAdmin()) {
                // Redirect to the admin dashboard
                return redirect()->route('admin.dashboard');
            } else {
                // Handle non-admin users (e.g., show an error message)
                Auth::logout();
                return redirect()->route('admin.login')->with('message', 'Access Denied. You are not an Admin');
            }
        }
        return redirect()->route('admin.login')->with('message', 'Incorrect Email or Password');
     }

    //Register Admin
    public function register()
    {
        return view('admin.signup');
    }

     public function store(Request $request)
     {
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:5',
        ]);

        //Hash password
        $formFields['password'] = bcrypt($formFields['password']);

        //Create User
        $user = User::create($formFields);

        //Login
        // auth()->login($user);

        return redirect()->route('admin.login')->with('message', 'You are now Registered!');
     }

     //Logout User
     public function logout(Request $request)
     {
         auth()->logout();
         $request->session()->invalidate();
         $request->session()->regenerateToken();

         return redirect()->route('admin.login')->with('message', 'You have been logged out!');
     }

     // Property Information
    public function propertyInfo()
    {
        $cities = City::orderBy('created_at', 'desc')->paginate(5, ['*'], 'city_page');
        $developments = Development::orderBy('created_at', 'desc')->paginate(5, ['*'], 'development_page');
        $developers = Developer::orderBy('created_at', 'desc')->paginate(5, ['*'], 'developer_page');
        $architects = Architect::orderBy('created_at', 'desc')->paginate(5, ['*'], 'architect_page');
        $interiorDesigners = InteriorDesigner::orderBy('created_at', 'desc')->paginate(5, ['*'], 'interior_designer_page');

        return view('admin.property-info', [
            'cities' => $cities, 'developments' => $developments, 'developers' => $developers, 'architects' => $architects,
            'interiorDesigners' => $interiorDesigners
        ]);
    }
    public function storeCity(Request $request)
    {

        // Validate the request data
        $validatedData = $request->validate([
            'city_name' => 'required|string|max:255',
            'city_status' => 'boolean', // Assuming 'city_status' is the checkbox field name.
        ]);

        // Create a new City instance and set its attributes
        $city = new City();
        $city->city_name = $validatedData['city_name'];
        $city->country_id = 1;
        $city->status = $request->has('city_status') ? 1 : 0;
        $saved = $city->save();

        if ($saved) {
            return redirect()->back()->with('message', 'City added successfully!');
        }
        return redirect()->back()->with('message', 'Failed to add city!');
    }

    public function updateCity(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'city_name' => 'required|string|max:255',
            'status' => 'boolean',
        ]);

        // Convert the checkbox value from 'on' to '1' if it's checked
        $validatedData['status'] = $request->has('status') ? 1 : 0;

        // Update the record
        $saved = City::where('id', $id)->update($validatedData);

        if ($saved) {
            return redirect()->back()->with('message', 'City updated successfully!');
        }
        return redirect()->back()->with('message', 'City update failed!');
    }

    //Development
    public function storedevelopment(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'development_name' => 'required|string|max:255',
            'development_status' => 'boolean',
        ]);

        // Create a new City instance and set its attributes
        $development = new Development();
        $development->development_name = $validatedData['development_name'];
        $development->status = $request->has('development_status') ? 1 : 0;
        $saved = $development->save();

        if ($saved) {
            return redirect()->back()->with('message', 'Development added successfully!');
        }
        return redirect()->back()->with('message', 'Failed to add development!');

    }
    public function updatedevelopment(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'development_name' => 'required|string|max:255',
            'status' => 'boolean',
        ]);

        // Convert the checkbox value from 'on' to '1' if it's checked
        $validatedData['status'] = $request->has('status') ? 1 : 0;

        // Update the record
        $saved = Development::where('id', $id)->update($validatedData);

        if ($saved) {
            return redirect()->back()->with('message', 'Development updated successfully!');
        }
        return redirect()->back()->with('message', 'Development update failed!');
    }

    //Developers
    public function storedevelopers(Request $request)
    {
            // Validate the request data
            $validatedData = $request->validate([
                'developer_name' => 'required|string|max:255',
                'status' => 'boolean',
            ]);

            // Create a new City instance and set its attributes
            $developer = new Developer();
            $developer->developer_name = $validatedData['developer_name'];
            $developer->status = $request->has('status') ? 1 : 0;
            $saved = $developer->save();

            if ($saved) {
                return redirect()->back()->with('message', 'Developer added successfully!');
            }
            return redirect()->back()->with('message', 'Failed to add developer!');

    }
    public function updatedevelopers(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'developer_name' => 'required|string|max:255',
            'status' => 'boolean',
        ]);

        // Convert the checkbox value from 'on' to '1' if it's checked
        $validatedData['status'] = $request->has('status') ? 1 : 0;

        // Update the record
        $saved = Developer::where('id', $id)->update($validatedData);

        if ($saved) {
            return redirect()->back()->with('message', 'Developer updated successfully!');
        }
        return redirect()->back()->with('message', 'Developer update failed!');
    }


    //Architect
    public function storearchitect(Request $request)
    {
            // Validate the request data
            $validatedData = $request->validate([
                'architects_name' => 'required|string|max:255',
                'status' => 'boolean',
            ]);

            // Create a new City instance and set its attributes
            $architect = new Architect();
            $architect->architects_name = $validatedData['architects_name'];
            $architect->status = $request->has('status') ? 1 : 0;
            $saved = $architect->save();

            if ($saved) {
                return redirect()->back()->with('message', 'Architect added successfully!');
            }
            return redirect()->back()->with('message', 'Failed to add Architect!');

    }
    public function updatearchitect(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'architects_name' => 'required|string|max:255',
            'status' => 'boolean',
        ]);

        // Convert the checkbox value from 'on' to '1' if it's checked
        $validatedData['status'] = $request->has('status') ? 1 : 0;

        // Update the record
        $saved = Architect::where('id', $id)->update($validatedData);

        if ($saved) {
            return redirect()->back()->with('message', 'Architect updated successfully!');
        }
        return redirect()->back()->with('message', 'Architect update failed!');
    }


    //Interior Designer
    public function storeinteriorDesigner(Request $request)
    {
            // Validate the request data
            $validatedData = $request->validate([
                'interior_designer_name' => 'required|string|max:255',
                'status' => 'boolean',
            ]);

            // Create a new City instance and set its attributes
            $interiorDesigner = new InteriorDesigner();
            $interiorDesigner->interior_designer_name = $validatedData['interior_designer_name'];
            $interiorDesigner->status = $request->has('status') ? 1 : 0;
            $saved = $interiorDesigner->save();

            if ($saved) {
                return redirect()->back()->with('message', 'Interior Designer added successfully!');
            }
            return redirect()->back()->with('message', 'Failed to add interior designer!');

    }
    public function updateinteriorDesigner(Request $request, $id)
    {
        // dd($request->all());
        // Validate the request data
        $validatedData = $request->validate([
            'interior_designer_name' => 'required|string|max:255',
            'status' => 'boolean',
        ]);

        // Convert the checkbox value from 'on' to '1' if it's checked
        $validatedData['status'] = $request->has('status') ? 1 : 0;

        // Update the record
        $saved = InteriorDesigner::where('id', $id)->update($validatedData);

        if ($saved) {
            return redirect()->back()->with('message', 'Architect updated successfully!');
        }
        return redirect()->back()->with('message', 'Architect update failed!');
    }
}
