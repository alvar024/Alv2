<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('landing/assets/img/logo-ct-dark.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('landing/assets/img/logo-ct-dark.png') }}">
  <title>{{ env('APP_NAME') }}</title>
  <!--     Fonts and icons     -->
  <link href="{{ asset('landing/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
  <link href="{{ asset('landing/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="{{ asset('landing/assets/css/material-kit.css') }}" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css" integrity="sha512-Cv93isQdFwaKBV+Z4X8kaVBYWHST58Xb/jVOcV9aRsGSArZsgAnFIhMpDoMDcFNoUtday1hdjn0nGp3+KZyyFw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="offline-doc">
  <!-- Navbar -->
  @include('Landing.layouts.nav')

  <header class="header-2">
  <div class="page-header min-vh-75 relative" style="background-image: url({{ asset('landing/assets/img/bg2.jpg') }})">
    <span class="mask bg-gradient-primary opacity-4"></span>
    <div class="container">
      <div class="row">
        <div class="col-lg-7 text-center mx-auto">
          <h1 class="text-white pt-3 mt-n5">{{ env('APP_NAME') }}</h1>
          {{-- <p class="lead text-white mt-3">Free & Open Source Web UI Kit built over Bootstrap 5. <br/> Join over 1.6 million developers around the world. </p> --}}
        </div>
      </div>
    </div>
  </div>
</header>
  <!-- End Navbar -->
  <div class="card card-body blur shadow-blur mx-3 mx-md-4 mt-n6">
    @yield('content')
  </div>
  @include('Landing.layouts.footer')


  <!--   Core JS Files   -->
  <script src="{{ asset('landing/assets/js/plugins/countup.min.js') }}"></script>
  <script src="{{ asset('landing/assets/js/plugins/choices.min.js') }}"></script>
  <script src="{{ asset('landing/assets/js/plugins/prism.min.js') }}"></script>
  <script src="{{ asset('landing/assets/js/plugins/highlight.min.js') }}"></script>
  <!--  Plugin for Parallax, full documentation here: https://github.com/dixonandmoe/rellax -->
  <script src="{{ asset('landing/assets/js/plugins/rellax.min.js') }}"></script>
  <!--  Plugin for TiltJS, full documentation here: https://gijsroge.github.io/tilt.js/ -->
  <script src="{{ asset('landing/assets/js/plugins/tilt.min.js') }}"></script>
  <!--  Plugin for Selectpicker - ChoicesJS, full documentation here: https://github.com/jshjohnson/Choices -->
  <script src="{{ asset('landing/assets/js/plugins/choices.min.js') }}"></script>
  <!--  Plugin for Parallax, full documentation here: https://github.com/wagerfield/parallax  -->
  <script src="{{ asset('landing/assets/js/plugins/parallax.min.js') }}"></script>


  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDTTfWur0PDbZWPr7Pmq8K3jiDp0_xUziI"></script>
  <script src="{{ asset('landing/assets/js/material-kit.min.js') }}" type="text/javascript"></script>

  <script src="{{ asset('landing/assets/js/core/popper.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('landing/assets/js/core/bootstrap.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('landing/assets/js/plugins/perfect-scrollbar.min.js') }}"></script>
  <!--  Plugin for Parallax, full documentation here: https://github.com/wagerfield/parallax  -->
  @yield('js')

</body>

</html>