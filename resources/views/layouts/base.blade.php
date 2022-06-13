<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Metas -->
    <link rel="apple-touch-icon" sizes="76x76" href="{{ url('/assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ url('/assets/img/favicon.png') }}">
    <title>{{env('APP_NAME')}}</title>
    <!-- Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <!-- Nucleo Icons -->
    <link href="{{ url('/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ url('/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="{{ url('/assets/kit_fontawesome.js') }}" crossorigin="anonymous"></script>
    <link href="{{ url('/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ url('/assets/css/soft-ui-dashboard.css?v=1') }}" rel="stylesheet" />
    <!-- Alpine -->
    <script src="{{ url('assets/alpine.min.js') }}" defer></script>
    @livewireStyles
    @stack('style')
</head>

<body class="g-sidenav-show bg-gray-100">

    {{ $slot }}

    <!--   Core JS Files   -->
    <script src="assets/js/core/popper.min.js"></script>
    <script src="assets/js/core/bootstrap.min.js"></script>
    <script src="assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }

    </script>
    <!-- Github buttons -->
    <script async defer src="{{ url('assets/buttons.js') }}"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{ url('assets/js/soft-ui-dashboard.js') }}"></script>
    @stack('scripts')
    @livewireScripts
</body>

</html>
