<?php

use App\Http\Controllers\EntradaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

/*-------------------------------------------------Usuarios-------------------------------------------------*/
Route::name('listaUsuarios')->get('/listaUsuarios',[UsuarioController::class,'listaUsuarios'])->middleware('auth');

Route::name('mostrarUsuario')->get('/mostrarUsuario/{id}',[UsuarioController::class,'mostrarUsuario'])->middleware('auth');

Route::name('formularioUsuario')->get('/formularioUsuario',[UsuarioController::class,'formularioUsuario'])->middleware('auth');

Route::name('guardarUsuario')->post('/guardarUsuario',[UsuarioController::class,'guardarUsuario'])->middleware('auth');

Route::name('editarUsuario')->get('/editarUsuario/{id}',[UsuarioController::class,'editarUsuario'])->middleware('auth');

Route::name('actualizarUsuario')->put('/actualizarUsuario/{id}',[UsuarioController::class,'actualizarUsuario'])->middleware('auth');

Route::name('eliminarUsuario')->get('/eliminarUsuario/{id}',[UsuarioController::class,'eliminarUsuario'])->middleware('auth');


/*-------------------------------------------------Proveedores-------------------------------------------------*/
Route::name('listaProveedores')->get('/listaProveedores',[ProveedorController::class,'listaProveedores'])->middleware('auth');

Route::name('formularioProveedor')->get('/formularioProveedor',[ProveedorController::class,'formularioProveedor'])->middleware('auth');

Route::name('guardarProveedor')->post('/guardarProveedor',[ProveedorController::class,'guardarProveedor'])->middleware('auth');

Route::name('editarProveedor')->get('/editarProveedor/{id}',[ProveedorController::class,'editarProveedor'])->middleware('auth');

Route::name('actualizarProveedor')->put('/actualizarProveedor/{id}',[ProveedorController::class,'actualizarProveedor'])->middleware('auth');

Route::name('eliminarProveedor')->get('/eliminarProveedor/{id}',[ProveedorController::class,'eliminarProveedor'])->middleware('auth');


/*-------------------------------------------------Productos-------------------------------------------------*/
Route::name('listaProductos')->get('/listaProductos',[ProductoController::class,'listaProductos'])->middleware('auth');

Route::name('mostrarProducto')->get('/mostrarProducto/{id}',[ProductoController::class,'mostrarProducto'])->middleware('auth');

Route::name('formularioProducto')->get('/formularioProducto',[ProductoController::class,'formularioProducto'])->middleware('auth');

Route::name('guardarProducto')->post('/guardarProducto',[ProductoController::class,'guardarProducto'])->middleware('auth');

Route::name('editarProducto')->get('/editarProducto/{id}',[ProductoController::class,'editarProducto'])->middleware('auth');

Route::name('actualizarProducto')->put('/actualizarProducto/{id}',[ProductoController::class,'actualizarProducto'])->middleware('auth');

Route::name('eliminarProducto')->get('/eliminarProducto/{id}',[ProductoController::class,'eliminarProducto'])->middleware('auth');


/*-------------------------------------------------Venta-------------------------------------------------*/
Route::name('listaVentas')->get('/listaVentas',[VentaController::class,'listaVentas'])->middleware('auth');

Route::name('mostrarVenta')->get('/mostrarVenta/{id}',[VentaController::class,'mostrarVenta'])->middleware('auth');

Route::name('formularioVenta')->get('/formularioVenta',[VentaController::class,'formularioVenta'])->middleware('auth');

Route::name('guardarVenta')->post('/guardarVenta',[VentaController::class,'guardarVenta'])->middleware('auth');

Route::name('eliminarVenta')->get('/eliminarVenta/{id}/{idV}',[VentaController::class,'eliminarVenta'])->middleware('auth');

Route::name('form_Precio_Producto')->get('/form_Precio_Producto',[VentaController::class,'form_Precio_Producto'])->middleware('auth');


/*-------------------------------------------------Entradas-------------------------------------------------*/
Route::name('listaEntradas')->get('/listaEntradas',[EntradaController::class,'listaEntradas'])->middleware('auth');

Route::name('mostrarEntrada')->get('/mostrarEntrada/{id}',[EntradaController::class,'mostrarEntrada'])->middleware('auth');

Route::name('formularioEntrada')->get('/formularioEntrada',[EntradaController::class,'formularioEntrada'])->middleware('auth');

Route::name('guardarEntrada')->post('/guardarEntrada',[EntradaController::class,'guardarEntrada'])->middleware('auth');

Route::name('editarEntrada')->get('/editarEntrada/{id}',[EntradaController::class,'editarEntrada'])->middleware('auth');

Route::name('actualizarEntrada')->put('/actualizarEntrada/{id}',[EntradaController::class,'actualizarEntrada'])->middleware('auth');

Route::name('eliminarEntrada')->get('/eliminarEntrada/{id}',[EntradaController::class,'eliminarEntrada'])->middleware('auth');

Route::name('formProductos')->get('/formProductos',[EntradaController::class,'formProductos'])->middleware('auth');


/*-------------------------------------------------Login-------------------------------------------------*/
Route::view('/', "auth.login")->name('login');

Route::view('/registro', "auth.registro")->name('registro');

Route::view('/inicio', "auth.inicio")->middleware('auth')->name('inicio');

Route::post('/validar_registro', [LoginController::class, 'register'])->name('validar_registro');

Route::post('/inicia_sesion', [LoginController::class, 'login'])->name('inicia_sesion');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::view('/index', "index")->name('index');