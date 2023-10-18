@extends('components.admin.layout')
@section('content')
    {{-- View property table --}}

    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="m-0">Reserved Floor Plans</h1>
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
                                            <th>Purchaser Name</th>
                                            <th>User Logged In</th>
                                            <th>Suite Name</th>
                                            <th>Suite No</th>
                                            <th>Bed</th>
                                            <th>Bath</th>
                                            <th>Terrace/Balcony</th>
                                            <th>Reservation Date</th>
                                            <th>Reservation Status</th>
                                            <th>View</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($totalReservation as $total)
                                        <tr>
                                            <td>{{ $total->id }}</td>
                                            <td>{{ $total->first_name_1 }} {{ $total->last_name_1 }}</td>
                                            <td>{{ $total->user->name }}</td>
                                            <td>{{ $total->floor_plan->plan_suite_name }}</td>
                                            <td>{{ $total->floor_plan->plan_suite_no }}</td>
                                            <td>{{ $total->floor_plan->plan_bed }}</td>
                                            <td>{{ $total->floor_plan->plan_bath }}</td>
                                            <td>{{ $total->floor_plan->plan_terrace_balcony }}</td>
                                            <td>{{ $total->floor_plan->created_at }}</td>
                                            <td>{{ $total->reservation_status }}</td>
                                            <td><a href="/secure-zone/reserved-floor-plan/details"><i class="icon-eye-open"></i></a></td>
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
