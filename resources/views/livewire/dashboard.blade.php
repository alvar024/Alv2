@section('title',__('Dashboard'))
<div >
  <div class="container-fluid">
    <div class="page-header min-height-200 border-radius-xl mt-4"
            style="background-image: url('../assets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
            <span class="mask bg-gradient-primary opacity-6"></span>
        </div>

    <div class="row">
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card shadow-blur blur mx-4 mt-n6 mr-1">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-sm mb-0 text-capitalize font-weight-bold">@lang('Usuarios Registrados')</p>
                  <h5 class="font-weight-bolder mb-0">
                    {{ countUser()==null?'':countUser() }}
                  </h5>
                </div>
              </div>
              <div class="col-4 text-end">
                <a href="{{ route('users.index') }}">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-user-run text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card shadow-blur blur mx-4 mt-n6 mr-1">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-sm mb-0 text-capitalize font-weight-bold">@lang('Videos')</p>
                  <h5 class="font-weight-bolder mb-0">
                    {{ countVideos()==null? '':countVideos() }}
                    {{-- <span class="text-success text-sm font-weight-bolder">+3%</span> --}}
                  </h5>
                </div>
              </div>
              <div class="col-4 text-end">
                <a href="{{ route('videos.index') }}">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-button-play text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card shadow-blur blur mx-4 mt-n6 mr-1">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-sm mb-0 text-capitalize font-weight-bold">@lang('Estudiantes')</p>
                  <h5 class="font-weight-bolder mb-0">
                    {{ countEstudiantes()==null?'':countEstudiantes() }}
                  </h5>
                </div>
              </div>
              <div class="col-4 text-end">
                <a href="{{ route('estudiantes.index') }}">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6">
        <div class="card shadow-blur blur mx-4 mt-n6 mr-1">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-8">
                <div class="numbers">
                  <p class="text-sm mb-0 text-capitalize font-weight-bold">@lang('Profesor')</p>
                  <h5 class="font-weight-bolder mb-0">
                    {{ countProfesores()==null?'':countProfesores() }}
                  </h5>
                </div>
              </div>
              <div class="col-4 text-end">
                <a href="{{ route('profesores.index') }}">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
        <div class="col-12 mt-4">
            <div class="card mb-4">
                <div class="card-header pb-0 p-3">
                    <h6 class="mb-1">@lang('Previw Video')</h6>
                    <p class="text-sm">@lang('Videos recientes')</p>
                </div>
                <div class="card-body p-3">
                    <div class="row">
                        @foreach(PreviewVideos() as $item)
                        <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                            <div class="card card-blog card-plain">
                                <div class="position-relative">
                                    <a class="d-block shadow-xl border-radius-xl">
                                        <img src="{{ url($item->img_preview) }}" alt="img-blur-shadow"
                                            class="img-fluid shadow border-radius-xl">
                                    </a>
                                </div>
                                <div class="card-body px-1 pb-0">
                                    <p class="text-gradient text-dark mb-2 text-sm">@lang('Video') #{{ $item->id }}</p>
                                    <a href="javascript:;">
                                        <h5>
                                            {{ $item->title }}
                                        </h5>
                                    </a>
                                    <p class="mb-4 text-sm">
                                        {{ short_string($item->description,20) }}
                                    </p>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <a href="{{ url('videos/create?id='.$item->id) }}" type="button" class="btn btn-outline-primary btn-sm mb-0">@lang('View Video')</a>
                                        <div class="avatar-group mt-2">
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                title="Elena Morison">
                                                <img alt="Image placeholder" src="../assets/img/team-1.jpg">
                                            </a>
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Ryan Milly">
                                                <img alt="Image placeholder" src="../assets/img/team-2.jpg">
                                            </a>
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Nick Daniel">
                                                <img alt="Image placeholder" src="../assets/img/team-3.jpg">
                                            </a>
                                            <a href="javascript:;" class="avatar avatar-xs rounded-circle"
                                                data-bs-toggle="tooltip" data-bs-placement="bottom" title="Peterson">
                                                <img alt="Image placeholder" src="../assets/img/team-4.jpg">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="col-xl-3 col-md-6 mb-xl-0 mb-4">
                            <div class="card h-100 card-plain border">
                                <div class="card-body d-flex flex-column justify-content-center text-center">
                                    <a href="{{ url('videos/create') }}">
                                        <i class="fa fa-plus text-secondary mb-3"></i>
                                        <h5 class=" text-secondary"> @lang('New video') </h5>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    <div class="row mt-4">
      <div class="col-lg-5">
        <div class="card h-100 p-3">
          <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100" style="background-image: url('../assets/img/ivancik.jpg');">
            <span class="mask bg-gradient-dark"></span>
            <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
              <h5 class="text-white font-weight-bolder mb-4 pt-2">Work with the rockets</h5>
              <p class="text-white">Wealth creation is an evolutionarily recent positive-sum game. It is all about who take the opportunity first.</p>
              <a class="text-white text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="javascript:;">
                Read More
                <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-7">
        <div class="card">
          <div class="card-header pb-0">
            <h6>@lang('Usuarios activos')</h6>
            <p class="text-sm">
              <i class="fa fa-arrow-up text-success"></i>
            </p>
          </div>
          <div class="card-body p-3">
            <div class="chart">
              <canvas id="chart-line" class="chart-canvas" height="300px"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <div class="row mt-4">
      <div class="col-lg-7 mb-lg-0 mb-4">
        <div class="card">
          <div class="card-body p-3">
            <div class="row">
              <div class="col-lg-6">
                <div class="d-flex flex-column h-100">
                  <p class="mb-1 pt-2 text-bold">Built by developers</p>
                  <h5 class="font-weight-bolder">Soft UI Dashboard</h5>
                  <p class="mb-5">From colors, cards, typography to complex elements, you will find the full documentation.</p>
                  <a class="text-body text-sm font-weight-bold mb-0 icon-move-right mt-auto" href="javascript:;">
                    Read More
                    <i class="fas fa-arrow-right text-sm ms-1" aria-hidden="true"></i>
                  </a>
                </div>
              </div>
              <div class="col-lg-5 ms-auto text-center mt-5 mt-lg-0">
                <div class="bg-gradient-warning border-radius-lg h-100">
                  <img src="../assets/img/shapes/waves-white.svg" class="position-absolute h-100 w-50 top-0 d-lg-block d-none" alt="waves">
                  <div class="position-relative d-flex align-items-center justify-content-center h-100">
                    <img class="w-100 position-relative z-index-2 pt-4" src="/assets/img/illustrations/warning-rocket.png">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-5 mb-lg-0 mb-4">
        <div class="card">
          <div class="card-body p-3">
            <div class="bg-gradient-dark border-radius-lg py-3 pe-1 mb-3">
              <div class="chart">
                <canvas id="chart-bars" class="chart-canvas" height="170px"></canvas>
              </div>
            </div>
            <h6 class="ms-2 mt-4 mb-0"> @lang('Videos') </h6>
            <div class="container border-radius-lg">
              <div class="row">
                <div class="col-3 py-3 ps-0">
                  <div class="d-flex mb-2">
                    <div class="icon icon-shape icon-xxs shadow border-radius-sm bg-gradient-primary text-center me-2 d-flex align-items-center justify-content-center">
                      <svg width="10px" height="10px" viewBox="0 0 40 44" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                        <title>document</title>
                        <g id="Basic-Elements" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                          <g id="Rounded-Icons" transform="translate(-1870.000000, -591.000000)" fill="#FFFFFF" fill-rule="nonzero">
                            <g id="Icons-with-opacity" transform="translate(1716.000000, 291.000000)">
                              <g id="document" transform="translate(154.000000, 300.000000)">
                                <path class="color-background" d="M40,40 L36.3636364,40 L36.3636364,3.63636364 L5.45454545,3.63636364 L5.45454545,0 L38.1818182,0 C39.1854545,0 40,0.814545455 40,1.81818182 L40,40 Z" id="Path" opacity="0.603585379"></path>
                                <path class="color-background" d="M30.9090909,7.27272727 L1.81818182,7.27272727 C0.814545455,7.27272727 0,8.08727273 0,9.09090909 L0,41.8181818 C0,42.8218182 0.814545455,43.6363636 1.81818182,43.6363636 L30.9090909,43.6363636 C31.9127273,43.6363636 32.7272727,42.8218182 32.7272727,41.8181818 L32.7272727,9.09090909 C32.7272727,8.08727273 31.9127273,7.27272727 30.9090909,7.27272727 Z M18.1818182,34.5454545 L7.27272727,34.5454545 L7.27272727,30.9090909 L18.1818182,30.9090909 L18.1818182,34.5454545 Z M25.4545455,27.2727273 L7.27272727,27.2727273 L7.27272727,23.6363636 L25.4545455,23.6363636 L25.4545455,27.2727273 Z M25.4545455,20 L7.27272727,20 L7.27272727,16.3636364 L25.4545455,16.3636364 L25.4545455,20 Z" id="Shape"></path>
                              </g>
                            </g>
                          </g>
                        </g>
                      </svg>
                    </div>
                    <p class="text-xs mt-1 mb-0 font-weight-bold">@lang('Total')</p>
                  </div>
                  <h4 class="font-weight-bolder">{{ countVideos() }}</h4>
                  <div class="progress w-75">
                    <div class="progress-bar bg-dark w-60" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

  <!--   Core JS Files   -->
  <script src="/assets/js/plugins/chartjs.min.js"></script>
  <script src="/assets/js/plugins/Chart.extension.js"></script>
  <script>
    var ctx = document.getElementById("chart-bars").getContext("2d");

    new Chart(ctx, {
      type: "bar",
      data: {
        labels: ["Ene","Feb","Mar","Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Sales",
          tension: 0.4,
          borderWidth: 0,
          pointRadius: 0,
          backgroundColor: "#fff",
          data: [{{ chartVideo(1) }},{{ chartVideo(2) }},{{ chartVideo(3) }},{{ chartVideo(4) }}, {{ chartVideo(5) }}, {{ chartVideo(6) }}, {{ chartVideo(7) }},{{ chartVideo(8) }},{{ chartVideo(9) }}, {{ chartVideo(10) }},{{ chartVideo(11) }},{{ chartVideo(12) }}],
          maxBarThickness: 6
        }, ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        legend: {
          display: false,
        },
        tooltips: {
          enabled: true,
          mode: "index",
          intersect: false,
        },
        scales: {
          yAxes: [{
            gridLines: {
              display: false,
            },
            ticks: {
              suggestedMin: 0,
              suggestedMax: {{ countVideos() }},
              beginAtZero: true,
              padding: 0,
              fontSize: 14,
              lineHeight: 3,
              fontColor: "#fff",
              fontStyle: 'normal',
              fontFamily: "Open Sans",
            },
          }, ],
          xAxes: [{
            gridLines: {
              display: false,
            },
            ticks: {
              display: false,
              padding: 20,
            },
          }, ],
        },
      },
    });

    var ctx2 = document.getElementById("chart-line").getContext("2d");

    var gradientStroke1 = ctx2.createLinearGradient(0, 230, 0, 50);

    gradientStroke1.addColorStop(1, 'rgba(253,235,173,0.4)');
    gradientStroke1.addColorStop(0.2, 'rgba(245,57,57,0.0)');
    gradientStroke1.addColorStop(0, 'rgba(255,214,61,0)'); //purple colors

    var gradientStroke2 = ctx2.createLinearGradient(0, 230, 0, 50);

    gradientStroke2.addColorStop(1, 'rgba(20,23,39,0.4)');
    gradientStroke2.addColorStop(0.2, 'rgba(245,57,57,0.0)');
    gradientStroke2.addColorStop(0, 'rgba(255,214,61,0)'); //purple colors


    new Chart(ctx2, {
      type: "line",
      data: {
        labels: ["Ene","Feb","Mar","Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
            label: "{{ __('Usuarios') }}",
            tension: 0.4,
            borderWidth: 0,
            pointRadius: 0,
            borderColor: "#fbcf33",
            borderWidth: 3,
            backgroundColor: gradientStroke1,
            data: [{{ chart(1) }},{{ chart(2) }},{{ chart(3) }},{{ chart(4) }}, {{ chart(5) }}, {{ chart(6) }}, {{ chart(7) }},{{ chart(8) }},{{ chart(9) }}, {{ chart(10) }},{{ chart(11) }},{{ chart(12) }}],
            maxBarThickness: 6

          },
          // {
          //   label: "{{ __('Profesores') }}",
          //   tension: 0.4,
          //   borderWidth: 0,
          //   pointRadius: 0,
          //   borderColor: "#f53939",
          //   borderWidth: 3,
          //   backgroundColor: gradientStroke2,
          //   data: [100,20,400,30, 90, 40, 140, 290, 290, 340, 230, 400],
          //   maxBarThickness: 6

          // },
        ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        legend: {
          display: false,
        },
        tooltips: {
          enabled: true,
          mode: "index",
          intersect: false,
        },
        scales: {
          yAxes: [{
            gridLines: {
              borderDash: [2],
              borderDashOffset: [2],
              color: '#dee2e6',
              zeroLineColor: '#dee2e6',
              zeroLineWidth: 1,
              zeroLineBorderDash: [2],
              drawBorder: false,
            },
            ticks: {
              suggestedMin: 0,
              suggestedMax: 500,
              beginAtZero: true,
              padding: 10,
              fontSize: 11,
              fontColor: '#adb5bd',
              lineHeight: 3,
              fontStyle: 'normal',
              fontFamily: "Open Sans",
            },
          }, ],
          xAxes: [{
            gridLines: {
              zeroLineColor: 'rgba(0,0,0,0)',
              display: false,
            },
            ticks: {
              padding: 10,
              fontSize: 11,
              fontColor: '#adb5bd',
              lineHeight: 3,
              fontStyle: 'normal',
              fontFamily: "Open Sans",
            },
          }, ],
        },
      },
    });
  </script>
