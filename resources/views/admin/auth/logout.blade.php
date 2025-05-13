<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Logout</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App css -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" id="bs-default-stylesheet" />
    <link href="{{asset('assets/css/app.min.css')}}" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

    <link href="{{asset('assets/css/bootstrap-dark.min.css')}}" rel="stylesheet" type="text/css" id="bs-dark-stylesheet" disabled />
    <link href="{{asset('assets/css/app-dark.min.css')}}" rel="stylesheet" type="text/css" id="app-dark-stylesheet" disabled />

    <!-- icons -->
    <link href="{{asset('assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />

</head>

<body class="authentication-bg">

    <div class="account-pages my-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="row g-0">
                                <div class="col-lg-6 p-4">
                                    <div class="text-center">
                                        <div class="mx-auto">
                                            <a href="index.html">
                                                <img src="assets/images/logo-dark.png" alt="" height="24" />
                                            </a>
                                        </div>
                                        <div class="mt-4">
                                            <div class="logout-checkmark">
                                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 130.2 130.2">
                                                    <circle class="path circle" fill="none" stroke="#4bd396"
                                                        stroke-width="6" stroke-miterlimit="10" cx="65.1"
                                                        cy="65.1" r="62.1" />
                                                    <polyline class="path check" fill="none" stroke="#4bd396"
                                                        stroke-width="6" stroke-linecap="round" stroke-miterlimit="10"
                                                        points="100.2,40.2 51.5,88.8 29.8,67.5 " />
                                                </svg>
                                            </div>
                                        </div>
                                        <h4 class="h4 mb-0 mt-2">See you again !</h4>
                                        <p class="text-muted mt-1 mb-2">
                                            You are now successfully sign out.
                                        </p>
                                    </div>
                                </div>
                                <div class="col-lg-6 d-none d-md-inline-block">
                                    <div class="auth-page-sidebar">
                                        <div class="overlay"></div>
                                        <div class="auth-user-testimonial">
                                            <p class="fs-24 fw-bold text-white mb-1">I simply love it!</p>
                                            <p class="lead">"It's a elegent templete. I love it very much!"</p>
                                            <p>- Admin User</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <p class="text-muted">Back to <a href="{{ route('login.page' , app()->getLocale()) }}"
                                    class="text-primary fw-bold ms-1">Sign In</a></p>
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    <!-- Vendor js -->
    <script src="{{asset('assets/js/vendor.min.js')}}"></script>

    <!-- App js -->
    <script src="{{asset('assets/js/app.min.js')}}"></script>

</body>

</html>
