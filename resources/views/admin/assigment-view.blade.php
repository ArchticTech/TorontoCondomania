@extends('components.admin.layout')
@section('content')

                {{-- View property table --}}

                <div class="content-wrapper">
                    <section class="content">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-sm-12">
                                    <h1 class="m-0">View Assigments</h1>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12"><br>
                                    <div class="card">
                                        <div class="card-body">
                                            <table id="tables"
                                                class="table table-bordered table-sm table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Assignment Name</th>
                                                        <th>City</th>
                                                        <th>Address</th>
                                                        <th>Type</th>
                                                        <th>Pur. Price</th>
                                                        <th>Tentative Occ.</th>
                                                        <th>Pur. Date</th>
                                                        <th>Cooperative Per.</th>
                                                        <th>Edit</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($assigments as $assigment)

                                                    @if ($assigment->property != NULL)


                                                    <tr>
                                                        <td>{{ $assigment->id }}</td>
                                                        <td>{{ $assigment->property->prop_name}}</td>
                                                        <td>{{ $assigment->property->city->city_name}}</td>
                                                        <td>{{ $assigment->property->prop_address}}</td>
                                                        <td>{{ $assigment->property->prop_type}}</td>
                                                        <td>{{ $assigment->assign_purchase_price}}</td>
                                                        <td>{{ $assigment->assign_tentative_occ_date->format('Y-m-d')}}</td>
                                                        <td>{{ $assigment->assign_purchased_date->format('Y-m-d')}}</td>
                                                        <td>{{ $assigment->assign_cooperation_percentage}}%</td>
                                                        <td><a href="{{ route('admin.assigment.edit', $assigment->id) }}"><i class='bx bxs-edit'></i></a></td>
                                                    </tr>
                                                    @endif
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
