<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Metas -->
    <link rel="apple-touch-icon" sizes="76x76" href="{{ url('/assets/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ url('/assets/img/favicon.png') }}">
    <title>{{ env('APP_NAME') }} @yield('title')</title>
    <!-- Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <!-- Nucleo Icons -->
    <link href="{{ url('/assets/css/nucleo-icons.css') }}" rel="stylesheet" />
    <link href="{{ url('/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <link href="{{ url('/assets/css/nucleo-svg.css') }}" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="{{ url('/assets/css/soft-ui-dashboard.css') }}" rel="stylesheet" />
    <!-- Alpine -->
    <script src="{{ asset('/assets/alpine.min.js') }}" defer></script>
    @livewireStyles
    @stack('style')
</head>

<body class="g-sidenav-show bg-gray-100">
    <main x-data="main()">
    @auth()
        {{-- If the user is authenticated on the static sign up or the sign up page --}}
        @if (in_array(request()->route()->getName(),['static-sign-up', 'sign-up'],))
            @include('layouts.navbars.guest.sign-up')
            @yield('content')
            @include('layouts.footers.guest.with-socials')
            {{-- If the user is authenticated on the static sign in or the login page --}}
        @elseif (in_array(request()->route()->getName(),['sign-in', 'login'],))
            @include('layouts.navbars.guest.login')
            @yield('content')
            @include('layouts.footers.guest.description')
        @elseif (in_array(request()->route()->getName(),['profile', 'my-profile'],))
            @include('layouts.navbars.auth.sidebar')
            <div class="main-content position-relative bg-gray-100">
                @include('layouts.navbars.auth.nav-profile')
                <div>
                    @yield('content')
                    @include('layouts.footers.auth.footer')
                </div>
            </div>
            
        @else
            @include('layouts.navbars.auth.sidebar')
            @include('layouts.navbars.auth.nav')
            
            @yield('content')
            <main>
                <div class="container-fluid">
                    <div class="row">
                        @include('layouts.footers.auth.footer')
                    </div>
                </div>
            </main>
        @endif
    @endauth

    {{-- If the user is not authenticated (if the user is a guest) --}}
    @guest
        {{-- If the user is on the login page --}}
        @if (!auth()->check() && in_array(request()->route()->getName(),['login'],))
            @include('layouts.navbars.guest.login')
            <main class="main-content">
                <div class="container-fluid mr-5 p-5 py-4">
                    <div class="container">
                        @yield('content')
                    </div>
                </div>
            </main>
            <div class="mt-5">
                @include('layouts.footers.guest.with-socials')
            </div>

            {{-- If the user is on the sign up page --}}
        @elseif (!auth()->check() && in_array(request()->route()->getName(),['sign-up'],))
            <div>
                @include('layouts.navbars.guest.sign-up')
                @yield('content')
                @include('layouts.footers.guest.with-socials')
            </div>
        @endif
    @endguest
    </main>



    <!--   Core JS Files   -->
    <script src="{{ url('assets/js/core/popper.min.js') }}"></script>
    <script src="{{ url('assets/js/core/bootstrap.min.js') }}"></script>
    <script src="{{ url('assets/js/plugins/smooth-scrollbar.min.js') }}"></script>
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
    @livewireScripts
    @stack('scripts')
    <script>
        function main() {
            return {
                open: true,

            };
        }

    </script>
</body>

</html>
