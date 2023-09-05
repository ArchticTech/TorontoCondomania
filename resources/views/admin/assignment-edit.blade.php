@extends('components.admin.layout')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="m-0">Edit Assignment</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12"><br>
                        <div class="card card-default">
                            <div class="card-header">
                                <h3 class="card-title">Assignments</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <form method="POST" id="property_add" enctype="multipart/form-data">
                                    <div class="row">
                                        @csrf
                                        @method('PUT')
                                        <div class="col-md-4 mb-3 mt-3 ">
                                            <div class="form-group">
                                                <label for="prop_code">Assignment Code</label>
                                                <input type="text" hidden value="{{ $assigment->id }}" id="property_id"
                                                    name="property_id">
                                                <input type="text" required class="form-control" id="prop_code"
                                                    name="prop_code" value="{{ $assigment->property->prop_code }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3 mt-3 ">
                                            <div class="form-group">
                                                <label for="prop_name">Assignment Name</label>
                                                <input type="text" required class="form-control" id="prop_name"
                                                    name="prop_name" value="{{ $assigment->property->prop_name }}"
                                                    placeholder="Assignment Name">

                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3 mt-3 ">
                                            <div class="form-group">
                                                <label for="prop_name">Assignment Image</label>
                                                <input type="file" required class="form-control" id="prop_image"
                                                    name="prop_image" placeholder="Property Image" value="">

                                                <input type="hidden" name="prop_imageName"
                                                    value="{{ $assigment->property->prop_image }}">

                                                <img class="img img-fluid m-2" width="50px" height="40px"
                                                    src="{{ asset('images/' . $assigment->property->prop_image) }}" />
                                            </div>
                                        </div>
                                        <div class="mb-3 mt-3 col-md-4">
                                            <label for="city_id">Select City</label>
                                            <select name="city_id" class="form-select" id="city_id"
                                                value="{{ $assigment->property->city_id }}">
                                                @foreach ($cities as $city)
                                                    <option
                                                        {{ $assigment->property['city_id'] == $city->id ? 'selected' : '' }}
                                                        value="{{ $city->id }}">{{ $city->city_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3 mt-3 col-md-4">
                                            <label for="development_id">Select Development</label>
                                            <select name="development_id" class="form-select" id="development_id">
                                                <@foreach ($developments as $development)
                                                    <option
                                                        {{ $assigment->property['development_id'] == $development->id ? 'selected' : '' }}
                                                        value="{{ $development->id }}">
                                                        {{ $development->development_name }}
                                                    </option>
                                                    @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3 mt-3 col-md-4">
                                            <label for="developer_id">Select Developer</label>
                                            <select name="developer_id" class="form-select" id="developer_id">
                                                @foreach ($developers as $developer)
                                                    <option
                                                        {{ $assigment->property['developer_id'] == $developer->id ? 'selected' : '' }}
                                                        value="{{ $developer->id }}">{{ $developer->developer_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3 mt-3 col-md-4">
                                            <label for="architects_id">Select Architect</label>
                                            <select name="architects_id" class="form-select" id="architects_id">
                                                @foreach ($architects as $architect)
                                                    <option
                                                        {{ $assigment->property['architects_id'] == $architect->id ? 'selected' : '' }}
                                                        value="{{ $architect->id }}">{{ $architect->architects_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3 mt-3 col-md-4">
                                            <label for="interior_designer_id">Select interior
                                                Design</label>
                                            <select name="interior_designer_id" class="form-select"
                                                id="interior_designer_id">
                                                @foreach ($interiorDesigners as $interiorDesigner)
                                                    <option
                                                        {{ $assigment->property['interior_designer_id'] == $interiorDesigner->id ? 'selected' : '' }}
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
                                                        {{ $assigment->property['prop_agent_id'] == $propertyAgent->id ? 'selected' : '' }}
                                                        value="{{ $propertyAgent->id }}">{{ $propertyAgent->agent_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3 mt-3 col-md-4">
                                            <label for="prop_type">Select Property Type</label>
                                            <select name="prop_type" class="form-select" id="prop_type">
                                                <option value="Condo" @if ($assigment->property->prop_type == 'Condo') selected @endif>
                                                    Condo
                                                </option>
                                                <option value="Townhouse"
                                                    @if ($assigment->property->prop_type == 'Townhouse') selected @endif>
                                                    Townhouse</option>
                                                <option value="Condo-Townhomes"
                                                    @if ($assigment->property->prop_type == 'Condo-Townhomes') selected @endif>Condo Townhomes
                                                </option>
                                                <option value="Single-family"
                                                    @if ($assigment->property->prop_type == 'Single-family') selected @endif>Single family</option>
                                            </select>
                                        </div>
                                        <div class="mb-3 mt-3 col-md-4">
                                            <label for="prop_status">Select Property Status</label>
                                            <select name="prop_status" class="form-select" id="prop_status">
                                                <option value="Pre-Construction"
                                                    @if ($assigment->property->prop_status == 'Pre-Construction') selected @endif>Pre-Construction
                                                </option>
                                                <option value="Under-Construction"
                                                    @if ($assigment->property->prop_status == 'Under-Construction') selected @endif>Under-Construction
                                                </option>
                                                <option value="Ready to move"
                                                    @if ($assigment->property->prop_status == 'Ready to move') selected @endif>Ready to move</option>
                                            </select>
                                        </div>

                                        <div class="col-md-4 mb-3 mt-3">
                                            <div class="form-group">
                                                <label for="no_of_stories">No Of Stories</label>
                                                <input type="number" required class="form-control" id="no_of_stories"
                                                    name="no_of_stories"
                                                    value="{{ $assigment->property->no_of_stories }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3 mt-3">
                                            <div class="form-group">
                                                <label for="no_of_suites">No Of Suites</label>
                                                <input type="number" required class="form-control" id="no_of_suites"
                                                    name="no_of_suites" value="{{ $assigment->property->no_of_suites }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3 mt-3">
                                            <div class="form-group">
                                                <label for="est_occupancy_month">Estimate Occupency
                                                    Month</label>
                                                <input type="text" class="form-control" id="est_occupancy_month"
                                                    required name="est_occupancy_month"
                                                    placeholder="Estimate Occupency Month"
                                                    value="{{ $assigment->property->est_occupancy_month }}">
                                            </div>
                                        </div>
                                        <div class="mb-3 mt-3 col-md-4">
                                            <label for="est_occupancy_year">Estimate Occupency
                                                Year</label>
                                            <select name="est_occupancy_year" class="form-select"
                                                id="est_occupancy_year">
                                                <option value="Pre-Construction">Pre-Construction</option>
                                                <option value="2022" @if ($assigment->property->est_occupancy_year == '2022') selected @endif>
                                                    2022
                                                </option>
                                                <option value="2023" @if ($assigment->property->est_occupancy_year == '2023') selected @endif>
                                                    2023
                                                </option>
                                                <option value="2024" @if ($assigment->property->est_occupancy_year == '2024') selected @endif>
                                                    2024
                                                </option>
                                                <option value="2025" @if ($assigment->property->est_occupancy_year == '2025') selected @endif>
                                                    2025
                                                </option>
                                                <option value="2026" @if ($assigment->property->est_occupancy_year == '2026') selected @endif>
                                                    2026
                                                </option>
                                                <option value="2027" @if ($assigment->property->est_occupancy_year == '2027') selected @endif>
                                                    2027
                                                </option>
                                                <option value="2028" @if ($assigment->property->est_occupancy_year == '2028') selected @endif>
                                                    2028
                                                </option>
                                                <option value="2029" @if ($assigment->property->est_occupancy_year == '2029') selected @endif>
                                                    2029
                                                </option>
                                                <option value="2030" @if ($assigment->property->est_occupancy_year == '2030') selected @endif>
                                                    2030
                                                </option>
                                            </select>
                                        </div>

                                        <div class="col-md-4 mb-3 mt-3">
                                            <div class="form-group">
                                                <label for="vip_launch_date">Vip launch Date <span
                                                        style="font-size: 12px;color: grey;">(If No Vip
                                                        launch Date : 01/01/2020)</span></label>
                                                <input class="form-control" required id="vip_launch_date"
                                                    name="vip_launch_date" type="date"
                                                    value="{{ $assigment->property->vip_launch_date }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3 mt-3">
                                            <div class="form-group">
                                                <label for="public_launch_date">Public launch Date <span
                                                        style="font-size: 12px;color: grey;">(If No Public
                                                        launch Date : 01/01/2020)</span></label>
                                                <input class="form-control" id="public_launch_date" required
                                                    name="public_launch_date" type="date"
                                                    value="{{ $assigment->property->public_launch_date }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3 mt-3">
                                            <div class="form-group">
                                                <label for="const_start_date">Construction Start Date <span
                                                        style="font-size: 12px;color: grey;">(If No
                                                        Construction Start Date : 01/01/2020)</span></label>
                                                <input class="form-control" id="const_start_date" required
                                                    name="const_start_date" type="date"
                                                    value="{{ $assigment->property->const_start_date }}">
                                            </div>
                                        </div>
                                        <div class="mb-3 mt-3 col-md-4">
                                            <label for="hot_property">Hot Property</label>
                                            <select name="is_hot" class="form-select" id="hot_property"
                                                aria-label="Default select example">
                                                <option value="">Hot Property</option>
                                                <option value="1" @if ($assigment->property->is_hot == '1') selected @endif>
                                                    Yes
                                                </option>
                                                <option value="0" @if ($assigment->property->is_hot == '0') selected @endif>
                                                    No
                                                </option>
                                            </select>
                                        </div>
                                        <div class="mb-3 mt-3 col-md-4">
                                            <label for="vip_featured_promotion">Vip/Featured/Promotion</label>
                                            <select class="form-select" name="vip_featured_promotion"
                                                id="vip_featured_promotion" required>
                                                <option value="Vip" @if ($assigment->property->vip_featured_promotion == 'Vip') selected @endif>
                                                    Vip
                                                </option>
                                                <option value="Featured"
                                                    @if ($assigment->property->vip_featured_promotion == 'Featured') selected @endif>
                                                    Featured</option>
                                                <option value="Promotion"
                                                    @if ($assigment->property->vip_featured_promotion == 'Promotion') selected @endif>
                                                    Promotion</option>
                                            </select>
                                        </div>
                                        <div class="mb-3 mt-3 col-md-4">
                                            <label for="sale_rent">Sale/Rent</label>
                                            <select name="sale_rent" required id="sale_rent" class="form-select">
                                                <option value="Sale" @if ($assigment->property->sale_rent == 'Sale') selected @endif>
                                                    Sale
                                                </option>
                                                <option value="Rent" @if ($assigment->property->sale_rent == 'Rent') selected @endif>
                                                    Rent
                                                </option>
                                            </select>
                                        </div>
                                        <div class="mb-3 mt-3 col-md-4">
                                            <label for="sold_out">Sold Out</label>
                                            <select name="sold_out" required id="sold_out" class="form-select">
                                                <option value="1" @if ($assigment->property->sold_out == 1) selected @endif>
                                                    Yes
                                                </option>
                                                <option value="0" @if ($assigment->property->sold_out == 0) selected @endif>
                                                    No
                                                </option>
                                            </select>
                                        </div>
                                        <div class="mb-3 mt-3 col-md-4">
                                            <label for="status">Status</label>
                                            <select name="status" required id="status" class="form-select">
                                                <option value="1" @if ($assigment->property->status == 1) selected @endif>
                                                    Active</option>
                                                <option value="0" @if ($assigment->property->status == 0) selected @endif>
                                                    In
                                                    Active</option>
                                            </select>
                                        </div>


                                        <div class="col-md-4 mb-3 mt-3">
                                            <div class="form-group">
                                                <label for="suites_starting_floor">Suites Starting
                                                    Floor</label>
                                                <input type="number" class="form-control" id="suites_starting_floor"
                                                    required name="suites_starting_floor"
                                                    value="{{ $assigment->property->suites_starting_floor }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3 mt-3">
                                            <div class="form-group">
                                                <label for="suites_per_floor">Suites Per Floor</label>
                                                <input type="number" class="form-control" id="suites_per_floor" required
                                                    name="suites_per_floor"
                                                    value="{{ $assigment->property->suites_per_floor }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3 mt-3">
                                            <div class="form-group">
                                                <label for="floor_plans">Floor Plans</label>
                                                <input type="number" required class="form-control" id="floor_plans"
                                                    name="floor_plans" value="{{ $assigment->property->floor_plans }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3 mt-3">
                                            <div class="form-group">
                                                <label for="prop_price_from">Assignment Price From</label>
                                                <input type="number" class="form-control" id="prop_price_from" required
                                                    value="0" name="prop_price_from"
                                                    value="{{ $assigment->property->prop_price_from }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4
                                                    mb-3 mt-3">
                                                <div class="form-group">
                                                    <label for="prop_price_to">Assignment Price To</label>
                                                    <input type="number" class="form-control" id="prop_price_from"
                                                        required name="prop_price_from"
                                                        value="{{ $assigment->property->prop_price_to }}">
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3 mt-3">
                                                <div class="form-group">
                                                    <label for="suite_size_from">Suite Size From</label>
                                                    <input type="number" class="form-control" id="suite_size_from"
                                                        required name="suite_size_from"
                                                        value="{{ $assigment->property->suite_size_from }}">
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3 mt-3">
                                                <div class="form-group">
                                                    <label for="suite_size_to">Suite Size To</label>
                                                    <input type="number" required class="form-control"
                                                        id="suite_size_to" name="suite_size_to"
                                                        value="{{ $assigment->property->suite_size_to }}">
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3 mt-3">
                                                <div class="form-group">
                                                    <label for="ceiling_height">Ceiling Height</label>
                                                    <input type="number" class="form-control" id="ceiling_height"
                                                        required name="ceiling_height"
                                                        value="{{ $assigment->property->ceiling_height }}">
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3 mt-3">
                                                <div class="form-group">
                                                    <label for="price_per_sqft_from">Price Per Sq/ft
                                                        From</label>
                                                    <input type="number" required class="form-control"
                                                        id="price_per_sqft_from" name="price_per_sqft_from"
                                                        value="{{ $assigment->property->price_per_sqft_from }}">
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3 mt-3">
                                                <div class="form-group">
                                                    <label for="price_per_sqft_to">Price Per Sq/ft To</label>
                                                    <input type="number" required class="form-control"
                                                        id="price_per_sqft_to" name="price_per_sqft_to"
                                                        value="{{ $assigment->property->price_per_sqft_to }}">
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3 mt-3">
                                                <div class="form-group">
                                                    <label for="parking_price">Parking Price</label>
                                                    <input type="number" required class="form-control"
                                                        id="parking_price" name="parking_price"
                                                        value="{{ $assigment->property->parking_price }}">
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3 mt-3">
                                                <div class="form-group">
                                                    <label for="locker_price">Locker Price</label>
                                                    <input type="number" required class="form-control" id="locker_price"
                                                        name="locker_price"
                                                        value="{{ $assigment->property->locker_price }}">
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3 mt-3">
                                                <div class="form-group">
                                                    <label for="no_of_beds">No Of Beds</label>
                                                    <input type="number" required value="0" class="form-control"
                                                        id="no_of_beds" name="no_of_beds" >
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3 mt-3">
                                                <div class="form-group">
                                                    <label for="no_of_baths">No Of Baths</label>
                                                    <input type="number" required value="0" class="form-control"
                                                        id="no_of_baths" name="no_of_baths" >
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3 mt-3">
                                                <div class="form-group">
                                                    <label for="min_deposit_percentage">Min Deposit
                                                        Percentage</label>
                                                    <input type="number" class="form-control"
                                                        id="min_deposit_percentage" required name="min_deposit_percentage"
                                                        value="{{ $assigment->property->min_deposit_percentage }}">
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3 mt-3">
                                                <div class="form-group">
                                                    <label for="assign_unit_no">Assignment Unit No</label>
                                                    <input type="number" class="form-control" id="assign_unit_no"
                                                        required value="0" name="assign_unit_no"
                                                        >
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3 mt-3">
                                                <div class="form-group">
                                                    <label for="assign_floor_no">Assignment Floor No</label>
                                                    <input type="number" class="form-control" id="assign_floor_no"
                                                        required value="0" name="assign_floor_no"
                                                        >
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3 mt-3">
                                                <div class="form-group">
                                                    <label for="assign_purchase_price">Assignment Purchase No</label>
                                                    <input type="number" class="form-control" id="assign_purchase_price"
                                                        required value="0" name="assign_purchase_price"
                                                        >
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3 mt-3">
                                                <div class="form-group">
                                                    <label for="assign_cooperation_percentage">Assignment Cooperative
                                                        Percentage</label>
                                                    <input type="number" class="form-control"
                                                        id="assign_cooperation_percentage" required value="0"
                                                        name="assign_cooperation_percentage"
                                                        >
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3 mt-3">
                                                <div class="form-group">
                                                    <label for="assign_deposit_paid">Assignment Deposit Paid</label>
                                                    <input type="number" class="form-control" id="assign_deposit_paid"
                                                        required value="0" name="assign_deposit_paid">
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3 mt-3">
                                                <div class="form-group">
                                                    <label for="assign_purchased_date">Assign Purchased Date <span
                                                            style="font-size: 12px;color: grey;">(If No Purchased Date :
                                                            01/01/2020)</span></label>
                                                    <input type="date" class="form-control" id="assign_purchased_date"
                                                        required value="0" name="assign_purchased_date">
                                                </div>
                                            </div>
                                            <div class="col-md-4 mb-3 mt-3">
                                                <div class="form-group">
                                                    <label for="assign_tentative_occ_date">Assign Tentative Occ <span
                                                            style="font-size: 12px;color: grey;">(If No Assign Tentative
                                                            Occ :
                                                            01/01/2020)</span></label>
                                                    <input class="form-control" value="2020-01-01"
                                                        id="assign_tentative_occ_date" required
                                                        name="assign_tentative_occ_date" type="date">
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3 mt-3">
                                                <div class="form-group">
                                                    <label for="prop_address">Assignment Address</label>
                                                    <input type="text" required class="form-control" id="prop_address"
                                                        name="prop_address"
                                                        value="{{ $assigment->property->prop_address }}">
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3 mt-3">
                                                <div class="form-group">
                                                    <label for="prop_iframe">Assignment Location Iframe</label>
                                                    <textarea name="prop_iframe" required value="{{ $assigment->property->prop_iframe }}" id="prop_iframe"
                                                        rows="5" class="form-control"> </textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3 mt-3">
                                                <div class="form-group">
                                                    <label for="prop_meta_title">Assignment Meta Title</label>
                                                    <textarea name="prop_meta_title" value="{{ $assigment->property->prop_meta_title }}" id="prop_meta_title"
                                                        rows="1" class="form-control"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3 mt-3">
                                                <div class="form-group">
                                                    <label for="prop_meta_description">Assignment Meta Description</label>
                                                    <textarea name="prop_meta_description" id="prop_meta_description" rows="2" class="form-control"
                                                        value="{{ $assigment->property->prop_meta_description }}"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3 mt-3">
                                                <div class="form-group">
                                                    <label for="prop_meta_keywords">Assignment Meta Keywords</label>
                                                    <textarea name="prop_meta_keywords" id="prop_meta_keywords" rows="1" class="form-control"
                                                        value="{{ $assigment->property->prop_meta_keywords }}"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3 mt-3">
                                                <div class="form-group">
                                                    <label for="prop_meta_tags">Property Meta Tags</label>
                                                    <textarea name="prop_meta_tags" value="{{ $assigment->property->prop_meta_tags }}" id="prop_meta_tags"
                                                        rows="3" class="form-control"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mb-3 mt-3">
                                                <p style="font-size: 22px;font-weight: 600;margin-top: 1rem;">Assignment
                                                    Features</p>
                                                <table class="table table-bordered table-hover"
                                                    id="property_feature_table">
                                                    <thead>
                                                        <tr>
                                                            <th style="text-align: center;">Assignment Feature</th>
                                                            <th style="text-align: center;">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="property_feature_tbody">

                                                    </tbody>
                                                </table>
                                                <button type="button" name="add_property_feature"
                                                    style="float: right;margin-right: 1rem;padding: 6px 10px 6px 10px;"
                                                    id="add_property_feature" class="btn btn-xs btn-success"><i
                                                        class="bx bx-plus"></i></button>
                                            </div>
                                            <div class="col-md-12 mb-3 mt-3">
                                                <p style="font-size: 22px;font-weight: 600;margin-top: 1rem;">Assignment
                                                    Description</p>
                                                <table class="table table-bordered table-hover"
                                                    id="property_detail_table">
                                                    <thead>
                                                        <tr>
                                                            <th style="text-align: center;">Assignment Description</th>
                                                            <th style="text-align: center;">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="property_detail_tbody">

                                                    </tbody>
                                                </table>
                                                <button type="button" name="add_property_detail"
                                                    style="float: right;margin-right: 1rem;padding: 6px 10px 6px 10px;"
                                                    id="add_property_detail" class="btn btn-xs btn-success"><i
                                                        class="bx bx-plus"></i></button>
                                            </div>
                                            <div class="col-md-12 mt-3 mb-3">
                                                <p style="font-size: 22px;font-weight: 600;margin-top: 1rem;">Assignment
                                                    Images
                                                </p>
                                                <div class="row" id="property_image_row">

                                                </div>
                                                <button type="button" name="add_property_image"
                                                    style="float: right;margin-right: 1rem;padding: 6px 10px 6px 10px;"
                                                    id="add_property_image" class="btn btn-xs btn-success"><i
                                                        class="bx bx-plus"></i></button>
                                            </div>
                                            <div class="col-md-12 mt-3 mb-3">
                                                <p style="font-size: 22px;font-weight: 600;margin-top: 1rem;">Assignment
                                                    Floor
                                                    Plan Images</p>
                                                <div class="row" id="assignment_floor_plan_image_row">

                                                </div>
                                                <button type="button" name="add_assignment_floor_plan"
                                                    style="float: right;margin-right: 1rem;padding: 6px 10px 6px 10px;"
                                                    id="add_assignment_floor_plan" class="btn btn-xs btn-success"><i
                                                        class="bx bx-plus"></i></button>
                                            </div>
                                            <div class="col-md-12 mb-3 mt-3" style="display: flex; align-items: center; justify-content: center">

                                                <button type="submit"
                                                    style="margin-top: 5rem;padding: 0.5rem 5rem 0.5rem 5rem;"
                                                    class="btn btn-success" id="add_property_button">Update
                                                    Assigment</button>

                                            </div>
                                        </div>


                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
