<div class="container position-sticky z-index-sticky top-0">
  <div class="row">
    <div class="col-12">
    <nav class="navbar navbar-expand-lg  blur border-radius-xl top-0 z-index-fixed shadow position-absolute my-3 py-2 start-0 end-0 mx-4">
      <div class="container-fluid px-0">
        <a class="navbar-brand font-weight-bolder ms-sm-3" href="#" rel="tooltip" title="Designed and Coded by Creative Tim" data-placement="bottom" target="_blank">
          {{ env('APP_NAME') }}
        </a>
        <button class="navbar-toggler shadow-none ms-2" type="button" data-bs-toggle="collapse" data-bs-target="#navigation" aria-controls="navigation" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon mt-2">
            <span class="navbar-toggler-bar bar1"></span>
            <span class="navbar-toggler-bar bar2"></span>
            <span class="navbar-toggler-bar bar3"></span>
          </span>
        </button>
        <div class="collapse navbar-collapse pt-3 pb-2 py-lg-0 w-100" id="navigation">
          <ul class="navbar-nav navbar-nav-hover ms-auto">
            <li class="nav-item my-auto ms-3 ms-lg-0">
              <a href="{{ route('login') }}" class="btn btn-sm bg-gradient-primary mb-0 me-1 mt-2 mt-md-0"> @lang('Iniciar') / @lang('Registrar')</a>
            </li>
            <li class="nav-item my-auto ms-3 ms-lg-0" title="@lang('Idioma')">
              <a class="btn btn-sm bg-gradient-primary mb-0 me-1 mt-2 mt-md-0 text-gray-700" data-bs-toggle="modal" data-bs-target="#modalIdioma">
                <i class="material-icons md-24" style="font-size:12px;">language</i>
                <span class=" d-none flag-icon flag-icon-{{ app()->getLocale() === 'en' ? 'us':app()->getLocale()  }}">
                </span>
            </a>

            </li>
          </ul>
        </div>
      </div>
    </nav>
    </div>
  </div>
</div> 
<div class="modal fade" tabindex="-1" id="modalIdioma" aria-labelledby="modalIdiomaLabel" aria-hidden="true" >
  <div class="modal-dialog modal-dialog-centered modal-lg" >
      <div class="modal-content">
          <div class="modal-header">
              <h4>
                  <i style="font-size:1.2rem;" class="material-icons md-24">language</i>@lang('Idioma')
              </h4>
              <a type="button" title="Close" class="close-app" data-bs-dismiss="modal" style="font-size:.6rem;">X</a>
          </div>
          <div class="modal-body container-fluid">
            <div class="row">
              <div class="col mb-4 mt-3 pr-0 pl-0 mr-0 ml-1">
                <a class="button-app up" title="EN" href="{{ route('change-language','en') }}"><span class="flag-icon flag-icon-us mr-6"></span>@lang('Ingles')</a>
              </div>
              <div class="col mb-4 mt-3 pr-0 pl-0 mr-0 ml-1">
                <a class="button-app up" title="ES" href="{{ route('change-language','es') }}"><span class="flag-icon flag-icon-es mr-6"></span>@lang('Español')</a>
              </div>
            </div>
          </div>
      </div>
  </div>
</div>