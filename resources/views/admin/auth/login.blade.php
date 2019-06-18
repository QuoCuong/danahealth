<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500"
        rel="stylesheet" />
    <link href="https://cdn.materialdesignicons.com/3.0.39/css/materialdesignicons.min.css" rel="stylesheet" />

    <!-- PLUGINS CSS STYLE -->
    <link href="assets/plugins/toaster/toastr.min.css" rel="stylesheet" />
    <link href="assets/plugins/nprogress/nprogress.css" rel="stylesheet" />
    <link href="assets/plugins/flag-icons/css/flag-icon.min.css" rel="stylesheet" />
    <link href="assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" />
    <link href="assets/plugins/ladda/ladda.min.css" rel="stylesheet" />
    <link href="assets/plugins/select2/css/select2.min.css" rel="stylesheet" />
    <link href="assets/plugins/daterangepicker/daterangepicker.css" rel="stylesheet" />

    <!-- SLEEK CSS -->
    <link id="sleek-css" rel="stylesheet" href="assets/css/sleek.css" />

    <!-- FAVICON -->
    <link href="/images/favicon.png" rel="shortcut icon" />

    <script src="assets/plugins/nprogress/nprogress.js"></script>
</head>

<body class="bg-light-gray" id="body">
    <div class="container d-flex flex-column justify-content-between vh-100">
        <div class="row justify-content-center mt-5">
            <div class="col-xl-5 col-lg-6 col-md-10">
                <div class="card">
                    <div class="card-header bg-primary">
                        <div class="app-brand">
                            <a href="{{ route('admin.dashboard') }}">
                                <img src="/images/favicon.png" alt="" style="width: 30px;">
                                <span class="brand-name">DanaHealth Dashboard</span>
                            </a>
                        </div>
                    </div>
                    <div class="card-body p-5">

                        <h4 class="text-dark mb-5">{{ __('labels.signin') }}</h4>
                        <form method="POST" action="{{ route('admin.login') }}" autocomplete="off">
                            @csrf
                            <div class="row">
                                <div class="col-md-12 mb-4">
                                    <input type="username" name="username" class="form-control input-lg @error('username')is-invalid @enderror" id="username"
                                        aria-describedby="emailHelp" placeholder="{{ __('labels.username') }}">
                                    <div class="invalid-feedback">
                                        {{ $errors->first('username') }}
                                    </div>
                                </div>
                                <div class="col-md-12 ">
                                    <input type="password" name="password" class="form-control input-lg @error('username')is-invalid @enderror" id="password"
                                        placeholder="{{ __('labels.password') }}">
                                    <div class="invalid-feedback">
                                        {{ $errors->first('password') }}
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="d-flex my-2 justify-content-between">
                                        <div class="d-inline-block mr-3">
                                            <label class="control control-checkbox">{{ __('labels.remember') }}
                                                <input type="checkbox" name="remember" />
                                                <div class="control-indicator"></div>
                                            </label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-lg btn-primary btn-block mb-4">{{ __('labels.signin') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright pl-0">
            <p class="text-center">&copy; 2018 Copyright Sleek Dashboard Bootstrap Template by
                <a class="text-primary" href="http://www.iamabdus.com/" target="_blank">Abdus</a>.
            </p>
        </div>
    </div>
</body>

</html>
