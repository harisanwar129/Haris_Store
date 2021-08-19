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


Route::get('/checkout/callback', 'CheckoutController@callback')->name('midtrans-callback');
Route::get('/success', 'Pembelian@success')->name('success');
Route::get('/register/success', 'Auth\RegisterController@success')->name('register-success');

 
Route::group(['middleware'=>['auth']],function (){
  Route::get('/pembelian', 'PembelianController@index')->name('pembelian');
  Route::delete('pembelian/{id}', 'PembelianController@hapus')->name('pembelian-hapus');
  Route::post('/checkout', 'CheckoutController@process')->name('checkout');
  Route::get('/beranda', 'BerandaController@index')->name('beranda');
  Route::get('/beranda/produk', 'BerandaProdukController@index')->name('beranda-produk');
  Route::get('/beranda/produk/create', 'BerandaProdukController@create')->name('beranda-produk-create');
  Route::post('/beranda/store', 'BerandaProdukController@store')->name('beranda-produk-store');
  Route::get('/beranda/produk/{id}', 'BerandaProdukController@detail')->name('beranda-produk-detail');

  Route::post('/beranda/produk/{id}','BerandaProdukController@update')->name('beranda-produk-update');
  Route::post('/beranda/produk/galleri/upload', 'BerandaProdukController@uploadGalleri')->name('beranda-produk-galleri-upload');
  Route::get('/beranda/produk/galleri/delete/{id}', 'BerandaProdukController@deleteGalleri')->name('beranda-produk-galleri-delete');


  Route::get('/beranda/transaction/', 'DashboardTransactionController@index')->name('beranda-transaction');
  Route::get('/beranda/transactions/{id}', 'DashboardTransactionController@details')->name('beranda-transaction-detail');

  Route::get('/beranda/settings', 'DashboardSettingController@store')->name('beranda-transaction-setting');
  Route::get('/beranda/pengguna', 'DashboardSettingController@account')->name('beranda-atur-pengguna');


});


Route::prefix('admin')
  ->namespace('Admin')
  ->middleware(['auth','admin'])
  ->group(function () {
    Route::get('/', 'DashboardController@index')->name('admin-dashboard');
    Route::resource('user', 'UserController');
    Route::resource('kategori', 'KategoriController');
    Route::resource('produk', 'ProdukController');
    Route::resource('produk-galleri', 'ProdukGalleriController');
  });

Auth::routes();
