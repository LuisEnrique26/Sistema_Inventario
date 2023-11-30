<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>SoftServe Labs - Sistema de Inventario</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <link href="{{ asset('img/logotipo_empresa.png') }}" rel="icon">
    <link href="{{ asset('img/logotipo_empresa.png') }}" rel="apple-touch-icon">

    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/simple-datatables/style.css') }}" rel="stylesheet">

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <script src="{{ asset('js/jquery-3.7.1.min.js') }}"></script>
</head>

<body>

    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="#" class="logo d-flex align-items-center">
                <img src="3" alt="">
                <span class="d-none d-lg-block">Sistema de Gestión de Inventarios</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div>



        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li>

                <li class="nav-item dropdown pe-3">

                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                        data-bs-toggle="dropdown">
                        <img src="{{ asset('img/usuario.png') }}" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2">
                        </span>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{ route('login') }}">
                                <i class="bi bi-person"></i>
                                <span>Iniciar Sesión</span>
                            </a>
                        </li>

                    </ul>
                </li>

            </ul>
        </nav>

    </header>

    <div class="container-flex">

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
                                        <img src="{{ asset('img/higienicos.jpg') }}" class="d-block w-100"
                                            alt="..." height="500px" width="300px">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{ asset('img/product-1.jpg') }}" class="d-block w-100"
                                            alt="..." height="650px" width="300px">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{ asset('img/product-2.jpg') }}" class="d-block w-100"
                                            alt="..." height="650px">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{ asset('img/product-3.jpg') }}" class="d-block w-100"
                                            alt="..." height="650px">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{ asset('img/product-4.jpg') }}" class="d-block w-100"
                                            alt="..." height="650px">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="{{ asset('img/product-5.jpg') }}" class="d-block w-100"
                                            alt="..." height="650px">
                                    </div>
                                </div>

                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Anterior</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselExampleFade" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Siguiente</span>
                                </button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Copyright <strong><span>SoftServe Labs</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            Diseñado por <a href="">Softserve Labs</a>
        </div>
    </footer>

    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <script src="{{ asset('vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('vendor/quill/quill.min.js') }}"></script>
    <script src="{{ asset('vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('vendor/php-email-form/validate.js') }}"></script>

    <script src="{{ asset('js/main.js') }}"></script>

</body>

</html>
