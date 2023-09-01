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
    <link rel="icon" type="image/x-icon" href="{{ asset('admin/assets/img/favicon/favicon.ico') }}" />

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
                            <svg width="25" viewBox="0 0 25 42" version="1.1" xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink">
                                <defs>
                                    <path
                                        d="M13.7918663,0.358365126 L3.39788168,7.44174259 C0.566865006,9.69408886 -0.379795268,12.4788597 0.557900856,15.7960551 C0.68998853,16.2305145 1.09562888,17.7872135 3.12357076,19.2293357 C3.8146334,19.7207684 5.32369333,20.3834223 7.65075054,21.2172976 L7.59773219,21.2525164 L2.63468769,24.5493413 C0.445452254,26.3002124 0.0884951797,28.5083815 1.56381646,31.1738486 C2.83770406,32.8170431 5.20850219,33.2640127 7.09180128,32.5391577 C8.347334,32.0559211 11.4559176,30.0011079 16.4175519,26.3747182 C18.0338572,24.4997857 18.6973423,22.4544883 18.4080071,20.2388261 C17.963753,17.5346866 16.1776345,15.5799961 13.0496516,14.3747546 L10.9194936,13.4715819 L18.6192054,7.984237 L13.7918663,0.358365126 Z"
                                        id="path-1"></path>
                                    <path
                                        d="M5.47320593,6.00457225 C4.05321814,8.216144 4.36334763,10.0722806 6.40359441,11.5729822 C8.61520715,12.571656 10.0999176,13.2171421 10.8577257,13.5094407 L15.5088241,14.433041 L18.6192054,7.984237 C15.5364148,3.11535317 13.9273018,0.573395879 13.7918663,0.358365126 C13.5790555,0.511491653 10.8061687,2.3935607 5.47320593,6.00457225 Z"
                                        id="path-3"></path>
                                    <path
                                        d="M7.50063644,21.2294429 L12.3234468,23.3159332 C14.1688022,24.7579751 14.397098,26.4880487 13.008334,28.506154 C11.6195701,30.5242593 10.3099883,31.790241 9.07958868,32.3040991 C5.78142938,33.4346997 4.13234973,34 4.13234973,34 C4.13234973,34 2.75489982,33.0538207 2.37032616e-14,31.1614621 C-0.55822714,27.8186216 -0.55822714,26.0572515 -4.05231404e-15,25.8773518 C0.83734071,25.6075023 2.77988457,22.8248993 3.3049379,22.52991 C3.65497346,22.3332504 5.05353963,21.8997614 7.50063644,21.2294429 Z"
                                        id="path-4"></path>
                                    <path
                                        d="M20.6,7.13333333 L25.6,13.8 C26.2627417,14.6836556 26.0836556,15.9372583 25.2,16.6 C24.8538077,16.8596443 24.4327404,17 24,17 L14,17 C12.8954305,17 12,16.1045695 12,15 C12,14.5672596 12.1403557,14.1461923 12.4,13.8 L17.4,7.13333333 C18.0627417,6.24967773 19.3163444,6.07059163 20.2,6.73333333 C20.3516113,6.84704183 20.4862915,6.981722 20.6,7.13333333 Z"
                                        id="path-5"></path>
                                </defs>
                                <g id="g-app-brand" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="Brand-Logo" transform="translate(-27.000000, -15.000000)">
                                        <g id="Icon" transform="translate(27.000000, 15.000000)">
                                            <g id="Mask" transform="translate(0.000000, 8.000000)">
                                                <mask id="mask-2" fill="white">
                                                    <use xlink:href="#path-1"></use>
                                                </mask>
                                                <use fill="#696cff" xlink:href="#path-1"></use>
                                                <g id="Path-3" mask="url(#mask-2)">
                                                    <use fill="#696cff" xlink:href="#path-3"></use>
                                                    <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-3"></use>
                                                </g>
                                                <g id="Path-4" mask="url(#mask-2)">
                                                    <use fill="#696cff" xlink:href="#path-4"></use>
                                                    <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-4"></use>
                                                </g>
                                            </g>
                                            <g id="Triangle"
                                                transform="translate(19.000000, 11.000000) rotate(-300.000000) translate(-19.000000, -11.000000) ">
                                                <use fill="#696cff" xlink:href="#path-5"></use>
                                                <use fill-opacity="0.2" fill="#FFFFFF" xlink:href="#path-5"></use>
                                            </g>
                                        </g>
                                    </g>
                                </g>
                            </svg>
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
                                    <div>Add Property</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="/secure-zone/property/view" class="menu-link">
                                    <i class="menu-icon tf-icons bx bxs-calendar-event"></i>
                                    <div data-i18n="Layouts">View Property</div>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bxs-building-house"></i>
                            <div>Assigments</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="javascript:void(0);" class="menu-link menu-toggle">
                                    <i class="menu-icon tf-icons bx bx-image-add"></i>
                                    <div data-i18n="Layouts">Add Assigment</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="javascript:void(0);" class="menu-link menu-toggle">
                                    <i class="menu-icon tf-icons bx bx-image-alt"></i>
                                    <div data-i18n="Layouts">View Assigments</div>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bxs-buildings"></i>
                            <div data-i18n="Account Settings">Rentals</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item">
                                <a href="javascript:void(0);" class="menu-link menu-toggle">
                                    <i class="menu-icon tf-icons bx bx-plus-circle"></i>
                                    <div data-i18n="Layouts">Add Rentals</div>
                                </a>
                            </li>
                            <li class="menu-item">
                                <a href="javascript:void(0);" class="menu-link menu-toggle">
                                    <i class="menu-icon tf-icons bx bx-info-circle"></i>
                                    <div data-i18n="Layouts">View Rentals</div>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="menu-item">
                        <a href="javascript:void(0);" class="menu-link ">
                            <i class="menu-icon tf-icons bx bx-user-voice"></i>
                            <div data-i18n="Layouts">Consulting Form</div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="/secure-zone/subscription" class="menu-link">
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
                            <li class="menu-item">
                                <a href="pages-account-settings-connections.html" class="menu-link">
                                    <div>Connections</div>
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
                                        <a class="dropdown-item" href="#">
                                            <span class="d-flex align-items-center align-middle">
                                                <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
                                                <span class="flex-grow-1 align-middle">Billing</span>
                                                <span
                                                    class="flex-shrink-0 badge badge-center rounded-pill bg-danger w-px-20 h-px-20">4</span>
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="dropdown-divider"></div>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="auth-login-basic.html">
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
                        class="fixed-top start-50 translate-middle-x bg-primary text-white text-center px-5 py-3"
                        style="display: none; z-index: 2000; border-radius: 0.375rem; box-shadow: rgb(135 148 163 / 30%) 0px 0px 0.75rem 0.25rem; top: 50px;
    text-transform: capitalize; font-size: 21px;">
                        <p id="message">test message</p>
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
    var i = 1;
    $("#add_property_feature").click(function() {
        i++;
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
    });

    $(document).on('click', '.btn_remove_prop_feature', function() {
        var button_id = $(this).attr("id");
        $('#row' + button_id + '').remove();
    });

    var j = 1;
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
            k + '" class="btn btn-xs btn-danger btn_remove_prop_image"><i class="bx bxs-trash"></i></button></label>\
                    <input type="file"  class="form-control property_image" id="prop_image" name="property_image[]" placeholder="Property Image">\
                </div>\
            </div>');
    });

    $(document).on('click', '.btn_remove_prop_image', function() {
        var button_id = $(this).attr("id");
        $('#image_row' + button_id + '').remove();
    });

    var l = 0;
    $("#add_property_floor_plan").click(function() {
        l++;
        $('#property_floor_plan_image_row').append('\
            <div class="row" id="property_floor_plan_row' + l + '">\
                <div class="col-md-3 mt-3">\
                    <div class="form-group">\
                        <label for="property_floor_plan">Floor Plan ' + l +
            '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" style="padding: 2px 10px 2px 10px;" name="btn_remove_property_floor_plan" id="' +
            l + '" class="btn btn-xs btn-danger btn_remove_property_floor_plan"><i class="bx bxs-trash"></i></button></label>\
                        <input type="file" class="form-control floor_plan_image" id="prop_image" name="floor_plan_image[]" required placeholder="Floor Plan">\
                    </div>\
                </div>\
                <div class="col-md-3 mt-3">\
                    <div class="form-group">\
                        <label for="plan_suite_no">Suite No ' + l + '</label>\
                        <input type="text" required class="form-control" id="plan_suite_no" name="plan_suite_no[]" placeholder="Suite No">\
                    </div>\
                </div>\
                <div class="col-md-3 mt-3">\
                    <div class="form-group">\
                        <label for="plan_suite_name">Suite Name ' + l + '</label>\
                        <input type="text" required class="form-control" id="plan_suite_name" name="plan_suite_name[]" placeholder="Suite Name">\
                    </div>\
                </div>\
                <div class="col-md-3 mt-3">\
                    <div class="form-group">\
                        <label for="plan_sq_ft">Plan Sq. Ft ' + l + '</label>\
                        <input type="number" required class="form-control" id="plan_sq_ft" name="plan_sq_ft[]" placeholder="Plan Sq. Ft">\
                    </div>\
                </div>\
                <div class="col-md-3 mt-3">\
                    <div class="form-group">\
                        <label for="plan_bath">Plan Bath ' + l + '</label>\
                        <input type="number" required class="form-control" id="plan_bath" name="plan_bath[]" placeholder="Plan Bath">\
                    </div>\
                </div>\
                <div class="col-md-3 mt-3">\
                    <div class="form-group">\
                        <label for="plan_bed">Plan Bed ' + l + '</label>\
                        <input type="number" required class="form-control" id="plan_bed" name="plan_bed[]" placeholder="Plan Bed">\
                    </div>\
                </div>\
                <div class="col-md-3 mt-3">\
                    <div class="form-group">\
                        <label for="plan_availability">Plan Availability ' + l + '</label>\
                        <select name="plan_availability[]" required id="plan_availability" class="custom-select">\
                            <option id="">Plan Availability</option>\
                            <option value="1">Yes</option>\
                            <option value="0">No</option>\
                        </select>\
                    </div>\
                </div>\
                <div class="col-md-3 mt-3">\
                    <div class="form-group">\
                        <label for="plan_terrace_balcony">Terrace / Balcony ' + l + '</label>\
                        <select name="plan_terrace_balcony[]" required id="plan_terrace_balcony" class="custom-select">\
                            <option id="">Terrace / Balcony</option>\
                            <option value="Terrace">Terrace</option>\
                            <option value="Balcony">Balcony</option>\
                            <option value="-">-</option>\
                        </select>\
                    </div>\
                </div>\
                <div class="col-md-12"><hr></div>\
            </div>\
        ');
    });

    $(document).on('click', '.btn_remove_property_floor_plan', function() {
        var button_id = $(this).attr("id");
        $('#property_floor_plan_row' + button_id + '').remove();
    });

    $("#property_add").submit(function(e) {
        e.preventDefault();
        $("#add_property_button").empty();
        $("#add_property_button").append('<i class="bx bxs-error-circle"></i>');
        document.getElementById("add_property_button").disabled = true;

        var formData = new FormData(this);
        var encodedIframe = encodeURIComponent(formData.get('prop_iframe'));

        formData.set('prop_iframe', encodedIframe);

        $.ajax({
            url: '{{ route('admin.property.store') }}',
            enctype: 'multipart/form-data',
            data: formData,
            type: 'POST',
            contentType: false,
            processData: false,
            success: (res) => {
                // console.log(res);
                swal({
                    title: "Property Added!",
                    text: "Property Has Been Added Succesfully!",
                    icon: "success",
                    button: "Ok",
                });
                $("#add_property_button").empty();
                $("#add_property_button").append('Add Property');
                document.getElementById("add_property_button").disabled = false;
                $("#property_add")[0].reset();
            },
            error: (res) => {
                console.log(res);
            }
        });
    });
</script>

</html>
