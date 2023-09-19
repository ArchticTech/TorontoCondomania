@extends('components.admin.layout')
@section('content')
    {{-- View property table --}}

    <div class="content-wrapper">
        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-default">
                            <div class="card-header">
                                <h3 class="card-title">Add / Edit Cities</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('admin.city.store') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" hidden value="0" class="form-control"
                                                    id="tbl_cities_id" name="tbl_cities_id">
                                                <label for="city_name">City Name</label>
                                                <input type="text" required class="form-control form-control-sm"
                                                    id="city_name" name="city_name" placeholder="City Name">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group text-center">
                                                <label for="city_status col-md-12">Active / Inactive</label><br>
                                                <input type="checkbox" id="city_status" name="city_status">
                                            </div>
                                        </div>
                                        <div class="col-md-12 text-center">
                                            <button type="submit" style="margin-top:1rem;padding: 0.2rem 5rem 0.2rem 5rem;"
                                                class="btn btn-primary ms-auto  me-auto me-sm-2">Add
                                                City</button>
                                        </div>

                                    </div>
                                </form><br>
                                <table id="tables1" class="table table-bordered table-sm table-striped table-hover">
                                    <thead>
                                        <tr style="text-align: center;">
                                            <th>ID</th>
                                            <th>City</th>
                                            <th>Active / Inactive</th>
                                            <th>Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cities as $city)
                                            <form method="POST"
                                                action="{{ route('admin.city.update', ['id' => $city->id]) }}">
                                                @csrf
                                                @method('put')
                                                <tr id="city-row-{{ $city->id }}" style="text-align: center;">
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>
                                                        <span
                                                            id="city-name-{{ $city->id }}">{{ $city->city_name }}</span>
                                                        <input type="text" class="form-control" name="city_name"
                                                            id="edit-city-name-{{ $city->id }}"
                                                            value="{{ $city->city_name }}" style="display: none;">
                                                    </td>
                                                    <td>
                                                        <input name="status" type="checkbox" value="1"
                                                            id="edit-city-status-{{ $city->id }}"
                                                            {{ $city->status == 1 ? 'checked' : '' }}>
                                                    </td>
                                                    <td>
                                                        <button type="button" class="btn btn-primary btn-sm edit_cityBtn"
                                                            data-city-id="{{ $city->id }}">
                                                            <i class="bx bxs-edit"></i>
                                                        </button>
                                                        <button type="submit" class="btn btn-success btn-sm save_cityBtn"
                                                            data-city-id="{{ $city->id }}" style="display: none;">
                                                            <i class="bx bx-check"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            </form>
                                        @endforeach
                                    </tbody>
                                </table>
                                <!-- Display Pagination Links -->
                                <div class="my-2">{{ $cities->onEachSide(1)->links() }}</div>
                            </div>

                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card card-default">
                            <div class="card-header">
                                <h3 class="card-title">Add / Edit Development</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('admin.development.store') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" hidden value="0" class="form-control"
                                                    id="tbl_development_id" name="tbl_development_id">
                                                <label for="development_name">Development Name</label>
                                                <input type="text" required class="form-control form-control-sm"
                                                    id="development_name" name="development_name"
                                                    placeholder="Development Name">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group text-center">
                                                <label for="development_status col-md-12">Active / Inactive</label><br>
                                                <input type="checkbox" id="development_status" name="development_status">
                                            </div>
                                        </div>
                                        <div class="col-md-12 text-center">

                                            <button type="submit"
                                                style="margin-top:1rem;padding: 0.2rem 5rem 0.2rem 5rem;"
                                                class="btn btn-primary ms-auto  me-auto me-sm-2">Add Development</button>

                                        </div>
                                    </div>
                                </form><br>
                                <table id="tables2" class="table table-bordered table-sm table-striped table-hover">
                                    <thead>
                                        <tr style="text-align: center;">
                                            <th>ID</th>
                                            <th>Development</th>
                                            <th>Active / Inactive</th>
                                            <th>Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($developments as $development)
                                            <form method="POST"
                                                action="{{ route('admin.development.update', ['id' => $development->id]) }}">
                                                @csrf
                                                @method('put')
                                                <tr id="development-row-{{ $development->id }}"
                                                    style="text-align: center;">
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>
                                                        <span
                                                            id="development-name-{{ $development->id }}">{{ $development->development_name }}</span>
                                                        <input type="text" class="form-control"
                                                            name="development_name"
                                                            id="edit-development-name-{{ $development->id }}"
                                                            value="{{ $development->development_name }}"
                                                            style="display: none;">
                                                    </td>
                                                    <td>
                                                        <input name="status" type="checkbox" value="1"
                                                            {{ $development->status == 1 ? 'checked' : '' }}>
                                                    </td>
                                                    <td>
                                                        <button type="button"
                                                            class="btn btn-primary btn-sm edit-development-button"
                                                            data-development-id="{{ $development->id }}">
                                                            <i class="bx bxs-edit"></i>
                                                        </button>
                                                        <button type="submit"
                                                            class="btn btn-success btn-sm save-development-button"
                                                            data-development-id="{{ $development->id }}"
                                                            style="display: none;">
                                                            <i class="bx bx-check"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            </form>
                                        @endforeach
                                    </tbody>
                                </table>
                                <!-- Display Pagination Links -->
                                <div class="my-2"> {{ $developments->onEachSide(1)->links() }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row my-4">
                    <div class="col-md-6">
                        <div class="card card-default">
                            <div class="card-header">
                                <h3 class="card-title">Add / Edit Developer</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('admin.developers.store') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" hidden value="0" class="form-control"
                                                    id="tbl_developer_id" name="tbl_developer_id">
                                                <label for="developer_name">Developer Name</label>
                                                <input type="text" required class="form-control form-control-sm"
                                                    id="developer_name" name="developer_name"
                                                    placeholder="Developer Name">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group text-center">
                                                <label for="developer_status col-md-12">Active / Inactive</label><br>
                                                <input type="checkbox" id="developer_status" name="status">
                                            </div>
                                        </div>
                                        <div class="col-md-12 text-center">

                                            <button type="submit"
                                                style="margin-top:1rem;padding: 0.2rem 5rem 0.2rem 5rem;"
                                                class="btn btn-primary ms-auto  me-auto me-sm-2">Add Developer</button>

                                        </div>
                                    </div>
                                </form><br>
                                <table id="tables3" class="table table-bordered table-sm table-striped table-hover">
                                    <thead>
                                        <tr style="text-align: center;">
                                            <th>ID</th>
                                            <th>Developer</th>
                                            <th>Active / Inactive</th>
                                            <th>Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($developers as $developer)
                                            <form method="POST"
                                                action="{{ route('admin.developers.update', ['id' => $developer->id]) }}">
                                                @csrf
                                                @method('put')
                                                <tr style="text-align: center;">
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>
                                                        <span
                                                            id="developer-name-{{ $developer->id }}">{{ $developer->developer_name }}</span>
                                                        <input type="text" class="form-control" name="developer_name"
                                                            id="edit-developer-name-{{ $developer->id }}"
                                                            value="{{ $developer->developer_name }}"
                                                            style="display: none;">
                                                    </td>
                                                    <td>
                                                        <input name="status" type="checkbox" value="1"
                                                            {{ $developer->status == 1 ? 'checked' : '' }}>
                                                    </td>
                                                    <td>
                                                        <button type="button"
                                                            class="btn btn-primary btn-sm edit-developer-button"
                                                            data-developer-id="{{ $developer->id }}">
                                                            <i class="bx bxs-edit"></i>
                                                        </button>
                                                        <button type="submit"
                                                            class="btn btn-success btn-sm save-developer-button"
                                                            data-developer-id="{{ $developer->id }}"
                                                            style="display: none;">
                                                            <i class="bx bx-check"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            </form>
                                        @endforeach

                                    </tbody>
                                </table>
                                <!-- Display Pagination Links -->
                                <div class="my-2"> {{ $developers->onEachSide(1)->links() }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card card-default">
                            <div class="card-header">
                                <h3 class="card-title">Add / Edit Architect</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('admin.architect.store') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" hidden value="0" class="form-control"
                                                    id="tbl_architects_id" name="tbl_architects_id">
                                                <label for="architects_name">Architect Name</label>
                                                <input type="text" required class="form-control form-control-sm"
                                                    id="architects_name" name="architects_name"
                                                    placeholder="Architect Name">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group text-center">
                                                <label for="architects_status col-md-12">Active / Inactive</label><br>
                                                <input type="checkbox" id="architects_status" name="status">
                                            </div>
                                        </div>
                                        <div class="col-md-12 text-center">

                                            <button type="submit"
                                                style="margin-top:1rem;padding: 0.2rem 5rem 0.2rem 5rem;"
                                                class="btn btn-primary ms-auto  me-auto me-sm-2">Add Architect</button>

                                        </div>
                                    </div>
                                </form><br>
                                <table id="tables4" class="table table-bordered table-sm table-striped table-hover">
                                    <thead>
                                        <tr style="text-align: center;">
                                            <th>ID</th>
                                            <th>Architect</th>
                                            <th>Active / Inactive</th>
                                            <th>Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($architects as $architect)
                                            <form method="POST"
                                                action="{{ route('admin.architect.update', ['id' => $architect->id]) }}">
                                                @csrf
                                                @method('put')
                                                <tr style="text-align: center;">
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>
                                                        <span
                                                            id="architect-name-{{ $architect->id }}">{{ $architect->architects_name }}</span>
                                                        <input type="text" class="form-control" name="architects_name"
                                                            id="edit-architect-name-{{ $architect->id }}"
                                                            value="{{ $architect->architects_name }}"
                                                            style="display: none;">
                                                    </td>
                                                    <td>
                                                        <input name="status" type="checkbox" value="1"
                                                            {{ $architect->status == 1 ? 'checked' : '' }}>
                                                    </td>
                                                    <td>
                                                        <button type="button"
                                                            class="btn btn-primary btn-sm edit-architect-button"
                                                            data-architect-id="{{ $architect->id }}">
                                                            <i class="bx bxs-edit"></i>
                                                        </button>
                                                        <button type="submit"
                                                            class="btn btn-success btn-sm save-architect-button"
                                                            data-architect-id="{{ $architect->id }}"
                                                            style="display: none;">
                                                            <i class="bx bx-check"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            </form>
                                        @endforeach
                                    </tbody>
                                </table>
                                <!-- Display Pagination Links -->
                                <div class="my-2"> {{ $architects->onEachSide(1)->links() }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row my-4">
                    <div class="col-md-6">
                        <div class="card card-default">
                            <div class="card-header">
                                <h3 class="card-title">Add / Edit Interior Designer</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('admin.interiorDesigner.store') }}">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <input type="text" hidden value="0" class="form-control"
                                                    id="tbl_interior_designer_id" name="tbl_interior_designer_id">
                                                <label for="interior_designer_name">Interior Designer Name</label>
                                                <input type="text" required class="form-control form-control-sm"
                                                    id="interior_designer_name" name="interior_designer_name"
                                                    placeholder="Interior Designer Name">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group text-center">
                                                <label for="interior_designer_status col-md-12">Active /
                                                    Inactive</label><br>
                                                <input type="checkbox" id="status" name="interior_designer_status">
                                            </div>
                                        </div>
                                        <div class="col-md-12 text-center">

                                            <button type="submit"
                                                style="margin-top:1rem;padding: 0.2rem 5rem 0.2rem 5rem;"
                                                name="add_interior_designer_button"
                                                class="btn btn-primary ms-auto  me-auto me-sm-2"
                                                id="add_interior_designer_button">Add interior designer</button>

                                        </div>
                                    </div>
                                </form><br>
                                <table id="tables5" class="table table-bordered table-sm table-striped table-hover">
                                    <thead>
                                        <tr style="text-align: center;">
                                            <th>ID</th>
                                            <th>Interior Designer</th>
                                            <th>Active / Inactive</th>
                                            <th>Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($interiorDesigners as $interiorDesigner)
                                            <form method="POST"
                                                action="{{ route('admin.interiorDesigner.update', ['id' => $architect->id]) }}">
                                                @csrf
                                                @method('put')
                                                <tr style="text-align: center;">
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>
                                                        <span
                                                            id="interiorDesigner-name-{{ $interiorDesigner->id }}">{{ $interiorDesigner->interior_designer_name }}</span>
                                                        <input type="text" class="form-control"
                                                            name="interior_designer_name"
                                                            id="edit-interiorDesigner-name-{{ $interiorDesigner->id }}"
                                                            value="{{ $interiorDesigner->interior_designer_name }}"
                                                            style="display: none;">
                                                    </td>
                                                    <td>
                                                        <input name="status" type="checkbox" value="1"
                                                            {{ $interiorDesigner->status == 1 ? 'checked' : '' }}>
                                                    </td>
                                                    <td>
                                                        <button type="button"
                                                            class="btn btn-primary btn-sm edit-interiorDesigner-button"
                                                            data-interiordesigner-id="{{ $interiorDesigner->id }}">
                                                            <i class="bx bxs-edit"></i>
                                                        </button>
                                                        <button type="submit"
                                                            class="btn btn-success btn-sm save-interiorDesigner-button"
                                                            data-interiordesigner-id="{{ $interiorDesigner->id }}"
                                                            style="display: none;">
                                                            <i class="bx bx-check"></i>
                                                        </button>
                                                    </td>
                                                </tr>
                                            </form>
                                        @endforeach
                                    </tbody>
                                </table>
                                <!-- Display Pagination Links -->
                                <div class="my-2"> {{ $interiorDesigners->onEachSide(1)->links() }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
