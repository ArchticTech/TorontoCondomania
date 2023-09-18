@extends('components.admin.layout')

@section('content')
    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12"><br>
                        <div class="card card-default">
                            <div class="card-header">
                                <h2 class="card-title m-0">Update Rental</h2>
                            </div>
                            <div class="card-body">
                                {{-- action="{{ route('admin.property.update', $property->id) }}"  --}}
                                <form method="POST" id="property_add" enctype="multipart/form-data"
                                    action="{{ route('admin.rentals.update', ['id' => $rental->id]) }}" />
                                <div class="row">
                                    @csrf
                                    @method('PUT')
                                    <div class="col-md-4 mb-3 mt-3 ">
                                        <div class="form-group">
                                            <label for="rent_address">Rent Address</label>
                                            <input type="text" required class="form-control" id="rent_address"
                                                name="rent_address" value="{{ $rental->rent_address }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3 mt-3 ">
                                        <div class="form-group">
                                            <label for="rent_iframe">Rent iFrame</label>
                                            <input type="text" required class="form-control" id="rent_iframe"
                                                name="rent_iframe" value="{{ $rental->rent_iframe }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3 mt-3 ">
                                        <div class="form-group">
                                            <label for="rent_type">Rent Type</label>
                                            <input type="text" required class="form-control" id="rent_type"
                                                name="rent_type" value="{{ $rental->rent_type }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4 mb-3 mt-3">
                                        <div class="form-group">
                                            <label for="rent_beds">No Of Beds</label>
                                            <input type="number" required class="form-control" id="rent_beds"
                                                name="rent_beds" value="{{ $rental->rent_beds }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3 mt-3">
                                        <div class="form-group">
                                            <label for="rent_baths">No Of Baths</label>
                                            <input type="number" required class="form-control" id="rent_baths"
                                                name="rent_baths" value="{{ $rental->rent_baths }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3 mt-3">
                                        <div class="form-group">
                                            <label for="rent_sqft">Rent per Sq/ft</label>
                                            <input type="text" class="form-control" id="rent_sqft" required
                                                name="rent_sqft" value="{{ $rental->rent_sqft }}">
                                        </div>
                                    </div>


                                    <div class="col-md-4 mb-3 mt-3">
                                        <div class="form-group">
                                            <label for="available_date">Available Date</span></label>
                                            <input class="form-control" required id="available_date" name="available_date"
                                                type="date" value="{{ $rental->available_date }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4 mb-3 mt-3">
                                        <div class="form-group">
                                            <label for="monthly_rent">Monthly Rent</label>
                                            <input type="number" class="form-control" id="monthly_rent" required
                                                name="monthly_rent" value="{{ $rental->monthly_rent }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3 mt-3">
                                        <div class="form-group">
                                            <label for="security_deposit">Security Deposit</label>
                                            <input type="number" class="form-control" id="security_deposit" required
                                                name="security_deposit" value="{{ $rental->security_deposit }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3 mt-3">
                                        <div class="form-group">
                                            <label for="laundry_located">Laundry Located</label>
                                            <input type="text" required class="form-control" id="laundry_located"
                                                name="laundry_located" value="{{ $rental->laundry_located }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3 mt-3">
                                        <div class="form-group">
                                            <label for="rent_description">Rent Description</label>
                                            <input type="text" required class="form-control" id="rent_description"
                                                name="rent_description" value="{{ $rental->rent_description }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3 mt-3">
                                        <div class="form-group">
                                            <label for="pet_policy">Pet Policy</label>
                                            <input type="text" required class="form-control" id="pet_policy"
                                                name="pet_policy" value="{{ $rental->pet_policy }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3 mt-3">
                                        <div class="form-group">
                                            <label for="smoking_policy">Smoking Policy</label>
                                            <input type="text" required class="form-control" id="smoking_policy"
                                                name="smoking_policy" value="{{ $rental->smoking_policy }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3 mt-3">
                                        <div class="form-group">
                                            <label for="lease_length">Lease Length</label>
                                            <input type="text" required class="form-control" id="lease_length"
                                                name="lease_length" value="{{ $rental->lease_length }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3 mt-3">
                                        <div class="form-group">
                                            <label for="lease_terms">Lease Terms</label>
                                            <input type="text" required class="form-control" id="lease_terms"
                                                name="lease_terms" value="{{ $rental->lease_terms }}">
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-3 mt-3">
                                        <div class="form-group">
                                            <label for="rental_status">Rental Status</label>
                                            <input type="text" required class="form-control" id="rental_status"
                                                name="rental_status" value="{{ $rental->rental_status }}">
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3 mt-3">
                                        <p style="font-size: 22px;font-weight: 600;margin-top: 1rem;">Rent
                                            Features</p>
                                        <table class="table table-bordered table-hover" id="rent_feature_table">
                                            <thead>
                                                <tr>
                                                    <th style="text-align: center;">Rent Feature</th>
                                                    <th style="text-align: center;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody id="property_feature_tbody">
                                                @foreach ($rentalFeatures as $rentalFeature)
                                                    <tr id="row1">
                                                        <td>
                                                            <input type="text" placeholder="Rent Feature" name="rent_feature[]" 
                                                            class="form-control rent_feature" value="{{$rentalFeature->feature}}">
                                                        </td>
                                                        <td style="text-align: center">
                                                            <button type="button" style="padding: 6px 10px" name="btn_remove_rent_feature" 
                                                            id="{{$loop->iteration}}" class="btn btn-xs btn-danger btn_remove_prop_feature"> 
                                                            <i class="bx bxs-trash"></i></button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        <button type="button" name="add_rent_feature"
                                            style="float: right;padding: 6px 21px;" id="add_rent_feature"
                                            class="btn btn-xs btn-success mt-3"><i class="bx bx-plus"></i></button>
                                    </div>

                                    <div class="col-md-12 mt-3 mb-3">
                                        <p style="font-size: 22px;font-weight: 600;margin-top: 1rem;">Rent Images
                                        </p>
                                        <div class="row" id="rental_image_row">
                                            @foreach ($rentalImages as $rentalImage)
                                                <div class="col-md-4" id="image_row{{ $loop->iteration }}">
                                                    <div class="form-group">
                                                        <label for="prop_name">
                                                            Rental Image {{ $loop->iteration }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            <button type="button" style="padding: 6px 10px" name="btn_remove_prop_image" id="{{ $loop->iteration }}" class="btn btn-xs btn-danger m-1 btn_remove_prop_image"><i class="bx bxs-trash"></i></button>
                                                        </label>
                                                        <input type="hidden" name="rentalImageName[]" value="{{$rentalImage->image}}" />
                                                        <img class="img img-fluid my-2" width="253px" src="{{ asset('images/' . $rentalImage->image) }}" />
                                                    </div>
                                                </div>                                            
                                            @endforeach
                                        </div>
                                        <button type="button" name="add_rental_image"
                                            style="float: right;padding: 6px 21px;" id="add_rental_image"
                                            class="btn btn-xs btn-success mt-3"><i class="bx bx-plus"></i></button>
                                    </div>

                                    <div class="col-md-12 mb-3 mt-3"
                                        style="display: flex; align-items: center; justify-content: center">

                                        <button type="submit" style="margin-top: 5rem;padding: 0.5rem 5rem 0.5rem 5rem;"
                                            class="btn btn-success" id="add_property_button">Update
                                            Rentals</button>

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
