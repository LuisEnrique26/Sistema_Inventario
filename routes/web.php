<?php

use App\Http\Controllers\DueñoVentaController;
use App\Http\Controllers\DueñoEntradaController;
use App\Http\Controllers\DueñoProductoController;
use App\Http\Controllers\DueñoProveedorController;
use App\Http\Controllers\EmpleadoEntradaController;
use App\Http\Controllers\EmpleadoProductoController;
use App\Http\Controllers\EmpleadoVentaController;
use App\Http\Controllers\EntradaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

/*++++++++++++++++++++++++++++++++++++++++++++++++++++SISTEMAS+++++++++++++++++++++++++++++++++++++++++++++++++*/

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


/*++++++++++++++++++++++++++++++++++++++++++++++++++++++++++DUEÑO++++++++++++++++++++++++++++++++++++++++++++++++++*/

/*-------------------------------------------------Proveedores-------------------------------------------------*/
Route::name('dueñolistaProveedores')->get('/dueñolistaProveedores',[DueñoProveedorController::class,'listaProveedores'])->middleware('auth');

Route::name('dueñoformularioProveedor')->get('/dueñoformularioProveedor',[DueñoProveedorController::class,'formularioProveedor'])->middleware('auth');

Route::name('dueñoguardarProveedor')->post('/dueñoguardarProveedor',[DueñoProveedorController::class,'guardarProveedor'])->middleware('auth');

Route::name('dueñoeditarProveedor')->get('/dueñoeditarProveedor/{id}',[DueñoProveedorController::class,'editarProveedor'])->middleware('auth');

Route::name('dueñoactualizarProveedor')->put('/dueñoactualizarProveedor/{id}',[DueñoProveedorController::class,'actualizarProveedor'])->middleware('auth');

Route::name('dueñoeliminarProveedor')->get('/dueñoeliminarProveedor/{id}',[DueñoProveedorController::class,'eliminarProveedor'])->middleware('auth');


/*-------------------------------------------------Productos-------------------------------------------------*/
Route::name('dueñolistaProductos')->get('/dueñolistaProductos',[DueñoProductoController::class,'listaProductos'])->middleware('auth');

Route::name('dueñomostrarProducto')->get('/dueñomostrarProducto/{id}',[DueñoProductoController::class,'mostrarProducto'])->middleware('auth');

Route::name('dueñoformularioProducto')->get('/dueñoformularioProducto',[DueñoProductoController::class,'formularioProducto'])->middleware('auth');

Route::name('dueñoguardarProducto')->post('/dueñoguardarProducto',[DueñoProductoController::class,'guardarProducto'])->middleware('auth');

Route::name('dueñoeditarProducto')->get('/dueñoeditarProducto/{id}',[DueñoProductoController::class,'editarProducto'])->middleware('auth');

Route::name('dueñoactualizarProducto')->put('/dueñoactualizarProducto/{id}',[DueñoProductoController::class,'actualizarProducto'])->middleware('auth');

Route::name('dueñoeliminarProducto')->get('/dueñoeliminarProducto/{id}',[DueñoProductoController::class,'eliminarProducto'])->middleware('auth');


/*-------------------------------------------------Venta-------------------------------------------------*/
Route::name('dueñolistaVentas')->get('/dueñolistaVentas',[DueñoVentaController::class,'listaVentas'])->middleware('auth');

Route::name('dueñomostrarVenta')->get('/dueñomostrarVenta/{id}',[DueñoVentaController::class,'mostrarVenta'])->middleware('auth');

Route::name('dueñoformularioVenta')->get('/dueñoformularioVenta',[DueñoVentaController::class,'formularioVenta'])->middleware('auth');

Route::name('dueñoguardarVenta')->post('/dueñoguardarVenta',[DueñoVentaController::class,'guardarVenta'])->middleware('auth');

Route::name('dueñoeliminarVenta')->get('/dueñoeliminarVenta/{id}/{idV}',[DueñoVentaController::class,'eliminarVenta'])->middleware('auth');

Route::name('dueñoform_Precio_Producto')->get('/dueñoform_Precio_Producto',[DueñoVentaController::class,'form_Precio_Producto'])->middleware('auth');


/*-------------------------------------------------Entradas-------------------------------------------------*/
Route::name('dueñolistaEntradas')->get('/dueñolistaEntradas',[DueñoEntradaController::class,'listaEntradas'])->middleware('auth');

Route::name('dueñomostrarEntrada')->get('/dueñomostrarEntrada/{id}',[DueñoEntradaController::class,'mostrarEntrada'])->middleware('auth');

Route::name('dueñoformularioEntrada')->get('/dueñoformularioEntrada',[DueñoEntradaController::class,'formularioEntrada'])->middleware('auth');

Route::name('dueñoguardarEntrada')->post('/dueñoguardarEntrada',[DueñoEntradaController::class,'guardarEntrada'])->middleware('auth');

Route::name('dueñoeditarEntrada')->get('/dueñoeditarEntrada/{id}',[DueñoEntradaController::class,'editarEntrada'])->middleware('auth');

Route::name('dueñoactualizarEntrada')->put('/dueñoactualizarEntrada/{id}',[DueñoEntradaController::class,'actualizarEntrada'])->middleware('auth');

Route::name('dueñoeliminarEntrada')->get('/dueñoeliminarEntrada/{id}',[DueñoEntradaController::class,'eliminarEntrada'])->middleware('auth');

Route::name('dueñoformProductos')->get('/dueñoformProductos',[DueñoEntradaController::class,'formProductos'])->middleware('auth');


/*+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++EMPLEADO++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/

/*-------------------------------------------------Productos-------------------------------------------------*/
Route::name('empleadolistaProductos')->get('/empleadolistaProductos',[EmpleadoProductoController::class,'listaProductos'])->middleware('auth');

Route::name('empleadomostrarProducto')->get('/empleadomostrarProducto/{id}',[EmpleadoProductoController::class,'mostrarProducto'])->middleware('auth');

Route::name('empleadoformularioProducto')->get('/empleadoformularioProducto',[EmpleadoProductoController::class,'formularioProducto'])->middleware('auth');

Route::name('empleadoguardarProducto')->post('/empleadoguardarProducto',[EmpleadoProductoController::class,'guardarProducto'])->middleware('auth');

Route::name('empleadoeditarProducto')->get('/empleadoeditarProducto/{id}',[EmpleadoProductoController::class,'editarProducto'])->middleware('auth');

Route::name('empleadoactualizarProducto')->put('/empleadoactualizarProducto/{id}',[EmpleadoProductoController::class,'actualizarProducto'])->middleware('auth');

Route::name('empleadoeliminarProducto')->get('/empleadoeliminarProducto/{id}',[EmpleadoProductoController::class,'eliminarProducto'])->middleware('auth');


/*-------------------------------------------------Venta-------------------------------------------------*/
Route::name('empleadolistaVentas')->get('/empleadolistaVentas',[EmpleadoVentaController::class,'listaVentas'])->middleware('auth');

Route::name('empleadomostrarVenta')->get('/empleadomostrarVenta/{id}',[EmpleadoVentaController::class,'mostrarVenta'])->middleware('auth');

Route::name('empleadoformularioVenta')->get('/empleadoformularioVenta',[EmpleadoVentaController::class,'formularioVenta'])->middleware('auth');

Route::name('empleadoguardarVenta')->post('/empleadoguardarVenta',[EmpleadoVentaController::class,'guardarVenta'])->middleware('auth');

Route::name('empleadoeliminarVenta')->get('/empleadoeliminarVenta/{id}/{idV}',[EmpleadoVentaController::class,'eliminarVenta'])->middleware('auth');

Route::name('empleadoform_Precio_Producto')->get('/empleadoform_Precio_Producto',[EmpleadoVentaController::class,'form_Precio_Producto'])->middleware('auth');


/*-------------------------------------------------Entradas-------------------------------------------------*/
Route::name('empleadolistaEntradas')->get('/empleadolistaEntradas',[EmpleadoEntradaController::class,'listaEntradas'])->middleware('auth');

Route::name('empleadomostrarEntrada')->get('/empleadomostrarEntrada/{id}',[EmpleadoEntradaController::class,'mostrarEntrada'])->middleware('auth');

Route::name('empleadoformularioEntrada')->get('/empleadoformularioEntrada',[EmpleadoEntradaController::class,'formularioEntrada'])->middleware('auth');

Route::name('empleadoguardarEntrada')->post('/empleadoguardarEntrada',[EmpleadoEntradaController::class,'guardarEntrada'])->middleware('auth');

Route::name('empleadoeditarEntrada')->get('/empleadoeditarEntrada/{id}',[EmpleadoEntradaController::class,'editarEntrada'])->middleware('auth');

Route::name('empleadoactualizarEntrada')->put('/empleadoactualizarEntrada/{id}',[EmpleadoEntradaController::class,'actualizarEntrada'])->middleware('auth');

Route::name('empleadoeliminarEntrada')->get('/empleadoeliminarEntrada/{id}',[EmpleadoEntradaController::class,'eliminarEntrada'])->middleware('auth');

Route::name('empleadoformProductos')->get('/empleadoformProductos',[EmpleadoEntradaController::class,'formProductos'])->middleware('auth');


/*-------------------------------------------------Login-------------------------------------------------*/
Route::view('/login', "auth.login")->name('login');

Route::view('/registro', "auth.registro")->name('registro');

Route::view('/inicio_dueño', "auth.inicio_dueño")->middleware('auth')->name('inicio_dueño');

Route::view('/inicio_empleado', "auth.inicio_empleado")->middleware('auth')->name('inicio_empleado');

Route::view('/inicio', "auth.inicio")->middleware('auth')->name('inicio');

Route::post('/validar_registro', [LoginController::class, 'register'])->name('validar_registro');

Route::post('/inicia_sesion', [LoginController::class, 'login'])->name('inicia_sesion');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::view('/', "index")->name('index');