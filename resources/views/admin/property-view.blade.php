@extends('components.admin.layout')
@section('content')

                {{-- View property table --}}

                <div class="content-wrapper">
                    <section class="content">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-sm-6 mb-4 mb-sm-0">
                                    <h1 class="m-0">Properties</h1>
                                </div>
                                <div class="col-sm-6">
                                    <a href="{{route('admin.property.add')}}"
                                    class="btn btn-primary ms-auto d-block me-auto me-sm-2"
                                    style="font-size: 16px; padding: 9px 27px; width: fit-content">
                                    <i class='me-2 mb-1 bx bxs-plus-circle'></i>
                                    Add New Property</a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12"><br>
                                    <div class="card">
                                        <div class="card-body">
                                            <table id="tables"
                                                class="table table-bordered table-sm table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Property Code</th>
                                                        <th>Property Name</th>
                                                        <th>City ID</th>
                                                        <th>Address</th>
                                                        <th>Type</th>
                                                        <th>Status</th>
                                                        <th>Price From</th>
                                                        <th>Price To</th>
                                                        <th>Est. Occpancy</th>
                                                        <th>Edit</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($properties as $property)

                                                    <tr>
                                                        <td>{{ $property->id }}</td>
                                                        <td>{{ $property->prop_code }}</td>
                                                        <td>{{ $property->prop_name }}</td>
                                                        <td>{{ $property->city_id }}</td>
                                                        <td>{{ $property->prop_address }}</td>
                                                        <td>{{ $property->prop_type }}</td>
                                                        <td>{{ $property->prop_status }}</td>
                                                        <td>{{ $property->prop_price_from }}</td>
                                                        <td>{{ $property->prop_price_to }}</td>
                                                        <td>{{ $property->est_occupancy_month }}</td>
                                                        <td><a href="{{ route('admin.property.edit', ['slug' => $property->slug]) }}"><i class='bx bxs-edit'></i></a></td>
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
