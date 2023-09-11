@extends('components.admin.layout')
@section('content')
    {{-- View property table --}}

    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6 mb-4 mb-sm-0">
                        <h1 class="m-0">Rentals</h1>
                    </div>
                    <div class="col-sm-6">
                        <a href="{{route('admin.rentals.add')}}" 
                        class="btn btn-primary ms-auto d-block me-auto me-sm-2" 
                        style="font-size: 16px; padding: 9px 27px; width: fit-content">
                        <i class='me-2 mb-1 bx bxs-plus-circle'></i>
                        Add New Rental</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12"><br>
                        <div class="card">
                            <div class="card-body">
                                <table id="tables" class="table table-bordered table-sm table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Rent Address</th>
                                            <th>Rent Type</th>
                                            <th>No Of Beds</th>
                                            <th>No Of Baths</th>
                                            <th>Rent per Sq/ft</th>
                                            <th>Monthly Rent</th>
                                            <th>Security Deposit</th>
                                            <th>Rental Status</th>
                                            <th>Edit</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($rentals as $rental)
                                            <tr>
                                                <td>{{ $rental->id }}</td>
                                                <td>{{ $rental->rent_address }}</td>
                                                <td>{{ $rental->rent_type }}</td>
                                                <td>{{ $rental->rent_beds }}</td>
                                                <td>{{ $rental->rent_baths }}</td>
                                                <td>{{ $rental->rent_sqft }}</td>
                                                <td>{{ $rental->monthly_rent }}</td>
                                                <td>{{ $rental->security_deposit }}</td>
                                                <td>{{ $rental->rental_status }}</td>
                                                <td><a href="{{ route('admin.rentals.edit', $rental->id) }}"><i
                                                            class='bx bxs-edit'></i></a></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
