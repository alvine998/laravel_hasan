<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\logincontroller;
use App\Http\Controllers\dashboardcontolloer;
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
//HOME
Route::get('/', 'homecontroller@index')
    ->name('home'); 


//LOGIN
Route::get('login', [logincontroller::class, 'showFormLogin'])
    ->name('login'); 

Route::group(['prefix' => 'tb_pengguna'], function() {
    
    Route::get('login', [logincontroller::class, 'showFormLogin'])->name('login_pengguna');
    Route::post('login',[logincontroller::class, 'masuk'])->name('proses_login');
    Route::group(['prefix' => 'dashboard', 'middleware' => ['auth:customtable']], function(){
        Route::group(['middleware' => ['cek_login:Admin']], function () {
            Route::resource('Admin', logincontroller::class);
        });
    });
});


//  Route::get('login', [logincontroller::class, 'showFormLogin'])
//  ->name('login');
//  Route::post('login', [logincontroller::class, 'masuk']);
//  Route::group(['prefix' => 'dashboard', 'middleware' => ['auth:customtable']], function(){
//     Route::group(['middleware' => ['Cek_login:Admin']], function () {
//         Route::resource('Admin', logincontroller::class);
//     });
   
// });

 //ADMIN

