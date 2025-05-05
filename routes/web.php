<?php

use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\WarehouseController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::controller(LoginRegisterController::class)->group(function() {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::post('/logout', 'logout')->name('logout');
});

Route::controller(WarehouseController::class)->group(function() {
    Route::get('/warehouse', 'index')->name('index');
    Route::get('/warehouse/add', 'add')->name('add');
    Route::post('/warehouse/add_proses', 'add_proses')->name('add_proses');
    Route::delete('/warehouse/destroy/{id}', 'destroy')->name('destroy');
    Route::get('/warehouse/edit/{id}', 'edit')->name('warehouse_edit');
    Route::put('/warehouse/update/{id}', 'update')->name('warehouse_update_proses');
});
Route::controller(BarangController::class)->group(function() {
    Route::get('/barang', 'index')->name('index');
    Route::get('/barang/add', 'add')->name('add');
    Route::post('/barang/add_proses', 'add_proses')->name('barang_add_proses');
    Route::delete('/barang/destroy/{id}', 'destroy')->name('destroy');
    Route::get('/barang/edit/{id}', 'edit')->name('barang_edit');
    Route::put('/barang/update/{id}', 'update')->name('barang_update_proses');
});

Route::controller(SalesController::class)->group(function() {
    Route::get('/sales', 'index')->name('index');
    Route::get('/sales/add', 'add')->name('add');
    Route::post('/sales/add_proses', 'add_proses')->name('sales_add_proses');
    Route::delete('/sales/destroy/{id}', 'destroy')->name('destroy');
    Route::get('/sales/edit/{id}', 'edit')->name('sales_edit');
    Route::put('/sales/update/{id}', 'update')->name('sales_update_proses');
});

// $routes->group('decoration', function ($routes) {
//     $routes->get('/', 'DecorationController::index');
//     $routes->get('show/fetch', 'DecorationController::pricelist_fetch');
//     $routes->get('show/detail/(:num)', 'DecorationController::pricelist_detail/$1');
//     $routes->get('show/pdf/(:num)', 'DecorationController::cetak_pdf_display/$1');
//     $routes->get('show/cetak/(:num)', 'DecorationController::cetak_pdf/$1');
//     $routes->get('galeri/fetch/(:any)', 'DecorationController::galeri_fetch/$1');
// });
