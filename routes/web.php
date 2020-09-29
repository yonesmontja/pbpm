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
use App\Http\Controllers\SiteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Str;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\PostController;
//use Illuminate\Support\Str;

Route::get('/', [SiteController::class,'home']);
Route::get('/register',[SiteController::class,'register']);
Route::post('/postregister',[SiteController::class,'postregister']);
Route::get('/about',[SiteController::class,'about']);


//--Route::get('/siswa','SiswaController@index');--
//--Route::get('/user',[UserController::class,'index']);
Route::get('/login',[AuthController::class,'login'])->name('login');
Route::post('/postlogin',[AuthController::class,'postlogin']);
Route::get('/logout',[AuthController::class,'logout']);

Route::group(['middleware'=>['auth','checkRole:admin']],function(){
	Route::get('/dashboard',[DashboardController::class,'index']);
	
	Route::get('/siswa',[SiswaController::class,'index']);
	Route::post('/siswa/create',[SiswaController::class,'create']);
	Route::get('/siswa/{siswa}/edit',[SiswaController::class,'edit']);
	Route::post('/siswa/{siswa}/update',[SiswaController::class,'update']);
	Route::get('/siswa/{siswa}/delete',[SiswaController::class,'delete']);
	Route::get('/siswa/{siswa}/profile',[SiswaController::class,'profile']);
	Route::post('/siswa/{siswa}/addnilai',[SiswaController::class,'addnilai']);
	Route::get('/siswa/{siswa}/{idmapel}/deletenilai',[SiswaController::class,'deletenilai']);
	Route::get('/siswa/exportExcel',[SiswaController::class,'exportExcel']);
	Route::get('/siswa/exportPDF',[SiswaController::class,'exportPDF']);
	Route::get('/guru/{id}/profile',[GuruController::class,'profile']);
	Route::get('/posts',[PostController::class,'index']);
});

Route::group(['middleware' => ['auth','checkRole:admin,siswa']],function(){
	Route::get('/home',[HomeController::class,'index']);
	Route::get('/dashboard',[DashboardController::class,'index']);
});

Route::get('/{slug}',[
	'uses' => 'SiteController@singlepost',
	'as' => 'site.single.post'
]);