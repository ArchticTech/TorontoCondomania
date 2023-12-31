@extends('components.admin.layout')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12"><br>
                        <div class="card card-default">
                            <div class="card-header">
                                <h2 class="card-title m-0">Update Property</h2>
                            </div>
                            <div class="card-body">
                                {{-- action="{{ route('admin.property.update', $property->id) }}"  --}}
                                <form method="POST" id="property_add" enctype="multipart/form-data"
                                    action="{{ route('admin.property.update', ['id' => $property->id]) }}" />
                                @method('PUT')
                                @component('components.admin.propertyForm')
                                    @slot('formName', 'Property')

                                    @slot('property', $property)

                                    @slot('features', $features)
                                    @slot('images', $images)
                                    @slot('floorPlans', $floorPlans)

                                    @slot('architects', $architects)
                                    @slot('features', $features)
                                    @slot('cities', $cities)
                                    @slot('developers', $developers)
                                    @slot('developments', $developments)
                                    @slot('interiorDesigners', $interiorDesigners)
                                    @slot('propertyAgents', $propertyAgents)
                                    @slot('propertyTypeEnums', $propertyTypeEnums)
                                    @slot('propertyStatusEnums', $propertyStatusEnums)
                                @endcomponent
                                {{-- <div class="row">

                                    <div class="col-md-4 mt-3 mb-3">
                                        <div class="form-group">
                                            <label for="prop_code">Property Code</label>
                                            <input type="text" hidden value="{{ $property->id }}" id="property_id"
                                                name="property_id">
                                            <input type="text" required class="form-control" id="prop_code"
                                                name="prop_code" placeholder="Property Code"
                                                value="{{ $property->prop_code }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3 mb-3">
                                        <div class="form-group">
                                            <label for="prop_name">Property Name</label>
                                            <input type="text" required class="form-control" id="prop_name"
                                                name="prop_name" placeholder="Property Name"
                                                value="{{ $property->prop_name }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mt-3 mb-3">
                                        <div class="form-group">
                                            <label for="prop_name">Property Image</label>
                                            <input type="file" class="form-control" id="prop_image"
                                                name="prop_image" placeholder="Property Image">

                                            <input type="hidden" name="prop_imageName" value="{{ $property->prop_image }}">

                                            <img class="img img-fluid my-2" width="253px"
                                                src="{{ asset('images/' . $property->prop_image) }}" />
                                        </div>
                                    </div>
                                    <div class="mb-3 mt-3 col-md-4">
                                        <label for="city_id">Select City</label>
                                        <select name="city_id" class="form-select" id="city_id"
                                            value="{{ $property->city_id }}">
                                            @foreach ($cities as $city)
                                                <option {{ $property['city_id'] == $city->id ? 'selected' : '' }}
                                                    value="{{ $city->id }}">{{ $city->city_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3 mt-3 col-md-4">
                                        <label for="development_id">Select Developmenth</label>
                                        <select name="development_id" class="form-select" id="development_id"
                                            value="{{ $property->development_id }}">
                                            <@foreach ($developments as $development)
                                                <option
                                                    {{ $property['development_id'] == $development->id ? 'selected' : '' }}
                                                    value="{{ $development->id }}">{{ $development->development_name }}
                                                </option>
                                                @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3 mt-3 col-md-4">
                                        <label for="developer_id">Select Developer</label>
                                        <select name="developer_id" class="form-select" id="developer_id"
                                            value="{{ $property->developer_id }}">
                                            @foreach ($developers as $developer)
                                                <option {{ $property['developer_id'] == $developer->id ? 'selected' : '' }}
                                                    value="{{ $developer->id }}">{{ $developer->developer_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3 mt-3 col-md-4">
                                        <label for="architects_id">Select Architect</label>
                                        <select name="architects_id" class="form-select" id="architects_id">
                                            @foreach ($architects as $architect)
                                                <option
                                                    {{ $property['architects_id'] == $architect->id ? 'selected' : '' }}
                                                    value="{{ $architect->id }}">{{ $architect->architects_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3 mt-3 col-md-4">
                                        <label for="interior_designer_id">Select interior
                                            Design</label>
                                        <select name="interior_designer_id" class="form-select" id="interior_designer_id">
                                            @foreach ($interiorDesigners as $interiorDesigner)
                                                <option
                                                    {{ $property['interior_designer_id'] == $interiorDesigner->id ? 'selected' : '' }}
                                                    value="{{ $interiorDesigner->id }}">
                                                    {{ $interiorDesigner->interior_designer_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3 mt-3 col-md-4">
                                        <label for="prop_agent_id">Select Property Agent</label>
                                        <select name="prop_agent_id" class="form-select" id="prop_agent_id">
                                            @foreach ($propertyAgents as $propertyAgent)
                                                <option
                                                    {{ $property['prop_agent_id'] == $propertyAgent->id ? 'selected' : '' }}
                                                    value="{{ $propertyAgent->id }}">{{ $propertyAgent->agent_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3 mt-3 col-md-4">
                                        <label for="prop_type">Select Property Type</label>
                                        <select name="prop_type" class="form-select" id="prop_type">
                                            <option value="Condo" @if ($property->prop_type == 'Condo') selected @endif>Condo
                                            </option>
                                            <option value="Townhouse" @if ($property->prop_type == 'Townhouse') selected @endif>
                                                Townhouse</option>
                                            <option value="Condo Townhomes"
                                                @if ($property->prop_type == 'Condo Townhomes') selected @endif>Condo Townhomes</option>
                                            <option value="Single Family"
                                                @if ($property->prop_type == 'Single Family') selected @endif>Single family</option>
                                        </select>
                                    </div>
                                    <div class="mb-3 mt-3 col-md-4">
                                        <label for="prop_status">Select Property Status</label>
                                        <select name="prop_status" class="form-select" id="prop_status">
                                            <option value="Pre-Construction"
                                                @if ($property->prop_status == 'Pre-Construction') selected @endif>Pre-Construction</option>
                                            <option value="Under-Construction"
                                                @if ($property->prop_status == 'Under-Construction') selected @endif>Under-Construction
                                            </option>
                                            <option value="Ready to move"
                                                @if ($property->prop_status == 'Ready to move') selected @endif>Ready to move</option>
                                        </select>
                                    </div>

                                    <div class="col-md-4 mb-3 mt-3">
                                        <div class="form-group">
                                            <label for="no_of_stories">No Of Stories</label>
                                            <input type="number" required class="form-control" id="no_of_stories"
                                                name="no_of_stories" placeholder="No Of Stories"
                                                value="{{ $property->no_of_stories }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3 mt-3">
                                        <div class="form-group">
                                            <label for="no_of_suites">No Of Suites</label>
                                            <input type="number" required class="form-control" id="no_of_suites"
                                                name="no_of_suites" placeholder="No Of Suites"
                                                value="{{ $property->no_of_suites }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3 mt-3">
                                        <div class="form-group">
                                            <label for="est_occupancy_month">Estimate Occupency
                                                Month</label>
                                            <input type="text" class="form-control" id="est_occupancy_month" required
                                                name="est_occupancy_month" placeholder="Estimate Occupency Month"
                                                value="{{ $property->est_occupancy_month }}">
                                        </div>
                                    </div>
                                    <div class="mb-3 mt-3 col-md-4">
                                        <label for="est_occupancy_year">Estimate Occupency
                                            Year</label>
                                        <select name="est_occupancy_year" class="form-select" id="est_occupancy_year">
                                            <option value="Pre-Construction">Pre-Construction</option>
                                            <option value="2022" @if ($property->est_occupancy_year == '2022') selected @endif>2022
                                            </option>
                                            <option value="2023" @if ($property->est_occupancy_year == '2023') selected @endif>2023
                                            </option>
                                            <option value="2024" @if ($property->est_occupancy_year == '2024') selected @endif>2024
                                            </option>
                                            <option value="2025" @if ($property->est_occupancy_year == '2025') selected @endif>2025
                                            </option>
                                            <option value="2026" @if ($property->est_occupancy_year == '2026') selected @endif>2026
                                            </option>
                                            <option value="2027" @if ($property->est_occupancy_year == '2027') selected @endif>2027
                                            </option>
                                            <option value="2028" @if ($property->est_occupancy_year == '2028') selected @endif>2028
                                            </option>
                                            <option value="2029" @if ($property->est_occupancy_year == '2029') selected @endif>2029
                                            </option>
                                            <option value="2030" @if ($property->est_occupancy_year == '2030') selected @endif>2030
                                            </option>
                                        </select>
                                    </div>

                                    <div class="col-md-4 mb-3 mt-3">
                                        <div class="form-group">
                                            <label for="vip_launch_date">Vip launch Date <span
                                                    style="font-size: 12px;color: grey;">(If No Vip
                                                    launch Date : 01/01/2020)</span></label>
                                            <input class="form-control" required id="vip_launch_date"
                                                name="vip_launch_date" type="date" placeholder="Vip launch Date"
                                                value="{{ $property->vip_launch_date }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3 mt-3">
                                        <div class="form-group">
                                            <label for="public_launch_date">Public launch Date <span
                                                    style="font-size: 12px;color: grey;">(If No Public
                                                    launch Date : 01/01/2020)</span></label>
                                            <input class="form-control" id="public_launch_date" required
                                                name="public_launch_date" type="date" placeholder="Public launch Date"
                                                value="{{ $property->public_launch_date }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3 mt-3">
                                        <div class="form-group">
                                            <label for="const_start_date">Construction Start Date <span
                                                    style="font-size: 12px;color: grey;">(If No
                                                    Construction Start Date : 01/01/2020)</span></label>
                                            <input class="form-control" id="const_start_date" required
                                                name="const_start_date" type="date"
                                                value="{{ $property->const_start_date }}">
                                        </div>
                                    </div>
                                    <div class="mb-3 mt-3 col-md-4">
                                        <label for="hot_property">Hot Property</label>
                                        <select name="is_hot" class="form-select" id="hot_property"
                                            aria-label="Default select example">
                                            <option value="">Hot Property</option>
                                            <option value="1" @if ($property->is_hot == '1') selected @endif>Yes
                                            </option>
                                            <option value="0" @if ($property->is_hot == '0') selected @endif>No
                                            </option>
                                        </select>
                                    </div>
                                    <div class="mb-3 mt-3 col-md-4">
                                        <label for="vip_featured_promotion">Vip/Featured/Promotion</label>
                                        <select class="form-select" name="vip_featured_promotion"
                                            id="vip_featured_promotion" required>
                                            <option value="Vip" @if ($property->vip_featured_promotion == 'Vip') selected @endif>Vip
                                            </option>
                                            <option value="Featured" @if ($property->vip_featured_promotion == 'Featured') selected @endif>
                                                Featured</option>
                                            <option value="Promotion" @if ($property->vip_featured_promotion == 'Promotion') selected @endif>
                                                Promotion</option>
                                        </select>
                                    </div>
                                    <div class="mb-3 mt-3 col-md-4">
                                        <label for="sale_rent">Sale/Rent</label>
                                        <select name="sale_rent" required id="sale_rent" class="form-select">
                                            <option value="Sale" @if ($property->sale_rent == 'Sale') selected @endif>Sale
                                            </option>
                                            <option value="Rent" @if ($property->sale_rent == 'Rent') selected @endif>Rent
                                            </option>
                                        </select>
                                    </div>
                                    <div class="mb-3 mt-3 col-md-4">
                                        <label for="sold_out">Sold Out</label>
                                        <select name="sold_out" required id="sold_out" class="form-select">
                                            <option value="1" @if ($property->sold_out == 1) selected @endif>Yes
                                            </option>
                                            <option value="0" @if ($property->sold_out == 0) selected @endif>No
                                            </option>
                                        </select>
                                    </div>
                                    <div class="mb-3 mt-3 col-md-4">
                                        <label for="status">Status</label>
                                        <select name="status" required id="status" class="form-select">
                                            <option value="1" @if ($property->status == 1) selected @endif>
                                                Active</option>
                                            <option value="0" @if ($property->status == 0) selected @endif>In
                                                Active</option>
                                        </select>
                                    </div>


                                    <div class="col-md-4 mb-3 mt-3">
                                        <div class="form-group">
                                            <label for="suites_starting_floor">Suites Starting
                                                Floor</label>
                                            <input type="number" class="form-control" id="suites_starting_floor"
                                                required name="suites_starting_floor" placeholder="Suites Starting Floor"
                                                value="{{ $property->suites_starting_floor }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3 mt-3">
                                        <div class="form-group">
                                            <label for="suites_per_floor">Suites Per Floor</label>
                                            <input type="number" class="form-control" id="suites_per_floor" required
                                                name="suites_per_floor" placeholder="Suites Per Floor"
                                                value="{{ $property->suites_per_floor }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3 mt-3">
                                        <div class="form-group">
                                            <label for="floor_plans">Floor Plans</label>
                                            <input type="number" required class="form-control" id="floor_plans"
                                                name="floor_plans" value="{{ $property->floor_plans }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3 mt-3">
                                        <div class="form-group">
                                            <label for="prop_price_from">Property Price From</label>
                                            <input type="number" class="form-control" id="prop_price_from" required
                                                name="prop_price_from" value="{{ $property->prop_price_from }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3 mt-3">
                                        <div class="form-group">
                                            <label for="prop_price_to">Property Price To</label>
                                            <input type="number" required class="form-control" id="prop_price_to"
                                                name="prop_price_to" value="{{ $property->prop_price_to }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3 mt-3">
                                        <div class="form-group">
                                            <label for="suite_size_from">Suite Size From</label>
                                            <input type="number" class="form-control" id="suite_size_from" required
                                                name="suite_size_from" value="{{ $property->suite_size_from }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3 mt-3">
                                        <div class="form-group">
                                            <label for="suite_size_to">Suite Size To</label>
                                            <input type="number" required class="form-control" id="suite_size_to"
                                                name="suite_size_to" value="{{ $property->suite_size_to }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3 mt-3">
                                        <div class="form-group">
                                            <label for="ceiling_height">Ceiling Height</label>
                                            <input type="number" class="form-control" id="ceiling_height" required
                                                name="ceiling_height" value="{{ $property->ceiling_height }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3 mt-3">
                                        <div class="form-group">
                                            <label for="price_per_sqft_from">Price Per Sq/ft
                                                From</label>
                                            <input type="number" required class="form-control" id="price_per_sqft_from"
                                                name="price_per_sqft_from" value="{{ $property->price_per_sqft_from }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3 mt-3">
                                        <div class="form-group">
                                            <label for="price_per_sqft_to">Price Per Sq/ft To</label>
                                            <input type="number" required class="form-control" id="price_per_sqft_to"
                                                name="price_per_sqft_to" value="{{ $property->price_per_sqft_to }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3 mt-3">
                                        <div class="form-group">
                                            <label for="parking_price">Parking Price</label>
                                            <input type="number" required class="form-control" id="parking_price"
                                                name="parking_price" value="{{ $property->parking_price }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3 mt-3">
                                        <div class="form-group">
                                            <label for="locker_price">Locker Price</label>
                                            <input type="number" required class="form-control" id="locker_price"
                                                name="locker_price" value="{{ $property->locker_price }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3 mt-3">
                                        <div class="form-group">
                                            <label for="min_deposit_percentage">Min Deposit
                                                Percentage</label>
                                            <input type="number" class="form-control" id="min_deposit_percentage"
                                                required name="min_deposit_percentage"
                                                value="{{ $property->min_deposit_percentage }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3 mt-3">
                                        <div class="form-group">
                                            <label for="no_of_beds">No of Beds</label>
                                            <input type="number" class="form-control" id="no_of_beds" required
                                                name="no_of_beds" value="{{ $property->no_of_beds }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3 mt-3">
                                        <div class="form-group">
                                            <label for="no_of_baths">No of Baths</label>
                                            <input type="number" class="form-control" id="no_of_baths" required
                                                name="no_of_baths" value="{{ $property->no_of_baths }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3 mt-3">
                                        <div class="form-group">
                                            <label for="prop_description">Property Description</label>
                                            <textarea name="prop_description" id="prop_description" rows="5"
                                                class="form-control tinymce-editor">{{ $property->description }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3 mt-3">
                                        <div class="form-group">
                                            <label for="prop_address">Property Address</label>
                                            <input type="text" required class="form-control" id="prop_address"
                                                name="prop_address" value="{{ $property->prop_address }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3 mt-3">
                                        <div class="form-group">
                                            <label for="prop_iframe">Property Location Iframe</label>
                                            <input type="text" id="addressInput" placeholder="Enter an address">
                                            <button id="geocodeButton">Geocode</button>
                                            <div id="recommendations"></div>
                                            <div id="mapbox" style="width: 100%; height: 400px;"></div>
                                            <input type="hidden" id="latInput" name="latitude" value="{{ $property->latitude }}">
                                            <input type="hidden" id="longInput" name="longitude" value="{{ $property->longitude }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3 mt-3">
                                        <div class="form-group">
                                            <label for="prop_meta_title">Property Meta Title</label>
                                            <textarea name="prop_meta_title" id="prop_meta_title" rows="1" class="form-control">{{ $property->prop_meta_title }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3 mt-3">
                                        <div class="form-group">
                                            <label for="prop_meta_description">Property Meta
                                                Description</label>
                                            <textarea name="prop_meta_description" id="prop_meta_description" rows="2" class="form-control">{{ $property->prop_meta_description }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3 mt-3">
                                        <div class="form-group">
                                            <label for="prop_meta_keywords">Property Meta
                                                Keywords</label>
                                            <textarea name="prop_meta_keywords" id="prop_meta_keywords" rows="1" class="form-control">{{ $property->prop_meta_keywords }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3 mt-3">
                                        <div class="form-group">
                                            <label for="prop_meta_tags">Property Meta Tags</label>
                                            <textarea name="prop_meta_tags" id="prop_meta_tags" rows="3" class="form-control">{{ $property->prop_meta_tags }}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3 mt-3">
                                        <p style="font-size: 22px;font-weight: 600;margin-top: 1rem;">
                                            Property Features</p>
                                        <table class="table table-bordered table-hover" id="property_feature_table">
                                            <thead>
                                                <tr>
                                                    <th style="text-align: center;">Property Feature
                                                    </th>
                                                    <th style="text-align: center;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="property_feature_tbody">
                                                @foreach ($features as $feature)
                                                    <tr id="row{{ $loop->iteration }}">
                                                        <td><input type="text" placeholder="Property Feature" name="rent_feature[]" class="form-control prop_feature" value="{{ $feature->prop_feature }}"/></td>
                                                        <td style="text-align: center;">
                                                            <button type="button" style="padding: 6px 10px 6px 10px;" name="btn_remove_prop_feature" id="{{ $loop->iteration }}" class="btn btn-xs btn-danger btn_remove_prop_feature"><i class="bx bxs-trash"></i></button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <button type="button" name="add_property_feature"
                                            style="float: right;padding: 6px 21px;"
                                            id="add_property_feature" class="btn btn-xs btn-success mt-3"><i
                                                class="bx bx-plus"></i></button>
                                    </div>
                                    <div class="col-md-12 mb-3 mt-3">
                                        <p style="font-size: 22px;font-weight: 600;margin-top: 1rem;">
                                            Property Images</p>
                                        <div class="row" id="property_image_row">
                                            @foreach ($images as $image)
                                                <div class="col-md-4" id="image_row{{ $loop->iteration }}">
                                                    <div class="form-group">
                                                        <label for="prop_name">
                                                            Property Image {{ $loop->iteration }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <button type="button" style="padding: 6px 10px" name="btn_remove_prop_image" id="{{ $loop->iteration }}" class="btn btn-xs btn-danger m-1 btn_remove_prop_image"><i class="bx bxs-trash"></i></button>
                                                        </label>
                                                        <input type="hidden" name="propertyImageName[]" value="{{$image->image}}" />
                                                        <img class="img img-fluid my-2" width="253px" src="{{ asset('images/' . $image->image) }}" />
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <button type="button" name="add_property_image"
                                            style="float: right;padding: 6px 21px;"
                                            id="add_property_image" class="btn btn-xs btn-success mt-3"><i
                                                class="bx bx-plus"></i></button>
                                    </div>
                                    <div class="col-md-12 mb-3 mt-3">
                                        <p style="font-size: 22px;font-weight: 600;margin-top: 1rem;">
                                            Property Floor Plan</p>
                                        <div id="property_floor_plan_image_row">

                                        @foreach ($floorPlans as $floorPlan)
                                            <div class="row" id="property_floor_plan_row{{ $loop->iteration }}">
                                                <div class="col-12"><h5 class="mb-0 mt-3">Floor Plan {{ $loop->iteration }}</h5></div>

                                                <input type="hidden" name="floorPlanID[]" value="{{$floorPlan->id}}" />

                                                <div class="col-md-3 my-3">
                                                    <div class="form-group">
                                                      <label for="plan_suite_no">Suite No</label>
                                                      <input readOnly value="{{$floorPlan->plan_suite_no}}" type="text" required="" class="form-control" id="plan_suite_no" placeholder="Suite No" />
                                                    </div>
                                                  </div>
                                                  <div class="col-md-9 my-3">
                                                    <div class="form-group">
                                                      <label for="plan_suite_name">Suite Name</label>
                                                      <input readOnly value="{{$floorPlan->plan_suite_name}}" type="text" required="" class="form-control" id="plan_suite_name" placeholder="Suite Name" />
                                                    </div>
                                                  </div>
                                                  <div class="col-md-3 my-3">
                                                    <div class="form-group">
                                                      <label for="plan_sq_ft">Plan Sq. Ft</label>
                                                      <input readOnly value="{{$floorPlan->plan_sq_ft}}" type="number" required="" class="form-control" id="plan_sq_ft" placeholder="Plan Sq. Ft" />
                                                    </div>
                                                  </div>
                                                  <div class="col-md-3 my-3">
                                                    <div class="form-group">
                                                      <label for="plan_bath">Plan Bath</label>
                                                      <input readOnly value="{{$floorPlan->plan_bath}}" type="number" required="" class="form-control" id="plan_bath" placeholder="Plan Bath" />
                                                    </div>
                                                  </div>
                                                  <div class="col-md-3 my-3">
                                                    <div class="form-group">
                                                      <label for="plan_bed">Plan Bed</label>
                                                      <input readOnly value="{{$floorPlan->plan_bed}}" type="number" required="" class="form-control" id="plan_bed" placeholder="Plan Bed" />
                                                    </div>
                                                  </div>
                                                  <div class="col-md-3 my-3">
                                                    <div class="form-group">
                                                      <label for="plan_availability">Plan Availability</label>
                                                      <input readOnly value="{{$floorPlan->plan_availability}}" type="text" required="" class="form-control" id="plan_availability" placeholder="Plan Bed" />
                                                    </div>
                                                  </div>
                                                  <div class="col-md-6 my-3">
                                                    <div class="form-group">
                                                        <label for="property_floor_plan" class="d-block">Floor Plan Image</label>
                                                        <img class="img img-fluid my-2 mx-auto" width="auto" style="max-height: 200px" src="{{ asset('images/' . $floorPlan->floor_plan_image) }}" />
                                                    </div>
                                                </div>
                                                  <div class="col-md-6 my-3">
                                                    <div class="form-group">
                                                      <label for="plan_terrace_balcony">Terrace / Balcony</label>
                                                      <input readOnly value="{{$floorPlan->plan_terrace_balcony}}" type="text" required="" class="form-control" id="plan_terrace_balcony" placeholder="Plan Bed" />
                                                    </div>
                                                  </div>
                                                  <button type="button" style="padding: 7px; width: 130px; margin: 10px auto;" name="btn_remove_property_floor_plan" id="{{ $loop->iteration }}" class="btn btn-xs btn-danger btn_remove_property_floor_plan">
                                                    <i class="bx bxs-trash"></i>
                                                  </button><div class="col-md-12 my-2"><hr /></div>
                                            </div>
                                        @endforeach

                                        </div>
                                        <button type="button" name="add_property_floor_plan"
                                            style="float: right;padding: 6px 21px;"
                                            id="add_property_floor_plan" class="btn btn-xs btn-success mt-3"><i
                                                class="bx bx-plus"></i></button>
                                    </div>
                                    <div class="col-md-12 mb-3 mt-3"
                                        style="display: flex; align-items: center; justify-content: center">

                                        <button type="submit" style="margin-top: 5rem;padding: 0.5rem 5rem 0.5rem 5rem;"
                                            class="btn btn-success" id="add_property_button">Update
                                            Property</button>

                                    </div>
                                </div> --}}
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
