<?php
// Property Controller
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\File;
use App\Models\Property;
use App\Models\Assignment;
use App\Models\PropertyFeature;
use App\Models\PropertyDescription;
use App\Models\PropertyImage;
use App\Models\PropertyFloorPlan;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function all()
    {
        return Property::where('is_assignment', 0)->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public static function store(Request $request)
    {
        $date = now();

        $prop_code = $request->input('prop_code');
        $prop_name = $request->input('prop_name');
        $city_id = $request->input('city_id');
        $development_id = $request->input('development_id');
        $developer_id = $request->input('developer_id');
        $architects_id = $request->input('architects_id');
        $interior_designer_id = $request->input('interior_designer_id');
        $prop_agent_id = $request->input('prop_agent_id');
        $prop_address = $request->input('prop_address');
        $prop_iframe = $request->input('prop_iframe');
        $prop_type = $request->input('prop_type');
        $prop_status = $request->input('prop_status');
        $no_of_stories = $request->input('no_of_stories');
        $no_of_suites = $request->input('no_of_suites');
        $est_occupancy_month = $request->input('est_occupancy_month');
        $est_occupancy_year = $request->input('est_occupancy_year');

        $vip_launch_date = now()->parse($request->input('vip_launch_date'))->toDateString();
        $public_launch_date = now()->parse($request->input('public_launch_date'))->toDateString();
        $const_start_date = now()->parse($request->input('const_start_date'))->toDateString();

        $is_hot = $request->input('is_hot');
        $vip_featured_promotion = $request->input('vip_featured_promotion');
        $sale_rent = $request->input('sale_rent');
        $sold_out = $request->input('sold_out');
        $status = $request->input('status');

        $suites_starting_floor = $request->input('suites_starting_floor');
        $suites_per_floor = $request->input('suites_per_floor');
        $floor_plans = $request->input('floor_plans');
        $prop_price_from = $request->input('prop_price_from');
        $prop_price_to = $request->input('prop_price_to');
        $suite_size_from = $request->input('suite_size_from');
        $suite_size_to = $request->input('suite_size_to');
        $ceiling_height = $request->input('ceiling_height');
        $price_per_sqft_from = $request->input('price_per_sqft_from');
        $price_per_sqft_to = $request->input('price_per_sqft_to');
        $parking_price = $request->input('parking_price');
        $locker_price = $request->input('locker_price');
        $min_deposit_percentage = $request->input('min_deposit_percentage');
        $no_of_beds = $request->input('no_of_beds');
        $no_of_baths = $request->input('no_of_baths');
        
        $prop_imageName = '';
        if ($request->hasFile('prop_image') && $request->file('prop_image')->isValid()) 
        {
            $prop_imageName = propertycontroller::saveImage($request->file('prop_image'));
        }

        $property = new Property([
            'prop_code' => $prop_code,
            'prop_name' => $prop_name,
            'prop_image' => $prop_imageName,
            'city_id' => $city_id,
            'development_id' => $development_id,
            'developer_id' => $developer_id,
            'architects_id' => $architects_id,
            'interior_designer_id' => $interior_designer_id,
            'prop_agent_id' => $prop_agent_id,
            'prop_address' => $prop_address,
            'prop_iframe' => $prop_iframe,
            'prop_type' => $prop_type,
            'prop_status' => $prop_status,
            'no_of_stories' => $no_of_stories,
            'no_of_suites' => $no_of_suites,
            'est_occupancy_month' => $est_occupancy_month,
            'est_occupancy_year' => $est_occupancy_year,
            'vip_launch_date' => $vip_launch_date,
            'public_launch_date' => $public_launch_date,
            'const_start_date' => $const_start_date,
            'is_hot' => $is_hot,
            'vip_featured_promotion' => $vip_featured_promotion,
            'sale_rent' => $sale_rent,
            'sold_out' => $sold_out,
            'status' => $status,
            'suites_starting_floor' => $suites_starting_floor,
            'suites_per_floor' => $suites_per_floor,
            'floor_plans' => $floor_plans,
            'prop_price_from' => $prop_price_from,
            'prop_price_to' => $prop_price_to,
            'suite_size_from' => $suite_size_from,
            'suite_size_to' => $suite_size_to,
            'ceiling_height' => $ceiling_height,
            'price_per_sqft_from' => $price_per_sqft_from,
            'price_per_sqft_to' => $price_per_sqft_to,
            'parking_price' => $parking_price,
            'locker_price' => $locker_price,
            'min_deposit_percentage' => $min_deposit_percentage,
            'no_of_beds' => $no_of_beds,
            'no_of_baths' => $no_of_baths
        ]);

        $saved = $property->save();

        if($saved)
        {
            if ($request->input('prop_feature'))
            {
                propertycontroller::addFeatures($request->input('prop_feature'), $property);
            }
            if ($request->input('prop_detail'))
            {
                propertycontroller::addDetails($request->input('prop_detail'), $property);
            }
            if ($request->file('property_image'))
            {
                propertycontroller::addImages($request->file('property_image'), $property);
            }
            if ($request->input('plan_suite_name'))
            {
                propertycontroller::addFloorPlans(
                    $request->file('floor_plan_image'),
                    $request->input('plan_suite_no'),
                    $request->input('plan_suite_name'),
                    $request->input('plan_sq_ft'),
                    $request->input('plan_bath'),
                    $request->input('plan_bed'),
                    $request->input('plan_availability'),
                    $request->input('plan_terrace_balcony'), 
                    $property);
            }
        }

        return [
            'saved' => $saved,   // This will be true or false
            'property' => $property,  // This will be the saved Property object
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public static function get($id)
    {
        return Property::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public static function update(Request $request, $id)
    {
        // Find the property by its ID
        $property = Property::find($id);

        if (!$property) {
            return redirect()->route('admin.property')
                ->with('message', 'Property Not Found');
        }

        // Update the property attributes with new values
        $property->prop_code = $request->input('prop_code');
        $property->prop_name = $request->input('prop_name');
        $property->city_id = $request->input('city_id');
        $property->development_id = $request->input('development_id');
        $property->developer_id = $request->input('developer_id');
        $property->architects_id = $request->input('architects_id');
        $property->interior_designer_id = $request->input('interior_designer_id');
        $property->prop_agent_id = $request->input('prop_agent_id');
        $property->prop_address = $request->input('prop_address');
        $property->prop_iframe = $request->input('prop_iframe');
        $property->prop_type = $request->input('prop_type');
        $property->prop_status = $request->input('prop_status');
        $property->no_of_stories = $request->input('no_of_stories');
        $property->no_of_suites = $request->input('no_of_suites');
        $property->est_occupancy_month = $request->input('est_occupancy_month');
        $property->est_occupancy_year = $request->input('est_occupancy_year');
        
        $property->vip_launch_date = now()->parse($request->input('vip_launch_date'))->toDateString();
        $property->public_launch_date = now()->parse($request->input('public_launch_date'))->toDateString();
        $property->const_start_date = now()->parse($request->input('const_start_date'))->toDateString();

        $property->is_hot = $request->input('is_hot');
        $property->vip_featured_promotion = $request->input('vip_featured_promotion');
        $property->sale_rent = $request->input('sale_rent');
        $property->sold_out = $request->input('sold_out');
        $property->status = $request->input('status');

        $property->suites_starting_floor = $request->input('suites_starting_floor');
        $property->suites_per_floor = $request->input('suites_per_floor');
        $property->floor_plans = $request->input('floor_plans');
        $property->prop_price_from = $request->input('prop_price_from');
        $property->prop_price_to = $request->input('prop_price_to');
        $property->suite_size_from = $request->input('suite_size_from');
        $property->suite_size_to = $request->input('suite_size_to');
        $property->ceiling_height = $request->input('ceiling_height');
        $property->price_per_sqft_from = $request->input('price_per_sqft_from');
        $property->price_per_sqft_to = $request->input('price_per_sqft_to');
        $property->parking_price = $request->input('parking_price');
        $property->locker_price = $request->input('locker_price');
        $property->min_deposit_percentage = $request->input('min_deposit_percentage');
        $property->no_of_beds = $request->input('no_of_beds');
        $property->no_of_baths = $request->input('no_of_baths');

        if ($request->hasFile('prop_image') && $request->file('prop_image')->isValid()) 
        {
            $prop_imageName = propertycontroller::saveImage($request->file('prop_image'));
            $property->prop_image = $prop_imageName;
            
            $imagePath = public_path('images/' . $request->input('prop_imageName'));
            if (File::exists($imagePath)) {
                // Delete the image if it exists
                File::delete($imagePath);
            }
        }

        $saved = $property->save();

        PropertyController::removeFeatures($property);
        propertycontroller::removeDetails($property);
        propertycontroller::removeImages($request->input('propertyImageName'), $property);
        propertycontroller::removefloorPlans($request->input('floorPlanID'), $property);
        
        if($saved)
        {
            if ($request->input('prop_feature'))
            {
                propertycontroller::addFeatures($request->input('prop_feature'), $property);
            }
            if ($request->input('prop_detail'))
            {
                propertycontroller::addDetails($request->input('prop_detail'), $property);
            }
            if ($request->file('property_image'))
            {
                propertycontroller::addImages($request->file('property_image'), $property);
            }
            if ($request->input('plan_suite_name'))
            {
                propertycontroller::addFloorPlans(
                    $request->file('floor_plan_image'),
                    $request->input('plan_suite_no'),
                    $request->input('plan_suite_name'),
                    $request->input('plan_sq_ft'),
                    $request->input('plan_bath'),
                    $request->input('plan_bed'),
                    $request->input('plan_availability'),
                    $request->input('plan_terrace_balcony'), 
                    $property);
            }
        }

        return [
            'saved' => $saved,   // This will be true or false
            'property' => $property,  // This will be the saved Property object
        ];
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

    public static function addFeatures($features, $property)
    {
        foreach($features as $feature) {

            $propertyFeature = new PropertyFeature([
                'prop_feature' => $feature,
                'status' => 1
            ]);

            $property->propertyFeatures()->save($propertyFeature);
        }
    }
    public static function removeFeatures($property)
    {
        $property->propertyFeatures()->delete();
        return;
    }
    
    public static function addDetails($details, $property)
    {
        foreach($details as $detail) {

            $propertyDescription = new PropertyDescription([
                'prop_description' => $detail,
                'status' => 1
            ]);

            $property->propertyDescriptions()->save($propertyDescription);
        }
    }
    public static function removeDetails($property)
    {
        $property->propertyDescriptions()->delete();
        return;
    }

    public static function addImages($images, $property)
    {
        foreach($images as $image) {
            $imageName = propertycontroller::saveImage($image);
            $propertyImage = new PropertyImage([
                'image' => $imageName,
                'status' => 1
            ]);

            $property->propertyImages()->save($propertyImage);
        }
    }
    public static function removeImages($imageNames, $property)
    {
        $oldImages = $property->propertyImages->pluck('image')->toArray();
        $deletedImages = $imageNames ? array_diff($oldImages, $imageNames) : $oldImages;
        foreach($deletedImages as $image) {
            $imagePath = public_path('images/' . $image);
            if (File::exists($imagePath)) {
                // Delete the image if it exists
                File::delete($imagePath);
            }

            $property->propertyImages()->where('image', $image)->delete();
        }
        return;
    }
    public static function addFloorPlans($planImages, $suiteNumbers, $suiteNames, $planSizes, $planBaths, 
                                    $planBeds, $planAvailabilities, $planTerraceBalconies, $property)
    {
        $plansCount = count($suiteNames);
        for ($i = 0; $i < $plansCount; $i++) {

            $imageName = propertycontroller::saveImage($planImages[$i]);
            $propertyFloorPlan = new PropertyFloorPlan([
                'floor_plan_image' => $imageName,
                'plan_suite_no' => $suiteNumbers[$i],
                'plan_suite_name' => $suiteNames[$i],
                'plan_sq_ft' => $planSizes[$i],
                'plan_bath' => $planBaths[$i],
                'plan_bed' => $planBeds[$i],
                'plan_availability' => $planAvailabilities[$i],
                'plan_terrace_balcony' => $planTerraceBalconies[$i],
            ]);

            $property->propertyFloorPlans()->save($propertyFloorPlan);
        }
    }
    public static function removeFloorPlans($floorPlanID, $property)
    {
        $oldFloorPlans = $property->propertyFloorPlans->pluck('id')->toArray();
        $deletedPlans = $floorPlanID ? array_diff($oldFloorPlans, $floorPlanID) : $oldFloorPlans;
        
        foreach($deletedPlans as $planID) {
            $plan = PropertyFloorPlan::find($planID);
            
            $imagePath = public_path('images/' . $plan->floor_plan_image);
            if (File::exists($imagePath)) {
                // Delete the image if it exists
                File::delete($imagePath);
            }

            $plan->delete();
        }
        return;
    }
}
