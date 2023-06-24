<?php

use Illuminate\Support\Facades\Route;

//Admin Namespace
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DataSampahController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\PengumumanController;



//Controllers Namespace
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\DataTransaksiController;
use App\Http\Controllers\Admin\ChangePasswordController;
use App\Http\Controllers\Admin\CountController;

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

//Home
Route::get('/',[HomeController::class,'index']);
Route::get('/home',[HomeController::class,'index'])->name('home');
Route::get('/about',[HomeController::class,'about'])->name('about');
Route::get('/contact',[HomeController::class,'contact'])->name('contact');
Route::get('/login',[HomeController::class,'login'])->name('login');
Route::get('/register',[RegisterController::class,'register'])->name('register');
Route::post('/register',[RegisterController::class,'store'])->name('register');


//data_sampah
Route::get('/data_sampah',[DataSampahController::class,'index'])->name('data_sampah');
Route::get('/data_sampah/{data_sampah:slug}',[DataSampahController::class,'show'])->name('data_sampah.show');

//galeri
Route::get('/galeri',[GaleriController::class,'index'])->name('galeri');
Route::get('/galeri{galeri:slug}',[GaleriController::class,'show'])->name('galeri.show');

//Pengumuman
Route::get('/pengumuman',[PengumumanController::class,'index'])->name('pengumuman');
Route::get('/pengumuman/{pengumuman:slug}',[PengumumanController::class,'show'])->name('pengumuman.show');

//data_transaksi
Route::get('/data_transaksi',[DataTransaksiController::class,'index'])->name('data_transaksi');
Route::get('/data_transaksi/{data_transaksi:slug}',[DataTransaksiController::class,'show'])->name('data_transaksi.show');

Route::get('/count',[CountController::class,'countMonth'])->name('count');
//Admin
Route::group(['namespace' => 'Admin','prefix' => 'admin','middleware' => ['auth']],function(){
	Route::name('admin.')->group(function(){
		Route::group(['namespace' => '\App\Http\Controllers'], function(){
		Route::get('/',[AdminController::class,'index'])->name('index')->middleware('can:role, "admin","guest"');
		Route::get('/profile',[ProfileController::class,'index'])->name('profile.index')->middleware('can:role, "admin","guest"');
		Route::get('/change-password',[ChangePasswordController::class,'index'])->name('change-password.index')->middleware('can:role, "admin","guest"'); });

		//Resource Controller
		Route::resource('users','UsersController')->middleware('can:role, "admin"');
		Route::resource('admin.index','CountController')->middleware('can:role, "admin"');
		Route::resource('pengumuman','PengumumanController')->middleware('can:role, "admin"');
		Route::resource('data_transaksi','DataTransaksiController')->middleware('can:role, "admin"');
		Route::resource('data_sampah','DataSampahController')->middleware('can:role, "admin"');
		Route::resource('galeri', 'GaleriController')->middleware('can:role, "admin"');
		Route::resource('kategori-artikel','KategoriArtikelController');
	});
	});