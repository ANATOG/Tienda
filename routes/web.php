<?php

use Illuminate\Support\Facades\Route;

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

    return view('principal');
});
Route::resource('categoria', 'CategoriaController'); 
Route::resource('cliente', 'ClienteController'); 
Route::resource('proveedor', 'ProveedorController'); 
Route::resource('sucursal', 'SucursalController');  
Route::resource('producto', 'ProductoController'); 
Route::resource('vencido', 'VencidoController'); 
Route::resource('compra', 'CompraController'); 
Route::resource('venta', 'VentaController'); 
Route::get('selectProducto/{id}','ProductoController@selectProducto');
Route::resource('reporte', 'ReporteController');
Route::get('/pdf', 'ReporteController@pdf')->name('pdf');
Route::get('/pdfventa/{id}', 'VentaController@pdf')->name('pdfventa');
Route::get('/pdfcompra/{id}', 'CompraController@pdf')->name('pdfcompra');
