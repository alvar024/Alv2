@extends('Landing.layouts.app')
@section('content')
<section class="pt-3 pb-4" id="count-stats">
  <div class="container">
    <div class="row">
      <div class="col-lg-9 mx-auto py-3">
        <div class="row">
          <div class="col-md-4 position-relative">
            <div class="p-3 text-center">
              <h1 class="text-gradient text-primary"><span id="state1" countTo="{{ countVideos() }}">0</span>+</h1>
              <h5 class="mt-3">@lang('Tutoriales')</h5>
              <p class="text-sm font-weight-normal">@lang('Videos tutoriales para reforzar el aprendisaje de nuestro estudiantes')</p>
            </div>
            <hr class="vertical dark">
          </div>
          <div class="col-md-4 position-relative">
            <div class="p-3 text-center">
              <h1 class="text-gradient text-primary"> <span id="state2" countTo="{{ countEstudiantes() }}">0</span>+</h1>
              <h5 class="mt-3">@lang('Estudiantes')</h5>
              <p class="text-sm font-weight-normal">@lang('Estudiantes registrados en nuetra plataforma Alv2')</p>
            </div>
            <hr class="vertical dark">
          </div>
          <div class="col-md-4">
            <div class="p-3 text-center">
              <h1 class="text-gradient text-primary"><span id="state3" countTo="{{ countProfesores() }}">0</span>+</h1>
              <h5 class="mt-3">@lang('Profesores')</h5>
              <p class="text-sm font-weight-normal">@lang('Profesores dispuesto para emitir y reforzar el aprendisae de los estudiantes')</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="my-5 py-5">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-4 ms-auto me-auto p-lg-4 mt-lg-0 mt-4">
        <div class="rotating-card-container">
          <div class="card card-rotate card-background card-background-mask-primary shadow-primary mt-md-0 mt-5">
            <div class="front front-background" style="background-image: url({{asset('landing/assets/img/app-bg.png')}}); background-size: cover;">
              <div class="card-body py-7 text-center">
                <i class="material-icons text-white text-4xl my-3">touch_app</i>
                <h3 class="text-white"> @lang('Alv2') </h3>
                <p class="text-white opacity-8">@lang('Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab mollitia, vitae magnam minus repellat maxime, excepturi. Officiis, expedita! Fugit dolores soluta cupiditate veniam impedit. Quis tempora similique distinctio. Commodi, perspiciatis!').</p>
              </div>
            </div>
            <div class="back back-background" style="background-image: url({{asset('landing/assets/img/app-bg.jpg')}}); background-size: cover;">
              <div class="card-body pt-7 text-center">
                <h3 class="text-white">@lang('Alv2')</h3>
                <p class="text-white opacity-8"> @lang('You will save a lot of time going from prototyping to full-functional code because all elements are implemented').</p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 ms-auto">
        <div class="row justify-content-start">
          <div class="col-md-6">
            <div class="info">
              <i class="material-icons text-gradient text-primary text-3xl">content_copy</i>
              <h5 class="font-weight-bolder mt-3">@lang('Documentación')</h5>
              <p class="pe-5">@lang('Deleniti rerum ex, qui magni alias fugit tempore obcaecati atque ducimus').</p> Dolore reprehenderit eveniet praesentium ratione, corporis,.
            </div>
          </div>
          <div class="col-md-6">
            <div class="info">
              <i class="material-icons text-gradient text-primary text-3xl">flip_to_front</i>
              <h5 class="font-weight-bolder mt-3">@lang('Categorias')</h5>
              <p class="pe-3">@lang('The world’s most popular front-end open source toolkit, featuring Sass variables and mixins').</p>
            </div>
          </div>
        </div>
        <div class="row justify-content-start mt-5">
          <div class="col-md-6 mt-3">
            <i class="material-icons text-gradient text-primary text-3xl">price_change</i>
            <h5 class="font-weight-bolder mt-3">@lang('Aprende Gratis')</h5>
            <p class="pe-5">@lang('Creating your design from scratch with dedicated designers can be very expensive. Start with our Design System').</p>
          </div>
          <div class="col-md-6 mt-3">
            <div class="info">
              <i class="material-icons text-gradient text-primary text-3xl">devices</i>
              <h5 class="font-weight-bolder mt-3">@lang('Aprende a distancia')</h5>
              <p class="pe-3">@lang('Regardless of the screen size, the website content will naturally fit the given resolution').</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="py-sm-7" id="download-soft-ui">
  <div class="bg-gradient-dark position-relative m-3 border-radius-xl overflow-hidden">
    <img src="{{ asset('landing/assets/img/shapes/waves-white.svg') }}" alt="pattern-lines" class="position-absolute start-0 top-md-0 w-100 opacity-2">
    <div class="container py-7 postion-relative z-index-2 position-relative">
      <div class="row">
        <div class="col-md-7 mx-auto text-center">
          <h3 class="text-white">@lang('¿Quieres aprender con nosotros mas sobre la plataforma de Moodle?')</h3>
          <p class="text-white mb-5">@lang('Motivate a reforzar tus conocimientos en nuestra plataforma, registrate, empieza a ver el contenido y a aprender junto nuestro equipo!')</p>
        </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
    <hr class="horizontal dark my-5">
    <div class="row">
      <div class="col-lg-2 col-md-4 col-6 ms-auto">
        <img class="w-100 opacity-6" src="{{ asset('landing/assets/img/logos/gray-logos/logo-apple.svg') }}" alt="Logo">
      </div>
      <div class="col-lg-2 col-md-4 col-6">
        <img class="w-100 opacity-6" src="{{ asset('landing/assets/img/logos/gray-logos/logo-facebook.svg') }}" alt="Logo">
      </div>
      <div class="col-lg-2 col-md-4 col-6">
        <img class="w-100 opacity-6" src="{{ asset('landing/assets/img/logos/gray-logos/logo-nasa.svg') }}" alt="Logo">
      </div>
      <div class="col-lg-2 col-md-4 col-6 ms-lg-0 ms-md-auto">
        <img class="w-100 opacity-6" src="{{ asset('landing/assets/img/logos/gray-logos/logo-vodafone.svg') }}" alt="Logo">
      </div>
      <div class="col-lg-2 col-md-4 col-6 me-md-auto mx-md-0 mx-auto">
        <img class="w-100 opacity-6" src="{{ asset('landing/assets/img/logos/gray-logos/logo-digitalocean.svg') }}" alt="Logo">
      </div>
    </div>
  </div>
  
</section>


@endsection

@section('js')
<script type="text/javascript">

  if (document.getElementById('state1')) {
    const countUp = new CountUp('state1', document.getElementById("state1").getAttribute("countTo"));
    if (!countUp.error) {
      countUp.start();
    } else {
      console.error(countUp.error);
    }
  }
  if (document.getElementById('state2')) {
    const countUp1 = new CountUp('state2', document.getElementById("state2").getAttribute("countTo"));
    if (!countUp1.error) {
      countUp1.start();
    } else {
      console.error(countUp1.error);
    }
  }
  if (document.getElementById('state3')) {
    const countUp2 = new CountUp('state3', document.getElementById("state3").getAttribute("countTo"));
    if (!countUp2.error) {
      countUp2.start();
    } else {
      console.error(countUp2.error);
    };
  }
</script>
@endsection