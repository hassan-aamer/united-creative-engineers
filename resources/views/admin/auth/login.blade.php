<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>{{ __('attributes.login') }} | {{ setting('name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="icon" href="{{ asset('web/images/logo.png') }}?v={{ time() }}" type="image/png" />

    <!-- App css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css"
        id="bs-default-stylesheet" />
    <link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-default-stylesheet" />

    <link href="{{ asset('assets/css/bootstrap-dark.min.css') }}" rel="stylesheet" type="text/css"
        id="bs-dark-stylesheet" disabled />
    <link href="{{ asset('assets/css/app-dark.min.css') }}" rel="stylesheet" type="text/css" id="app-dark-stylesheet"
        disabled />

    <!-- icons -->
    <link href="{{ asset('web/images/logo.png') }}" rel="stylesheet" type="text/css" />

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
                                    {{-- <div class="mx-auto">
                                        <a href="index.html">
                                            <img src="{{asset('web/images/logo.png')}}" alt="{{ setting('name') }}" width="100" height="50" />
                                        </a>
                                    </div> --}}

                                    <form method="POST" action="{{ route('admin.login') }}"
                                        class="authentication-form">
                                        @csrf
                                        <div class="mb-3">
                                            <label class="form-label">{{ __('attributes.email') }}</label>
                                            <div class="input-group">
                                                <span class="input-group-text">
                                                    <i class="icon-dual" data-feather="mail"></i>
                                                </span>
                                                <input type="email" autofocus class="form-control" name="email"
                                                    id="email" placeholder="{{ __('attributes.enter_email') }}"
                                                    value="{{ old('email') }}">
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">{{ __('attributes.password') }}</label>
                                            {{-- <a href="pages-recoverpw.html"
                                                class="float-end text-muted text-unline-dashed ms-1">Forgot your
                                                password?</a> --}}
                                            <div class="input-group">
                                                <span class="input-group-text">
                                                    <i class="icon-dual" data-feather="lock"></i>
                                                </span>
                                                <input type="password" class="form-control" name="password"
                                                    id="password" placeholder="{{ __('attributes.enter_password') }}">
                                            </div>
                                        </div>

                                        <div class="mb-3">
                                            <div class="form-check">
                                                <input type="checkbox" name="remember" class="form-check-input"
                                                    id="checkbox-signin" checked>
                                                <label class="form-check-label"
                                                    for="checkbox-signin">{{ __('attributes.RememberMe') }}</label>
                                            </div>
                                        </div>

                                        <div class="mb-3 text-center d-grid">
                                            <button class="btn btn-primary"
                                                type="submit">{{ __('attributes.login') }}</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-lg-6 d-none d-md-inline-block">
                                    <img src="{{ asset('web/images/logo.png') }}" alt="{{ setting('name') }}"
                                        width="500" height="350" />
                                </div>
                            </div>
                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->
                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    <!-- Vendor js -->
    <script src="{{ asset('assets/js/vendor.min.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('assets/js/app.min.js') }}"></script>

</body>

</html>
