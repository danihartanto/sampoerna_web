<?php

use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MasterdataController;
use App\Http\Controllers\ReportController;
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
Route::get('/api/chart-data/{jenis}', [DashboardController::class, 'getChartData']);

Route::get('/dash', [DashboardController::class, 'index']);

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
    Route::delete('/barang/destroy/{id}', 'destroy')->name('barang_destroy');
    Route::get('/barang/edit/{id}', 'edit')->name('barang_edit');
    Route::put('/barang/update/{id}', 'update')->name('barang_update_proses');
});

Route::controller(SalesController::class)->group(function() {
    Route::get('/sales', 'index')->name('index');
    Route::get('/sales/add', 'add')->name('add');
    Route::post('/sales/add_proses', 'add_proses')->name('sales_add_proses');
    Route::delete('/sales/destroy/{id}', 'destroy')->name('sales_destroy');
    Route::get('/sales/edit/{id}', 'edit')->name('sales_edit');
    Route::put('/sales/update/{id}', 'update')->name('sales_update_proses');
});

// Route::controller(SalesController::class)->group(function() {
//     Route::get('/sales', 'index')->name('index');
//     Route::get('/sales/add', 'add')->name('add');
//     Route::post('/sales/add_proses', 'add_proses')->name('sales_add_proses');
//     Route::delete('/sales/destroy/{id}', 'destroy')->name('sales_destroy');
//     Route::get('/sales/edit/{number}', 'edit')->name('sales_edit');
//     Route::put('/sales/update/{id}', 'update')->name('sales_update_proses');
// });
// Route::get('/sales/edit/{number}', 'SalesController@edit');

Route::controller(CustomerController::class)->group(function() {
    Route::get('/customer', 'index')->name('index');
    Route::get('/customer/add', 'add')->name('add');
    Route::post('/customer/add_proses', 'add_proses')->name('customer_add_proses');
    Route::delete('/customer/destroy/{id}', 'destroy')->name('customer_destroy');
    Route::get('/customer/edit/{id}', 'edit')->name('customer_edit');
    Route::put('/customer/update/{id}', 'update')->name('customer_update_proses');
});

Route::controller(ReportController::class)->group(function() {
    Route::get('/report', 'index')->name('index');
    Route::get('/report/add', 'add')->name('add');
    Route::post('/report/add_proses', 'add_proses')->name('report_add_proses');
    Route::delete('/report/destroy/{id}', 'destroy')->name('report_destroy');
    Route::get('/report/edit/{id}', 'edit')->name('report_edit');
    Route::put('/report/update/{id}', 'update')->name('report_update_proses');
});

Route::controller(MasterdataController::class)->group(function() {
    Route::get('/master/jenis', 'jenis_index')->name('jenis_index');
    Route::get('/master/jenis/add', 'jenis_add')->name('jenis_add');
    Route::post('/master/jenis/add_proses', 'jenis_add_proses')->name('jenis_add_proses');
    Route::delete('/master/jenis/destroy/{id}', 'jenis_destroy')->name('jenis_destroy');
    Route::get('/master/jenis/edit/{id}', 'jenis_edit')->name('jenis_edit');
    Route::put('/master/jenis/update/{id}', 'jenis_update')->name('jenis_update_proses');

    Route::get('/master/satuan', 'satuan_index')->name('satuan_index');
    Route::get('/master/satuan/add', 'satuan_add')->name('satuan_add');
    Route::post('/master/satuan/add_proses', 'satuan_add_proses')->name('satuan_add_proses');
    Route::delete('/master/satuan/destroy/{id}', 'satuan_destroy')->name('satuan_destroy');
    Route::get('/master/satuan/edit/{id}', 'satuan_edit')->name('satuan_edit');
    Route::put('/master/satuan/update/{id}', 'satuan_update')->name('satuan_update_proses');
});

// $routes->group('decoration', function ($routes) {
//     $routes->get('/', 'DecorationController::index');
//     $routes->get('show/fetch', 'DecorationController::pricelist_fetch');
//     $routes->get('show/detail/(:num)', 'DecorationController::pricelist_detail/$1');
//     $routes->get('show/pdf/(:num)', 'DecorationController::cetak_pdf_display/$1');
//     $routes->get('show/cetak/(:num)', 'DecorationController::cetak_pdf/$1');
//     $routes->get('galeri/fetch/(:any)', 'DecorationController::galeri_fetch/$1');
// });
