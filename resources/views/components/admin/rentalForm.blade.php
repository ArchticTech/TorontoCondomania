<div class="row">
    @csrf
    <div class="col-md-8 mb-3 mt-3 ">
        <div class="form-group">
            <label for="rent_name">Rental Name</label>
            <input type="text" required class="form-control" id="rent_name" name="rent_name" placeholder="Rental Name"
                @isset($rental)
                    value="{{ $rental->name }}"
                @endisset>
        </div>
    </div>
    <div class="col-md-4 mb-3 mt-3 ">
        {{-- <div class="form-group">
            <label for="image">Rental Image</label>
            <input type="file" required class="form-control" id="image" name="image"
                @isset($rental)
                    value="{{ $rental->image }}"
                @endisset>
        </div> --}}
        <div class="form-group">
            <label for="image"> Image</label>
            @if (isset($rental))
            <input type="file" class="form-control" id="image" name="image" placeholder="Rental Image">

                <input type="hidden" name="image" value="{{ $rental->image }}">

                <img class="img img-fluid my-2" width="253px" src="{{ asset('images/' . $rental->image) }}" />
            @else
            <input type="file" class="form-control" id="image" name="image"
            placeholder="Rental Image" />
            @endif
        </div>
    </div>

    <div class="col-md-12 mb-3 mt-3">
        <div class="form-group">
            <label for="description">Rental Description</label>
            <textarea name="description" id="description" rows="5" class="form-control tinymce-editor">@isset($rental){{ $rental->description }}@endisset</textarea>
        </div>
    </div>

    <div class="col-md-8 mb-3 mt-3">
        <div class="form-group">
            <label for="rent_address">Rental Address</label>
            <input type="text" required class="form-control" id="rent_address" name="rent_address" placeholder="Rental Address"
                @isset($rental)
                    value="{{ $rental->address }}"
                @endisset>
        </div>
    </div>

    <div class="mb-3 mt-3 col-md-4">
        <label for="city_id">Select City</label>
        <select name="city_id" required class="form-select" id="city_id">
            <option value="">Select City</option>
            @foreach ($cities as $city)
                <option value="{{ $city->id }}"
                    {{ (isset($rental) && $rental->city_id == $city->id) ? 'selected' : '' }}>
                    {{ $city->city_name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="mb-3 mt-3">
        <div class="form-group">
            <label for="addressInput">Rental Location</label>
            <div class="form-group has-search">
                <button class="bx bx-search form-control-feedback" id="geocodeButton"></button>
                <input type="text" class="form-control" id="addressInput" placeholder="Find address">

                <div id="recommendations"></div>
            </div>
            <div id="mapbox" style="width: 100%; height: 400px;"></div>
            <input
                @isset($rental)
                  value="{{ $rental->latitude }}"
                @endisset
                type="hidden" id="latInput" name="latitude">
            <input
                @isset($rental)
                    value="{{ $rental->longitude }}"
                @endisset
                type="hidden" id="longInput" name="longitude">
        </div>
    </div>

    <div class="mb-3 mt-3 col-md-4">
        <label for="type">Select Rental Type</label>
        <select name="type" required class="form-select" id="type">
            <option value="">Select Rental Type</option>
            @if (isset($rental))
                <option value="Condo" @if ($rental->type == 'Condo') selected @endif>Condo
                </option>
                <option value="Townhouse" @if ($rental->type == 'Townhouse') selected @endif>
                    Townhouse</option>
                <option value="Condo Townhomes" @if ($rental->type == 'Condo Townhomes') selected @endif>Condo Townhomes
                </option>
                <option value="Single Family" @if ($rental->type == 'Single Family') selected @endif>Single family
                </option>
            @else
                @foreach ($propertyTypeEnums as $value)
                    <option value="{{ $value }}">{{ $value }}</option>
                @endforeach
            @endif
        </select>
    </div>
    <div class="col-md-2 mb-3 mt-3">
        <div class="form-group">
            <label for="rent_beds">No Of Beds</label>
            <input type="number" required class="form-control" id="rent_beds" name="rent_beds" placeholder="No of beds"
                @isset($rental)
                    value="{{ $rental->beds }}"
                @endisset>
        </div>
    </div>
    <div class="col-md-2 mb-3 mt-3">
        <div class="form-group">
            <label for="rent_baths">No Of Baths</label>
            <input type="number" required class="form-control" id="rent_baths" name="rent_baths" placeholder="No of baths"
                @isset($rental)
                    value="{{ $rental->baths }}"
                @endisset>
        </div>
    </div>
    <div class="col-md-4 mb-3 mt-3">
        <div class="form-group">
            <label for="rent_sqft">Rental per Sq/ft</label>
            <input type="text" class="form-control" id="rent_sqft" required name="rent_sqft" placeholder="Rental per Sq/ft"
                @isset($rental)
                    value="{{ $rental->sqft }}"
                @endisset>
        </div>
    </div>

    <div class="col-md-4 mb-3 mt-3">
        <div class="form-group">
            <label for="available_date">Availability Date</span></label>
            <input class="form-control" required id="available_date" name="available_date" type="date"
                @isset($rental)
                    value="{{ $rental->availability_date }}"
                @endisset>
        </div>
    </div>
    <div class="col-md-4 mb-3 mt-3">
        <div class="form-group">
            <label for="monthly_rent">Monthly Rent</label>
            <input type="number" class="form-control" id="monthly_rent" required name="monthly_rent" placeholder="Monthly Rent"
                @isset($rental)
                    value="{{ $rental->monthly_rent }}"
                @endisset>
        </div>
    </div>
    <div class="col-md-4 mb-3 mt-3">
        <div class="form-group">
            <label for="security_deposit">Security Deposit</label>
            <input type="number" class="form-control" id="security_deposit" required name="security_deposit" placeholder="Security Deposit"
                @isset($rental)
                    value="{{ $rental->security_deposit }}"
                @endisset>
        </div>
    </div>

    <div class="col-md-2 mb-3 mt-3">
        <div class="form-group">
            <label for="laundry_located">Laundry Located</label>
            <select name="laundry_located" class="form-select" id="laundry_located"
                aria-label="Default select example">
                @if (isset($rental))
                    <option value="1" @if ($rental->laundry_located == '1') selected @endif>Yes
                    </option>
                    <option value="0" @if ($rental->laundry_located == '0') selected @endif>No
                    </option>
                @else
                <option value="">Laundry Located</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                @endif
            </select>
        </div>
    </div>
    <div class="col-md-2 mb-3 mt-3">
        <div class="form-group">
            <label for="pet_policy">Pet Allowed</label>
            <select name="pet_policy" class="form-select" id="pet_policy" aria-label="Default select example">
                @if (isset($rental))
                    <option value="1" @if ($rental->pet_policy == '1') selected @endif>Yes
                    </option>
                    <option value="0" @if ($rental->pet_policy == '0') selected @endif>No
                    </option>
                @else
                <option value="">Pet Allowed</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                @endif
            </select>
        </div>
    </div>
    <div class="col-md-2 mb-3 mt-3">
        <div class="form-group">
            <label for="smoking_policy">Smoking Allowed</label>
            <select name="smoking_policy" class="form-select" id="smoking_policy"
                aria-label="Default select example">
                @if (isset($rental))
                    <option value="1" @if ($rental->smoking_policy == '1') selected @endif>Yes
                    </option>
                    <option value="0" @if ($rental->smoking_policy == '0') selected @endif>No
                    </option>
                @else
                <option value="">Smoking Allowed</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                @endif
            </select>
        </div>
    </div>
    <div class="col-md-2 mb-3 mt-3">
        <div class="form-group">
            <label for="basement_available">Basement Available</label>
            <select name="basement_available" class="form-select" id="basement_available"
                aria-label="Default select example">
                @if (isset($rental))
                    <option value="1" @if ($rental->basement_available == '1') selected @endif>Yes
                    </option>
                    <option value="0" @if ($rental->basement_available == '0') selected @endif>No
                    </option>
                @else
                <option value="">Basement Available</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                @endif
            </select>
        </div>
    </div>
    <div class="col-md-2 mb-3 mt-3">
        <div class="form-group">
            <label for="parking_available">Parking Available</label>
            <select name="parking_available" class="form-select" id="parking_available"
                aria-label="Default select example">
                @if (isset($rental))
                    <option value="1" @if ($rental->parking_available == '1') selected @endif>Yes
                    </option>
                    <option value="0" @if ($rental->parking_available == '0') selected @endif>No
                    </option>
                @else
                    <option value="">Parking Available</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                @endif
            </select>
        </div>
    </div>
    <div class="col-md-2 mb-3 mt-3">
        <div class="form-group">
            <label for="rental_status">Rental Status</label>
            <select name="rental_status" class="form-select" id="rental_status" aria-label="Default select example">
                @if (isset($rental))
                    <option value="1" @if ($rental->status == '1') selected @endif>Active
                    </option>
                    <option value="0" @if ($rental->status == '0') selected @endif>Not Active
                    </option>
                @else
                    <option value="">Status</option>
                    <option value="1">Active</option>
                    <option value="0">Not Active</option>
                @endif
            </select>
        </div>
    </div>
    <div class="col-md-12 mb-3 mt-3">
        <p style="font-size: 22px;font-weight: 600;margin-top: 1rem;">Rent
            Features</p>
        <table class="table table-bordered table-hover" id="rent_feature_table">
            <thead>
                <tr>
                    <th style="text-align: center;">Rental Feature</th>
                    <th style="text-align: center;">Action</th>
                </tr>
            </thead>
            <tbody id="property_feature_tbody">
                @isset($rentalFeatures)
                    @foreach ($rentalFeatures as $rentalFeature)
                        <tr id="row1">
                            <td>
                                <input type="text" placeholder="Rental Feature" name="rent_feature[]"
                                    class="form-control rent_feature" value="{{ $rentalFeature->feature }}">
                            </td>
                            <td style="text-align: center">
                                <button type="button" style="padding: 6px 10px" name="btn_remove_rent_feature"
                                    id="{{ $loop->iteration }}" class="btn btn-xs btn-danger btn_remove_prop_feature">
                                    <i class="bx bxs-trash"></i></button>
                            </td>
                        </tr>
                    @endforeach
                @endisset
            </tbody>
        </table>
        <button type="button" name="add_rent_feature" style="float: right;padding: 6px 21px;" id="add_rent_feature"
            class="btn btn-xs btn-success mt-3"><i class="bx bx-plus"></i></button>
    </div>

    <div class="col-md-12 mt-3 mb-3">
        <p style="font-size: 22px;font-weight: 600;margin-top: 1rem;">Rental Images
        </p>
        <div class="row" id="rental_image_row">
            @isset($rentalFeatures)
                @foreach ($rentalImages as $rentalImage)
                    <div class="col-md-4" id="image_row{{ $loop->iteration }}">
                        <div class="form-group">
                            <label for="prop_name">
                                Rental Image {{ $loop->iteration }}
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <button type="button" style="padding: 6px 10px" name="btn_remove_prop_image"
                                    id="{{ $loop->iteration }}"
                                    class="btn btn-xs btn-danger m-1 btn_remove_prop_image"><i
                                        class="bx bxs-trash"></i></button>
                            </label>
                            <input type="hidden" name="rentalImageName[]" value="{{ $rentalImage->image }}" />
                            <img class="img img-fluid my-2" width="253px"
                                src="{{ asset('images/' . $rentalImage->image) }}" />
                        </div>
                    </div>
                @endforeach
            @endisset
        </div>
        <button type="button" name="add_rental_image" style="float: right;padding: 6px 21px;" id="add_rental_image"
            class="btn btn-xs btn-success mt-3"><i class="bx bx-plus"></i></button>
    </div>

    <div class="col-md-12 mb-3 mt-3" style="display: flex; align-items: center; justify-content: center">

        <button type="submit" style="margin-top: 5rem;padding: 0.5rem 5rem 0.5rem 5rem;" class="btn btn-success"
            id="add_property_button">
            @if (isset($rental))
                Update
            @else
                Add
            @endif Rentals
        </button>

    </div>
</div>
