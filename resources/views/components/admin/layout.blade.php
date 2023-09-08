<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default"
    data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Admin Panel</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('admin/assets/img/favicon/favicon-32x32.png') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />


    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/fonts/boxicons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/css/core.css') }}"
        class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/css/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <link rel="stylesheet" href="{{ asset('admin/assets/vendor/libs/apex-charts/apex-charts.css') }}" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="{{ asset('admin/assets/vendor/js/helpers.js') }}"></script>


    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('admin/assets/js/config.js') }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const notification = document.getElementById("myNotification");

            // Function to show the notification
            function showNotification() {
                notification.style.display = "block";

                // Hide the notification after 3 seconds
                setTimeout(() => {
                    notification.style.display = "none";
                }, 3000);
            }

            // Initialize the notification
            showNotification();
        });
    </script>
</head>

<body>

    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">

            <!-- Menu -->

            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href="#" class="app-brand-link">
                        <span class="app-brand-logo demo">
                            <div>
                                <img src="{{ asset('admin/assets/img/logo.png') }}" style="width: 70px; height: 70px;"
                                    class="p-1" />
                            </div>
                        </span>
                        <span class="app-brand-text demo menu-text fw-bolder ms-2">TCM</span>
                    </a>

                    <a href="javascript:void(0);"
                        class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>



                <ul class="menu-inner py-1">
                    <!-- Dashboard -->
                    <li class="menu-item active">
                        <a href="/secure-zone" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Analytics">Dashboard</div>
                        </a>
                    </li>

                    <li class="menu-header small text-uppercase">
                        <span class="menu-header-text">Main Pages</span>
                    </li>

                    <!-- Main pages -->

                    <li class="menu-item">
                        <a href="#" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx bx-building-house"></i>
                            <div>Property</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="/secure-zone/property/add" class="menu-link">
                                    <i class="menu-icon tf-icons bx bx-add-to-queue"></i>
                                    <div>Add</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="/secure-zone/property" class="menu-link">
                                    <i class="menu-icon tf-icons bx bxs-calendar-event"></i>
                                    <div data-i18n="Layouts">View </div>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="menu-item">
                        <a href="#" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bxs-building-house"></i>
                            <div>Assignments</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="/secure-zone/assigment/add" class="menu-link ">
                                    <i class="menu-icon tf-icons bx bx-image-add"></i>
                                    <div data-i18n="Layouts">Add</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="/secure-zone/assigment" class="menu-link">
                                    <i class="menu-icon tf-icons bx bx-image-alt"></i>
                                    <div data-i18n="Layouts">View</div>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="menu-item">
                        <a href="#" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bxs-buildings"></i>
                            <div data-i18n="Account Settings">Rentals</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="/secure-zone/rentals/add" class="menu-link">
                                    <i class="menu-icon tf-icons bx bx-plus-circle"></i>
                                    <div data-i18n="Layouts">Add</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="/secure-zone/rentals" class="menu-link">
                                    <i class="menu-icon tf-icons bx bx-info-circle"></i>
                                    <div data-i18n="Layouts">View</div>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="menu-item">
                        <a href="/secure-zone/consulting-form" class="menu-link ">
                            <i class="menu-icon tf-icons bx bx-user-voice"></i>
                            <div data-i18n="Layouts">Consulting Form</div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="/secure-zone/subscription-form" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-dollar-circle"></i>
                            <div data-i18n="Layouts">Subscription Form</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link ">
                            <i class="menu-icon tf-icons bx bx-building-house"></i>
                            <div data-i18n="Layouts">Reserved Floor Plans</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link ">
                            <i class="menu-icon tf-icons bx bxs-building-house"></i>
                            <div data-i18n="Layouts">Property Information</div>
                        </a>
                    </li>


                    <!-- Components -->
                    <li class="menu-header small text-uppercase"><span class="menu-header-text">Components</span></li>

                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-dock-top"></i>
                            <div>Account Settings</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="pages-account-settings-account.html" class="menu-link">
                                    <div>Account</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="pages-account-settings-notifications.html" class="menu-link">
                                    <div>Notifications</div>
                                </a>
                            </li>

                        </ul>
                    </li>

                </ul>
            </aside>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
                    id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="bx bx-menu bx-sm"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <!-- Search -->
                        <div class="navbar-nav align-items-center">
                            <div class="nav-item d-flex align-items-center">
                                <i class="bx bx-search fs-4 lh-0"></i>
                                <input type="text" class="form-control border-0 shadow-none"
                                    placeholder="Search..." aria-label="Search..." />
                            </div>
                        </div>
                        <!-- /Search -->

                        <ul class="navbar-nav flex-row align-items-center ms-auto">
                            <!-- Place this tag where you want the button to render. -->
                            <li class="nav-item lh-1 me-3">
                                <a class="github-button"
                                    href="https://github.com/themeselection/sneat-html-admin-template-free"
                                    data-icon="octicon-star" data-size="large" data-show-count="true"
                                    aria-label="Star themeselection/sneat-html-admin-template-free on GitHub">Star</a>
                            </li>

                            <!-- User -->
                            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                                    data-bs-toggle="dropdown">
                                    <div class="avatar avatar-online">
                                        <img src="{{ asset('admin/assets/img/avatars/1.png') }}" alt
                                            class="w-px-40 h-auto rounded-circle" />
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <div class="d-flex">
                                                <div class="flex-shrink-0 me-3">
                                                    <div class="avatar avatar-online">
                                                        <img src="{{ asset('admin/assets/img/avatars/1.png') }}" alt
                                                            class="w-px-40 h-auto rounded-circle" />
                                                    </div>
                                                </div>
                                                <div class="flex-grow-1">
                                                    <span class="fw-semibold d-block">John Doe</span>
                                                    <small class="text-muted">Admin</small>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="bx bx-user me-2"></i>
                                            <span class="align-middle">My Profile</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#">
                                            <i class="bx bx-cog me-2"></i>
                                            <span class="align-middle">Settings</span>
                                        </a>
                                    </li>

                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="/secure-zone/logout">
                                            <i class="bx bx-power-off me-2"></i>
                                            <span class="align-middle">Log Out</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <!--/ User -->
                        </ul>
                    </div>
                </nav>

                <!-- / Navbar -->
                <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                                    class="fas fa-bars"></i></a>
                        </li>
                        <li class="nav-item d-none d-sm-inline-block">
                            <a href="index" class="nav-link">Home</a>
                        </li>
                    </ul>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link" data-toggle="dropdown" href="#">
                                <i class="fas fa-caret-square-down"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                                <div class="dropdown-divider"></div>
                                <a href="../signout.php" class="dropdown-item">
                                    <i class="fas fa-power-off mr-2"></i> LogOut
                                </a>

                            </div>
                        </li>
                    </ul>
                </nav>

                @if (session()->has('message'))
                    <div id="myNotification"
                        class="fixed-top start-50 translate-middle-x text-white text-center px-5 py-4"
                        style="z-index: 2000; border-radius: 0.375rem; box-shadow: rgb(135 148 163 / 30%) 0px 0px 0.75rem 0.25rem; top: 50px;
                                background-color: #5f61e69e; font-weight: bold; text-transform: capitalize; font-size: 21px;">
                        <p id="message" style="margin-bottom: 0">{{ session('message') }}</p>
                    </div>
                @endif

                @yield('content')



                <!-- Footer -->
                <footer class="content-footer footer bg-footer-theme">
                    <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                        <div class="mb-2 mb-md-0">
                            ©
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                            , made with ❤️ by
                            <a href="#" target="_blank" class="footer-link fw-bolder">TCM</a>
                        </div>
                        <div>
                            <a href="#" target="_blank" class="footer-link me-4">Documentation</a>

                            <a href="#" target="_blank" class="footer-link me-4">Support</a>
                        </div>
                    </div>
                </footer>
                <!-- / Footer -->

                <div class="content-backdrop fade"></div>
            </div>
            <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->



    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('admin/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('admin/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('admin/assets/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('admin/assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>

    <!-- Main JS -->
    <script src="{{ asset('admin/assets/js/main.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('admin/assets/js/dashboards-analytics.js') }}"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>
<script>
    @if (isset($features))
        var i = {{count($features)}} + 1;
    @else
        var i = 1;
    @endif
    $("#add_property_feature").click(function() {
        $('#property_feature_tbody').append('<tr id="row' + i + '">\
            <td>\
                <input type="text" placeholder="Property Feature" name="prop_feature[]" class="form-control prop_feature" />\
            </td>\
            <td style="text-align: center">\
                <button type="button" style="padding: 6px 10px 6px 10px;" name="btn_remove_prop_feature" id="' + i + '" class="btn btn-xs btn-danger btn_remove_prop_feature">\
                    <i class="bx bxs-trash"></i>\
                </button>\
            </td>\
        </tr>');
        i++;
    });

    $(document).on('click', '.btn_remove_prop_feature', function() {
        var button_id = $(this).attr("id");
        $('#row' + button_id + '').remove();
    });


    //rent features
    @if (isset($features))
        var z = {{count($features)}} + 1;
    @else
        var z = 1;
    @endif
    $("#add_rent_feature").click(function() {
        $('#property_feature_tbody').append('<tr id="row' + z + '">\
            <td>\
                <input type="text" placeholder="Rent Feature" name="rent_feature[]" class="form-control rent_feature" />\
            </td>\
            <td style="text-align: center">\
                <button type="button" style="padding: 6px 10px 6px 10px;" name="btn_remove_rent_feature" id="' + z + '" class="btn btn-xs btn-danger btn_remove_prop_feature">\
                    <i class="bx bxs-trash"></i>\
                </button>\
            </td>\
        </tr>');
        z++;
    });

    $(document).on('click', '.btn_remove_rent_feature', function() {
        var button_id = $(this).attr("id");
        $('#row' + button_id + '').remove();
    });

    //end rent features

    @if (isset($details))
        var j = {{count($details)}} + 1;
    @else
        var j = 1;
    @endif
    $("#add_property_detail").click(function() {
        j++;
        $('#property_detail_tbody').append('<tr id="row' + j + '">\
            <td>\
                <input type="text" placeholder="Property Detail" name="prop_detail[]" class="form-control prop_detail" />\
            </td>\
            <td style="text-align: center">\
                <button type="button" style="padding: 6px 10px 6px 10px;" name="btn_remove_prop_detail" id="' + j + '" class="btn btn-xs btn-danger btn_remove_prop_detail">\
                    <i class="bx bxs-trash"></i>\
                </button>\
            </td>\
        </tr>');
    });

    $(document).on('click', '.btn_remove_prop_detail', function() {
        var button_id = $(this).attr("id");
        $('#row' + button_id + '').remove();
    });

    var k = 0;
    $("#add_property_image").click(function() {
        k++;
        $('#property_image_row').append('\
            <div class="col-md-4" id="image_row' + k + '">\
                <div class="form-group">\
                    <label for="prop_name">Property Image ' + k +
            '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" style="padding: 6px 10px 6px 10px;" name="btn_remove_prop_image" id="' +
            k + '" class="btn btn-xs btn-danger m-1 btn_remove_prop_image"><i class="bx bxs-trash"></i></button></label>\
                    <input type="file"  class="form-control property_image" id="prop_image" name="property_image[]" placeholder="Property Image">\
                </div>\
            </div>');
    });

    $(document).on('click', '.btn_remove_prop_image', function() {
        var button_id = $(this).attr("id");
        $('#image_row' + button_id + '').remove();
    });

    //RENT IMAGE
    var y = 0;
    $("#add_rent_image").click(function() {
        y++;
        $('#rent_image_row').append('\
            <div class="col-md-4" id="image_row' + y + '">\
                <div class="form-group">\
                    <label for="prop_name">Rent Image ' + y +
            '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" style="padding: 6px 10px 6px 10px;" name="btn_remove_rent_image" id="' +
            y + '" class="btn btn-xs btn-danger m-1 btn_remove_rent_image"><i class="bx bxs-trash"></i></button></label>\
                    <input type="file"  class="form-control property_image" id="prop_image" name="property_image[]" placeholder="Rent Image">\
                </div>\
            </div>');
    });

    $(document).on('click', '.btn_remove_rent_image', function() {
        var button_id = $(this).attr("id");
        $('#image_row' + button_id + '').remove();
    });

    //END RENT IMAGE

    var l = 0;
    $("#add_property_floor_plan").click(function() {
        l++;
        $('#property_floor_plan_image_row').append('\
            <div class="row" id="property_floor_plan_row' + l + '">\
                <div class="col-md-3 mt-3 mb-3">\
                    <div class="form-group">\
                        <label for="property_floor_plan">Floor Plan ' + l +
            '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>\
                        <input type="file" class="form-control floor_plan_image" id="prop_image" name="floor_plan_image[]" required placeholder="Floor Plan">\
                    </div>\
                </div>\
                <div class="col-md-3 mt-3 mb-3">\
                    <div class="form-group">\
                        <label for="plan_suite_no">Suite No ' + l + '</label>\
                        <input type="text" required class="form-control" id="plan_suite_no" name="plan_suite_no[]" placeholder="Suite No">\
                    </div>\
                </div>\
                <div class="col-md-3 mt-3 mb-3">\
                    <div class="form-group">\
                        <label for="plan_suite_name">Suite Name ' + l + '</label>\
                        <input type="text" required class="form-control" id="plan_suite_name" name="plan_suite_name[]" placeholder="Suite Name">\
                    </div>\
                </div>\
                <div class="col-md-3 mt-3 mb-3">\
                    <div class="form-group">\
                        <label for="plan_sq_ft">Plan Sq. Ft ' + l + '</label>\
                        <input type="number" required class="form-control" id="plan_sq_ft" name="plan_sq_ft[]" placeholder="Plan Sq. Ft">\
                    </div>\
                </div>\
                <div class="col-md-3 mt-3 mb-3">\
                    <div class="form-group">\
                        <label for="plan_bath">Plan Bath ' + l + '</label>\
                        <input type="number" required class="form-control" id="plan_bath" name="plan_bath[]" placeholder="Plan Bath">\
                    </div>\
                </div>\
                <div class="col-md-3 mt-3 mb-3">\
                    <div class="form-group">\
                        <label for="plan_bed">Plan Bed ' + l + '</label>\
                        <input type="number" required class="form-control" id="plan_bed" name="plan_bed[]" placeholder="Plan Bed">\
                    </div>\
                </div>\
                <div class="col-md-3 mt-3 mb-3">\
                    <div class="form-group">\
                        <label for="plan_availability">Plan Availability ' + l + '</label>\
                        <select name="plan_availability[]" required id="plan_availability" class="form-select">\
                            <option id="">Plan Availability</option>\
                            <option value="1">Yes</option>\
                            <option value="0">No</option>\
                        </select>\
                    </div>\
                </div>\
                <div class="col-md-3 mt-3 mb-3">\
                    <div class="form-group">\
                        <label for="plan_terrace_balcony">Terrace / Balcony ' + l + '</label>\
                        <select name="plan_terrace_balcony[]" required id="plan_terrace_balcony" class="form-select">\
                            <option id="">Terrace / Balcony</option>\
                            <option value="Terrace">Terrace</option>\
                            <option value="Balcony">Balcony</option>\
                            <option value="-">-</option>\
                        </select>\
                    </div>\
                </div>\
                <button type="button" style="padding: 7px; width:130px; margin: 10px auto" name="btn_remove_property_floor_plan" id="' +
                        l + '" class="btn btn-xs btn-danger btn_remove_property_floor_plan "><i class="bx bxs-trash"></i></button>\
                <div class="col-md-12 my-2"><hr></div>\
            </div>\
        ');
    });

    $(document).on('click', '.btn_remove_property_floor_plan', function() {
        var button_id = $(this).attr("id");
        $('#property_floor_plan_row' + button_id + '').remove();
    });

    // $("#property_add").submit(function(e) {
    //     e.preventDefault();
    //     $("#add_property_button").empty();
    //     $("#add_property_button").append('<i class="bx bxs-error-circle"></i>');
    //     document.getElementById("add_property_button").disabled = true;

    //     var formData = new FormData(this);
    //     var encodedIframe = encodeURIComponent(formData.get('prop_iframe'));

    //     formData.set('prop_iframe', encodedIframe);

    //     $.ajax({
    //         url: '{{ route('admin.property.store') }}',
    //         enctype: 'multipart/form-data',
    //         data: formData,
    //         type: 'POST',
    //         contentType: false,
    //         processData: false,
    //         success: (res) => {
    //             // console.log(res);
    //             window.location.href = "{{ route('admin.property.view') }}";

    //             $("#add_property_button").empty();
    //             $("#add_property_button").append('Add Property');
    //             document.getElementById("add_property_button").disabled = false;
    //             $("#property_add")[0].reset();
    //         },
    //         error: (res) => {
    //             console.log(res);
    //         }
    //     });
    // });
</script>

</html>
