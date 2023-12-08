@extends('layout/app_empleado')

@section('content')
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
            <div class="row my-5">

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Administra tus productos</h5>

                            <!-- Slides with captions -->
                            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselExampleCaptions"
                                        data-bs-slide-to="0" class="active" aria-current="true"
                                        aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselExampleCaptions"
                                        data-bs-slide-to="1" aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselExampleCaptions"
                                        data-bs-slide-to="2" aria-label="Slide 3"></button>
                                </div>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="https://i.pinimg.com/originals/97/52/e4/9752e455b0d5106f8c98eda2becdb9bb.jpg" class="d-block w-100" alt="...">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h5></h5>
                                            <p></p>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img src="https://i.pinimg.com/originals/5f/44/c5/5f44c561565d46ef859380fd583c4ff7.jpg" class="d-block w-100" alt="...">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h5></h5>
                                            <p></p>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img src="https://i.pinimg.com/originals/a2/57/bc/a257bcc7e1fe76649128c51d6f557f80.jpg" class="d-block w-100" alt="...">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h5></h5>
                                            <p></p>
                                        </div>
                                    </div>
                                </div>

                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>

                            </div><!-- End Slides with captions -->

                        </div>
                    </div>

                </div>

                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Controla tus entradas y salidas</h5>

                            <!-- Slides with captions -->
                            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselExampleCaptions"
                                        data-bs-slide-to="0" class="active" aria-current="true"
                                        aria-label="Slide 1"></button>
                                    <button type="button" data-bs-target="#carouselExampleCaptions"
                                        data-bs-slide-to="1" aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselExampleCaptions"
                                        data-bs-slide-to="2" aria-label="Slide 3"></button>
                                </div>
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="https://i.pinimg.com/originals/1b/c2/52/1bc252d547e489702df3690a3b447103.png" class="d-block w-100" alt="...">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h5></h5>
                                            <p></p>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img src="https://img.freepik.com/foto-gratis/ventas-cyber-monday-shopping_23-2148688502.jpg" class="d-block w-100" alt="...">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h5></h5>
                                            <p></p>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <img src="https://png.pngtree.com/png-clipart/20200224/original/pngtree-concept-of-e-commerce-sales-online-shopping-digital-marketing-vector-illustration-png-image_5232949.jpg" class="d-block w-100" alt="...">
                                        <div class="carousel-caption d-none d-md-block">
                                            <h5></h5>
                                            <p></p>
                                        </div>
                                    </div>
                                </div>

                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>

                            </div><!-- End Slides with captions -->

                        </div>
                    </div>

                </div>


            </div>
    </section>
</div>

@endsection
