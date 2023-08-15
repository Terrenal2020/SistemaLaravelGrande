<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\AlmacenesController;
use App\Http\Controllers\ProveedoresController;
use  App\Http\Controllers\CategoriaProductosController;
use  App\Http\Controllers\InventarioController;
use  App\Http\Controllers\VentasController;
use App\Models\Almacenes;
use App\Http\Livewire\SearchProducts;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//validacion de usuarios
//para iniciar sesion////////////////////////
//Route::post( 'Inicio', 'UsuariosController@inicioSesion' )->name( 'sesionUsuarioNuevo' );
Route::post('Inicio', [UsuariosController::class, 'inicioSesion'])->name('sesionUsuarioNuevo');

//registro de emleados
Route::get('/registro', 'App\Http\Controllers\EmpleadosController@getRegistro')->name('getRegistro');
//listado de usuarios
Route::get('/listarUsuarios', 'App\Http\Controllers\EmpleadosController@index')->name('getMostrarUsuarios');
//eliminar
Route::delete('/eliminarEmpleado/{id}','App\Http\Controllers\EmpleadosController@destroy')->name('eliminarEmpleado');

//guardar usuarios y empleados
Route::post('guardar', [EmpleadosController::class, 'store'])->name('guardar');

//metodos para mstrar almacenes
Route::get('/listarAlmacenes', 'App\Http\Controllers\AlmacenesController@index')->name('getMostrarAlmacenes');
//eliminar a un almacen por id
Route::delete('/eliminarAlmacen/{id}','App\Http\Controllers\AlmacenesController@destroy')->name('eliminarAlmacen');
//mostrar nuevamentemenu
Route::get('/mostrarMenu', 'App\Http\Controllers\AlmacenesController@getMostrar')->name('getMostrar');
//registro de almacenes
Route::get('/registroAlmacenes', 'App\Http\Controllers\AlmacenesController@getRegistro')->name('getRegistroAlmacenes');
//guardar almacenes
Route::post('guardarAlmacenes', [AlmacenesController::class, 'store'])->name('guardarAlmacenes');
//busqueda
Route::post('/busquedaAlmacenes',[AlmacenesController::class,'busquedaAlmacenes'])->name('buquedaAlmacenes');
//regresar refrescar
Route::match(['get', 'post'], '/refrescarAlmacen', [AlmacenesController::class, 'refrescarAlmacen'])->name('refrescarAlmacen');

//editar a los almacenenes
//ruta para editar los proyectos
Route::get('/editar/{id}', 'App\Http\Controllers\AlmacenesController@edit')->name('getEditarAlmacenes');
//modificar
Route::put('/modificarAlmacenes/{id}', [AlmacenesController::class, 'update'])->name('modificarAlmacenes');





//proveedores mostrar
Route::get('/listarProveedores', 'App\Http\Controllers\ProveedoresController@index')->name('getMostrarProveedores');
//eliminar proveedor
Route::delete('/eliminarProveedores/{id}', 'App\Http\Controllers\ProveedoresController@destroy')->name('eliminarProveedores');
//mostrar registroprove
Route::get('/registroproveedores', 'App\Http\Controllers\ProveedoresController@getRegistro')->name('getRegistroProveedores');
//guaradar
Route::post('guardarProveedores', [ProveedoresController::class, 'store'])->name('guardarProveedores');
//busqueda
Route::post('/busquedaProveedores',[ProveedoresController::class,'busquedaProveedores'])->name('busquedaProveedores');
//refrescar
Route::match(['get', 'post'], '/refrescarProveedores', [ProveedoresController::class, 'refrescarProveedores'])->name('refrescarProveedores');
//editar
Route::get('/editarProveedores/{id}', 'App\Http\Controllers\ProveedoresController@editarProveedores')->name('getEditarProveedores');
//modificar
Route::put('/modificarProveedores/{id}', [ProveedoresController::class, 'update'])->name('modificarProveedores');


//categoria de productos
Route::get('/listarCategorias', 'App\Http\Controllers\CategoriaProductosController@index')->name('getMostrarCategorias');
//eliminar
Route::delete('/eliminarCategoria/{id}', 'App\Http\Controllers\CategoriaProductosController@destroy')->name('eliminarCategoria');
//mostrar registros
Route::get('/registrocategorias', 'App\Http\Controllers\CategoriaProductosController@getRegistro')->name('getRegistroCategorias');
//guardar
Route::post('guardarCategorias', [CategoriaProductosController::class, 'store'])->name('guardarCategoria');
//busqueda de categorias
Route::post('/busquedaCategorias',[CategoriaProductosController::class,'busquedaCategorias'])->name('busquedaCategorias');
//regresar refrescar
Route::match(['get', 'post'], '/refrescar', [CategoriaProductosController::class, 'refrescar'])->name('refrescar');
//editar
Route::get('/editarCategoria/{id}', 'App\Http\Controllers\CategoriaProductosController@editarCategoria')->name('getEditarCategoria');
//modificar
Route::put('/modificarCategoria/{id}', [CategoriaProductosController::class, 'update'])->name('modificarCategoria');


//inventario
Route::get('/listarInventario', 'App\Http\Controllers\InventarioController@index')->name('getMostrarInventario');
//visa de registro

Route::get('/registroInventario', 'App\Http\Controllers\InventarioController@getRegistroInventario')->name('getRegistroInventario');

//registro de inentario
Route::post('guardarInventario',[InventarioController::class,'store'])->name('guardarInventario');
//eliminar
Route::delete('/eliminar/{id}', 'App\Http\Controllers\InventarioController@destroy')->name('eliminar');
//busqueda de categorias
Route::post('/busquedaInventario',[InventarioController::class,'busquedaInventario'])->name('busquedaInventario');

//refrescar
Route::match(['get', 'post'], '/refrescarInventario', [InventarioController::class, 'refrescarInventario'])->name('refrescarInventario');
Route::get('/editarInventario/{id}', 'App\Http\Controllers\InventarioController@editarInventario')->name('getEditarInventario');
//modificar
Route::put('/modificarInventario/{id}', [InventarioController::class, 'update'])->name('modificarInventario');
//buscar prdductps para venta

Route::post('/buscar-producto',[InventarioController::class,'buscarProducto'])->name('buscarProducto');
//buscar prdductps para venta;


//POOS
Route::get('/getMostrarPoos', 'App\Http\Controllers\VentasController@getMostrarPoos')->name('getMostrarPoos');

//Route::delete('/eliminarVenta/{id}', 'VentasController@eliminarVenta')->name('eliminarVenta');

Route::delete('/eliminarVenta/{id}', 'App\Http\Controllers\VentasController@destroy')->name('eliminarVenta');

Route::post('cancelarVenta',[VentasController::class,'cancelar'])->name('cancelarVenta');

Route::post('confirmarVenta',[VentasController::class,'confirmarVenta'])->name('confirmarVenta');
Route::post('/actualizarInventario',[VentasController::class,'actualizarInventario'])->name('actualizarInventario');

//Route::post('/actualizar-inventario', 'VentasController@actualizarInventario')->name('actualizarInventario');
Route::get('aumentar',[VentasController::class,'aumentar'])->name('aumentar');
Route::get('disminuir',[VentasController::class,'disminuir'])->name('disminuir');


Route::post('/buscar-productos', [VentasController::class, 'buscarProductos'])->name('buscarProductos');
Route::get('/search-products', SearchProducts::class);





//
