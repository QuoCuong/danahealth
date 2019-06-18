<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Dana Health</title>
    <!-- =====  SEO MATE  ===== -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="distribution" content="global">
    <meta name="revisit-after" content="2 Days">
    <meta name="robots" content="ALL">
    <meta name="rating" content="8 YEARS">
    <meta name="Language" content="en-us">
    <meta name="GOOGLEBOT" content="NOARCHIVE">
    <!-- =====  MOBILE SPECIFICATION  ===== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="viewport" content="width=device-width">
    <!-- =====  CSS  ===== -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/magnific-popup.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/owl.carousel.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/progress-stepbar.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/order-prescription.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.fancybox.min.css') }}" />

    <link rel="shortcut icon" href="{{ asset('images/favicon.png') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/apple-touch-icon.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('images/apple-touch-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('images/apple-touch-icon-114x114.png') }}">

    <script type="text/javascript">
        window.Laravel = {!!
            json_encode([
                'baseUrl' => url('/'),
                'csrfToken' => csrf_token(),
            ])
        !!};
    </script>
</head>
<body>
    <div class="loder"></div>
    <div id="app"></div>

    <script src="{{ asset('js/jQuery_v3.1.1.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.magnific-popup.js') }}"></script>
    <script src="{{ asset('js/jquery.firstVisitPopup.js') }}"></script>
    <script src="{{ asset('js/jquery.fancybox.min.js') }}"></script>
    <script src="https://unpkg.com/ionicons@4.5.5/dist/ionicons.js"></script>
    <script src="{{ asset('js/custom.js') }}"></script>

    <script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
</body>
</html>
