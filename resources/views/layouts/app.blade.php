<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Department Of Probation</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ url('assets/media/image/favicon.png') }}" />

    <!-- Main css -->
    <link rel="stylesheet" href="{{ url('vendors/bundle.css') }}" type="text/css">

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    @yield('head')

    <!-- App css -->
    <link rel="stylesheet" href="{{ url('assets/css/app.min.css') }}" type="text/css">


    {{-- crsf token --}}
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
{{-- class="scrollable-layout" --}}

<body class="scrollable-layout"  >
    <!-- Preloader -->
    <div class="preloader">
        <div class="preloader-icon"></div>
        <span>Loading...</span>
    </div>
    <!-- ./ Preloader -->



    <!-- Layout wrapper -->
    <div class="layout-wrapper">

        <!-- Header -->
        @include('includes.header')
        <!-- ./ Header -->

        <!-- Content wrapper -->
        <div class="content-wrapper">
            <!-- begin::navigation -->
            @include('includes.sidenav')
            <!-- end::navigation -->

            <!-- Content body -->
            <div class="content-body">
                <!-- Content -->
                <div class="content @yield('parentClassName')">
                    @yield('content')
                </div>
                <!-- ./ Content -->

                <!-- Footer -->
                @include('includes.footer')
                <!-- ./ Footer -->
            </div>
            <!-- ./ Content body -->
        </div>
        <!-- ./ Content wrapper -->
    </div>
    <!-- ./ Layout wrapper -->

    {{-- change password model --}}
    <div class="modal fade" id="changePasswordModel" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="settingsAddModalTitle">Change Password</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i class="ti-close"></i>
                    </button>
                </div>

                <div class="modal-body" id="settingsAddModalBody">
                    <form class="needs-validation" id="changePasswordForm" autocomplete="off">
                        <div class="form-row">
                            <div class="col-md-12 mb-2">
                                <label for="txtName">Current Password</label>
                                <input type="password" class="form-control" id="old_password" name="old_password" >
                            </div>
                            <div class="col-md-12 mb-2">
                                <label for="txtName">New Password</label>
                                <input type="password" class="form-control" id="password" name="password" >
                            </div>
                            <div class="col-md-12 mb-2">
                                <label for="txtName">Confirm New Password</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" >
                            </div>

                        </div>
                    </form>

                </div>
                <div class="modal-footer">
                    <button id="btnChangePassword" onclick="changePassword()" class="btn btn-primary" type="button">Save</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>



    <!-- Main scripts -->
    <script src="{{ url('vendors/bundle.js') }}"></script>

    @yield('script')

    <!-- App scripts -->
    <script src="{{ url('assets/js/app.min.js') }}"></script>
    <script src="{{ url('assets/js/custom/changePassword.js') }}?random=<?php echo uniqid(); ?>"></script>

</body>

</html>
