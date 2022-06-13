<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3  bg-white"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="align-items-center d-flex m-0 navbar-brand text-wrap" href="{{ route('dashboard') }}">
            <img src="../assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="...">
            <span class="ms-3 font-weight-bold text-capitalize">{{ Auth::user()->name }}</span>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse w-auto h-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item pb-2">
                <a class="nav-link {{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}"
                    href="{{ route('dashboard') }}">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1rem;" class="material-icons ps-2 pe-2 text-center
                        {{ in_array(request()->route()->getName(),['dashboard']) ? 'text-white' : 'text-dark' }}">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">@lang('Dashboard')</span>
                </a>
            </li>
           {{--  <li class="nav-item mt-2">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Laravel Examples</h6>
            </li> --}}
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'users.index' ? 'active' : '' }}"
                    href="{{ route('users.index') }}">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1rem;" class="material-icons ps-2 pe-2 text-center
                        {{ in_array(request()->route()->getName(),['users.index']) ? 'text-white' : 'text-dark' }}">person</i>
                    </div>
                    <span class="nav-link-text ms-1">@lang('Usuarios')</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'profesores.index' ? 'active' : '' }}"
                    href="{{ route('profesores.index') }}">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1rem;" class="material-icons ps-2 pe-2 text-center
                        {{ in_array(request()->route()->getName(),['profesores.index']) ? 'text-white' : 'text-dark' }}">person</i>
                    </div>
                    <span class="nav-link-text ms-1">@lang('Profesores')</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'estudiantes.index' ? 'active' : '' }}"
                    href="{{ route('estudiantes.index') }}">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1rem;" class="material-icons ps-2 pe-2 text-center
                        {{ in_array(request()->route()->getName(),['estudiantes.index']) ? 'text-white' : 'text-dark' }}">person</i>
                    </div>
                    <span class="nav-link-text ms-1">@lang('Estudiantes')</span>
                </a>
            </li>

            <li class="nav-item pb-2">
                <a class="nav-link {{ Route::currentRouteName() == 'videos.index' ? 'active' : '' }}"
                    href="{{ route('videos.index') }}">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1rem;" class="material-icons ps-2 pe-2 text-center
                        {{ in_array(request()->route()->getName(),['videos.index']) ? 'text-white' : 'text-dark' }}">video_library</i>
                    </div>
                    <span class="nav-link-text ms-1">@lang('Videos')</span>
                </a>
            </li>

            {{-- <li class="nav-item mt-2">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Example pages</h6>
            </li> --}}
            
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'roles.index' ? 'active' : '' }}"
                    href="{{ route('roles.index') }}">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i style="font-size: 1rem;" class="material-icons ps-2 pe-2 text-center
                        {{ in_array(request()->route()->getName(),['roles.index']) ? 'text-white' : 'text-dark' }}">accessibility</i>
                    </div>
                    <span class="nav-link-text ms-1">@lang('Roles')</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'profile' ? 'active' : '' }}"
                    href="{{ route('profile') }}">
                    <div
                        class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <svg width="12px" height="12px" viewBox="0 0 46 42" version="1.1"
                            xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <title>customer-support</title>
                            <g id="Basic-Elements" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="Rounded-Icons" transform="translate(-1717.000000, -291.000000)" fill="#FFFFFF"
                                    fill-rule="nonzero">
                                    <g id="Icons-with-opacity" transform="translate(1716.000000, 291.000000)">
                                        <g id="customer-support" transform="translate(1.000000, 0.000000)">
                                            <path class="color-background"
                                                d="M45,0 L26,0 C25.447,0 25,0.447 25,1 L25,20 C25,20.379 25.214,20.725 25.553,20.895 C25.694,20.965 25.848,21 26,21 C26.212,21 26.424,20.933 26.6,20.8 L34.333,15 L45,15 C45.553,15 46,14.553 46,14 L46,1 C46,0.447 45.553,0 45,0 Z"
                                                id="Path" opacity="0.59858631"></path>
                                            <path class="color-foreground"
                                                d="M22.883,32.86 C20.761,32.012 17.324,31 13,31 C8.676,31 5.239,32.012 3.116,32.86 C1.224,33.619 0,35.438 0,37.494 L0,41 C0,41.553 0.447,42 1,42 L25,42 C25.553,42 26,41.553 26,41 L26,37.494 C26,35.438 24.776,33.619 22.883,32.86 Z"
                                                id="Path"></path>
                                            <path class="color-foreground"
                                                d="M13,28 C17.432,28 21,22.529 21,18 C21,13.589 17.411,10 13,10 C8.589,10 5,13.589 5,18 C5,22.529 8.568,28 13,28 Z"
                                                id="Path"></path>
                                        </g>
                                    </g>
                                </g>
                            </g>
                        </svg>
                    </div>
                    <span class="nav-link-text ms-1">Profile</span>
                </a>
            </li>
        </ul>
    </div>
    {{-- <div class="sidenav-footer mx-3 mt-0 pt-0">
        <div class="card card-background shadow-none card-background-mask-secondary" id="sidenavCard">
            <div class="full-background" style="background-image: url('../assets/img/curved-images/white-curved.jpeg')">
            </div>
            <div class="card-body text-left p-3 w-100">
                <div
                    class="icon icon-shape icon-sm bg-white shadow text-center mb-3 d-flex align-items-center justify-content-center border-radius-md">
                    <i class="ni ni-diamond text-dark text-gradient text-lg top-0" aria-hidden="true"
                        id="sidenavCardIcon"></i>
                </div>
                <div class="docs-info">
                    <h6 class="text-white up mb-0">Need help?</h6>
                    <p class="text-xs font-weight-bold">Please check our docs</p>
                    <a href="/documentation/bootstrap/overview/soft-ui-dashboard/index.html" target="_blank"
                        class="btn btn-white btn-sm w-100 mb-0">Documentation</a>
                </div>
            </div>
        </div>
    </div> --}}
</aside>
