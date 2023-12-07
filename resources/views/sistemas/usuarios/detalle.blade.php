@extends('layout/app')

@section('content')
    <div class="pagetitle">
        <h1>Detalle de Usuario</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Inicio</a></li>
                <li class="breadcrumb-item">Tablas</li>
                <li class="breadcrumb-item active">Lista de Usuarios</li>
                <li class="breadcrumb-item active">Detalle de Usuario</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"></h5>
                        <div class="d-grid gap-2 mt-3">
                            <a type="button" class="btn btn-primary" href="{{ route('formularioUsuario') }}">Agregar Usuario</a>
                        </div>

                        
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">N°</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Tipo de Usuario</th>
                                    <th scope="col">Funciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                        <th scope="row">{{ $usuario->id }}</th>
                                        <td>{{ $usuario->name }}</td>
                                        <td>{{ $usuario->email }}</td>
                                        <td>{{ $usuario->nombre_tipo_usuario }}</td>
                                        <td>
                                            <a href="{{ route('editarUsuario', ['id' => $usuario->id]) }}"><button
                                                class="btn btn-warning">Editar</button></a>&nbsp;
                                        </td>
                                </tr>
                            </tbody>
                        </table>
                        
                        <a href="{{ route('listaUsuarios') }}" class="btn btn-secondary rounded-pill" type="button">Ir a lista</a>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
