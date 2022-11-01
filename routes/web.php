<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\SuratJalanController;
use App\Http\Controllers\SuratJalanModels;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PelangganController;

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

Route::get('/dashboard-admin', function () {
    return view('admin.dashboard.index');
});
Route::get('/', function () {
    return view('user.halaman_utama');
});
Route::get('/about-us', function () {
    return view('user.about');
});
Route::get('/contact', function () {
    return view('user.contact');
});
Route::get('/register', function () {
    return view('auth.register');
});
Route::get('logout', function ()
{
    auth()->logout();
    
    request()->session()->invalidate();

    request()->session()->regenerateToken();
    return view('auth.login');
})->name('logout');


Route::controller(DriverController::class)->group(function(){

    Route::get('driver', 'index')->name('driver.index');
    Route::get('driver/add', 'create')->name('driver.add');
    Route::post('driver/store', 'store')->name('driver.store');
    Route::post('driver/update', 'update')->name('driver.update');
    Route::get('driver/edit/{id_driver}', 'show');
});

Route::controller(AdminController::class)->group(function(){

    Route::get('admin', 'index')->name('admin.index');
    Route::get('admin/add', 'create')->name('admin.add');
    Route::post('admin/store', 'store')->name('admin.store');
    Route::post('admin/update', 'update')->name('admin.update');
    Route::get('admin/edit/{id_admin}', 'show');
});
Route::controller(PelangganController::class)->group(function(){

    Route::get('pelanggan', 'index')->name('pelanggan.index');
    Route::get('pelanggan/add', 'create')->name('pelanggan.add');
    Route::post('pelanggan/store', 'store')->name('pelanggan.store');
    Route::post('pelanggan/update', 'update')->name('pelanggan.update');
    Route::get('pelanggan/edit/{id_pelanggan}', 'show');
});

Route::controller(PesananController::class)->group(function(){
    Route::get('pesanan', 'index')->name('pesanan.index');
    Route::get('pesanan/tracking', 'tracking')->name('pesanan.tracking');
    Route::get('pesanan/add', 'create')->name('pesanan.add');
    Route::post('pesanan/update', 'update')->name('pesanan.update');
    Route::get('pesanan/detail/{id_pesanan}', 'show');
    Route::get('pesanan/edit/{id_pesanan}', 'edit');
    Route::get('pesanan/hapus/{id_pesanan}', 'destroy');
    Route::post('pesanan/store', 'store')->name('pesanan.store');
    Route::get('update/lokasi/{id_pesanan}', 'updateLokasi');
    Route::post('update/lokasi/store', 'storeUpdateLokasi')->name('updateLokasi.store');
    Route::post('pesanan/bayar/sukses', 'bayarSukses')->name('bayar.sukses');
});
Route::controller(SuratJalanController::class)->group(function(){
    Route::get('surat_jalan', 'index')->name('surat_jalan.index');
    Route::get('surat_jalan/add', 'create')->name('surat_jalan.add');
    Route::post('surat_jalan/update', 'update')->name('surat_jalan.update');
    Route::get('surat_jalan/detail/{id_surat_jalan}', 'show');
    Route::get('surat_jalan/edit/{id_surat_jalan}', 'edit');
    Route::get('surat_jalan/hapus/{id_surat_jalan}', 'destroy');
    Route::post('surat_jalan/store', 'store')->name('surat_jalan.store');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/kabupaten', [App\Http\Controllers\WilayahIndonesiaController::class, 'kabupaten'])->name('kabupaten');
Route::post('/kecamatan', [App\Http\Controllers\WilayahIndonesiaController::class, 'kecamatan'])->name('kecamatan');
Route::post('/driver', [App\Http\Controllers\DriverController::class, 'select2'])->name('driver');

Route::get('/page/about_us', [App\Http\Controllers\PageSettingController::class, 'about_us'])->name('page.about_us');
Route::get('/page/store/about_us', [App\Http\Controllers\PageSettingController::class, 'about_us_store'])->name('about_us.store');
Route::get('/page/contacts', [App\Http\Controllers\PageSettingController::class, 'contacts'])->name('page.contacts');