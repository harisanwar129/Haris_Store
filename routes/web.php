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


Route::get('/', 'HomeController@index')->name('utama');
Route::get('/kategori', 'CategoryController@index')->name('kategori');
Route::get('/kategori/{id}', 'CategoryController@detail')->name('kategori-detail');
Route::get('/detail/{id}', 'DetailController@index')->name('detail');
Route::post('/detail/{id}', 'DetailController@add')->name('detail-tambah');
Route::get('/pembelian', 'PembelianController@index')->name('pembelian');
Route::delete('pembelian/{id}', 'PembelianController@hapus')->name('pembelian-hapus');
Route::get('/success', 'Pembelian@success')->name('success');

Route::get('/register/success', 'Auth\RegisterController@success')->name('register-success');

Route::get('/dashboard', 'DashboardController@index')->name('beranda');
Route::get('/dashboard/products', 'DashboardProductController@index')->name('dashboard-product');
Route::get('/dashboard/products/create', 'DashboardProductController@create')->name('dashboard-product-create');
Route::get('/dashboard/products/{id}', 'DashboardProductController@details')->name('dashboard-product-details');

Route::get('/dashboard/transactions/', 'DashboardTransactionController@index')->name('dashboard-transaction');

Route::get('/dashboard/transactions/{id}', 'DashboardTransactionController@details')->name('dashboard-transaction-details');

Route::get('/dashboard/settings', 'DashboardSettingController@store')->name('dashboard-transaction-setting');
Route::get('/beranda/pengguna', 'DashboardSettingController@account')->name('beranda-atur-pengguna');

Route::prefix('admin')
  ->namespace('Admin')
  ->group(function () {
    Route::get('/', 'DashboardController@index')->name('admin-dashboard');
    Route::resource('user', 'UserController');
    Route::resource('kategori', 'KategoriController');
    Route::resource('produk', 'ProdukController');
    Route::resource('produk-galleri', 'ProdukGalleriController');
  });

Auth::routes();
