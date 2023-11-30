  @extends('layout/app')

  @section('content')
      <div class="pagetitle">
          <h1>Inicio</h1>
          <nav>
              <ol class="breadcrumb">
                  <li class="breadcrumb-item active">Inicio</li>
              </ol>
          </nav>
      </div>

      <section class="section dashboard">
          <div class="container">
              <div class="row">
                  <div class="card">
                      <div class="card-body">
                          <h5 class="card-title">Gestión de tus productos</h5>
                          <p>Administra entradas y salidas de tus productos.</p>


                          <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                              <div class="carousel-inner">
                                  <div class="carousel-item active">
                                      <img src="{{ asset('img/higienicos.jpg') }}" class="d-block w-100" alt="..."
                                          height="500px" width="300px">
                                  </div>
                                  <div class="carousel-item">
                                      <img src="{{ asset('img/product-1.jpg') }}" class="d-block w-100" alt="..."
                                          height="650px" width="300px">
                                  </div>
                                  <div class="carousel-item">
                                      <img src="{{ asset('img/product-2.jpg') }}" class="d-block w-100" alt="..."
                                          height="650px">
                                  </div>
                                  <div class="carousel-item">
                                      <img src="{{ asset('img/product-3.jpg') }}" class="d-block w-100" alt="..."
                                          height="650px">
                                  </div>
                                  <div class="carousel-item">
                                      <img src="{{ asset('img/product-4.jpg') }}" class="d-block w-100" alt="..."
                                          height="650px">
                                  </div>
                                  <div class="carousel-item">
                                      <img src="{{ asset('img/product-5.jpg') }}" class="d-block w-100" alt="..."
                                          height="650px">
                                  </div>
                              </div>

                              <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade"
                                  data-bs-slide="prev">
                                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                  <span class="visually-hidden">Anterior</span>
                              </button>
                              <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade"
                                  data-bs-slide="next">
                                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                  <span class="visually-hidden">Siguiente</span>
                              </button>

                          </div><!-- End Slides with fade transition -->
                      </div>
                  </div>
              </div>
          </div>
      </section>

      <section class="section dashboard">
          <div class="container">
              <div class="row">

                  <div class="col-12">
                      <div class="card">

                          <div class="card-body">
                              <h5 class="card-title">Ventas <span>/Hoy</span></h5>

                              <!-- Line Chart -->
                              <div id="reportsChart"></div>

                              <script>
                                  document.addEventListener("DOMContentLoaded", () => {
                                      new ApexCharts(document.querySelector("#reportsChart"), {
                                          series: [{
                                              name: 'Ventas',
                                              data: [31, 40, 28, 51, 42, 82, 56],
                                          }, {
                                              name: 'Ganancias',
                                              data: [11, 32, 45, 32, 34, 52, 41]
                                          }, {
                                              name: 'Clientes',
                                              data: [15, 11, 32, 18, 9, 24, 11]
                                          }],
                                          chart: {
                                              height: 350,
                                              type: 'area',
                                              toolbar: {
                                                  show: false
                                              },
                                          },
                                          markers: {
                                              size: 4
                                          },
                                          colors: ['#4154f1', '#2eca6a', '#ff771d'],
                                          fill: {
                                              type: "gradient",
                                              gradient: {
                                                  shadeIntensity: 1,
                                                  opacityFrom: 0.3,
                                                  opacityTo: 0.4,
                                                  stops: [0, 90, 100]
                                              }
                                          },
                                          dataLabels: {
                                              enabled: false
                                          },
                                          stroke: {
                                              curve: 'smooth',
                                              width: 2
                                          },
                                          xaxis: {
                                              type: 'datetime',
                                              categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z",
                                                  "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z",
                                                  "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z",
                                                  "2018-09-19T06:30:00.000Z"
                                              ]
                                          },
                                          tooltip: {
                                              x: {
                                                  format: 'dd/MM/yy HH:mm'
                                              },
                                          }
                                      }).render();
                                  });
                              </script>
                              <!-- End Line Chart -->

                          </div>

                      </div>
                  </div><!-- End Reports -->

              </div>
          </div>
      </section>
  @endsection
