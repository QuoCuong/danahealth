<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Fonts -->
    {{-- <link rel="dns-prefetch" href="//fonts.gstatic.com"> --}}
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css"> --}}

    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

    <!-- GOOGLE FONTS -->
    <!-- FONTS and ICONS -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500|Poppins:400,500,600,700|Roboto:400,500"
        rel="stylesheet" />
    <link href="https://cdn.materialdesignicons.com/3.0.39/css/materialdesignicons.min.css" rel="stylesheet" />

    <!-- PLUGINS CSS STYLE -->
    <link href="{{ asset('admin/assets/plugins/toaster/toastr.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/assets/plugins/nprogress/nprogress.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/assets/plugins/flag-icons/css/flag-icon.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/assets/plugins/ladda/ladda.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/assets/plugins/daterangepicker/daterangepicker.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/assets/plugins/jquery-fancybox/jquery.fancybox.min.css') }}" rel="stylesheet" />

    <!-- SLEEK CSS -->
    <link id="sleek-css" rel="stylesheet" href="{{ asset('admin/assets/css/sleek.css') }}" />
    <link rel="stylesheet" href="{{ asset('admin/assets/css/mystyle.css') }}" />
    @yield('css')

    <!-- FAVICON -->
    <link href="{{ asset('images/favicon.png') }}" rel="shortcut icon" />

    <script src="{{ asset('admin/assets/plugins/nprogress/nprogress.js') }}"></script>
    <script>
        const numberFormat = (value) => new Intl.NumberFormat('vi-IN', {
            style: 'currency',
            currency: 'VND'
        }).format(value);
    </script>
</head>

<body class="sidebar-fixed sidebar-dark header-light header-fixed @yield('sidebar')" id="body">
    <script>
        NProgress.configure({ showSpinner: false });
        NProgress.start();
    </script>

    <div class="mobile-sticky-body-overlay"></div>

    <div class="wrapper">
        <!--
            ====================================
            ——— LEFT SIDEBAR WITH FOOTER
            =====================================
        -->
        @include('admin.layouts.partials.sidebar')

        <div class="page-wrapper">
            <!-- Header -->
            @include('admin.layouts.partials.header')

            @yield('content')

            @include('admin.layouts.partials.footer')
        </div>
    </div>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDCn8TFXGg17HAUcNpkwtxxyT9Io9B_NcM" defer>
    </script>
    <script src="{{ asset('admin/assets/plugins/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/toaster/toastr.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/slimscrollbar/jquery.slimscroll.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/charts/Chart.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/ladda/spin.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/ladda/ladda.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/jquery-mask-input/jquery.mask.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/jvectormap/jquery-jvectormap-world-mill.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/jekyll-search.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/jquery-fancybox/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/sleek.js') }}"></script>
    <script src="{{ asset('admin/assets/js/chart.js') }}"></script>
    <script src="{{ asset('admin/assets/js/date-range.js') }}"></script>
    <script src="{{ asset('admin/assets/js/map.js') }}"></script>
    <script src="{{ asset('admin/assets/js/custom.js') }}"></script>
    <script src="{{ asset('admin/assets/js/actions.js') }}"></script>
    <script>
        toastr.options = {
            closeButton: true,
            debug: false,
            newestOnTop: false,
            progressBar: true,
            positionClass: 'toast-top-right',
            preventDuplicates: false,
            onclick: null,
            showDuration: "300",
            hideDuration: "1000",
            timeOut: "5000",
            extendedTimeOut: "1000",
            showEasing: "swing",
            hideEasing: "linear",
            showMethod: "fadeIn",
            hideMethod: "fadeOut"
        };
    </script>
    @include('admin.notify')
    @yield('js')
</body>

</html>
