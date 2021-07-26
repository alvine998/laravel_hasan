<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\logincontroller;
use App\Http\Controllers\dashboardcontoller;
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


//LOGINLOGOUT
Route::get('/admin', 'dashboardcontroller@index')->name('dashboard');
Route::get('/operational-manager', 'dashboardopcontroller@index')->name('dashboard-op');
Route::get('/ppc', 'dashboardppccontroller@index')->name('dashboard-ppc');
Route::get('/produksi', 'dashboardproduksicontroller@index')->name('dashboard-produksi');

Route::post('/logout', [logincontroller::class, 'logout'])->name('logout');
Route::GET('/login', [logincontroller::class, 'showFormLogin'])->name('login_pengguna');
Route::post('/proses_login',[logincontroller::class, 'masuk'])->name('proses_login');

Route::group(['prefix' => 'dashboard', 'middleware' => ['auth:pengguna']], function(){
        Route::group(['middleware' => ['cek_login:Admin']], function () {
                Route::resource('Admin', logincontroller::class);
            });
        Route::group(['middleware' => ['cek_login:Operational Manager']], function () {
                Route::resource('Operational Manager', logincontroller::class);
            });
        Route::group(['middleware' => ['cek_login:PPC']], function () {
                Route::resource('PPC', logincontroller::class);
            });
         Route::group(['middleware' => ['cek_login:Produksi']], function () {
                Route::resource('Produksi', logincontroller::class);
            });   
         });
    //ADMIN
//crud pengguna
Route::get('/pengguna', 'penggunacontroller@index')->name('pengguna');
Route::get('/tambah-pengguna', 'penggunacontroller@create')->name('tambah-pengguna');
Route::post('/simpan-pengguna', 'penggunacontroller@store')->name('simpan-pengguna');
Route::get('/edit-pengguna/{id_pengguna}', 'penggunacontroller@edit')->name('edit-pengguna');
Route::put('/update-pengguna/{id_pengguna}', 'penggunacontroller@update')->name('update-pengguna');
Route::delete('/hapus-pengguna/{id_pengguna}', 'penggunacontroller@destroy')->name('hapus-pengguna');

//crud mesin
Route::get('/mesin', 'mesincontroller@index')->name('mesin');
Route::get('/tambah-mesin', 'mesincontroller@create')->name('tambah-mesin');
Route::post('/simpan-mesin', 'mesincontroller@store')->name('simpan-mesin');
Route::get('/edit-mesin/{id_mesin}', 'mesincontroller@edit')->name('edit-mesin');
Route::put('/update-mesin/{id_mesin}', 'mesincontroller@update')->name('update-mesin');
Route::delete('/hapus-mesin/{id_mesin}', 'mesincontroller@destroy')->name('hapus-mesin');

//crud komponen
Route::get('/komponen', 'komponencontroller@index')->name('komponen');
Route::get('/tambah-komponen', 'komponencontroller@create')->name('tambah-komponen');
Route::post('/simpan-komponen', 'komponencontroller@store')->name('simpan-komponen');
Route::get('/edit-komponen/{id_komponen}', 'komponencontroller@edit')->name('edit-komponen');
Route::put('/update-komponen/{id_komponen}', 'komponencontroller@update')->name('update-komponen');
Route::delete('/hapus-komponen/{id_komponen}', 'komponencontroller@destroy')->name('hapus-komponen');
 
//crud kustomer
Route::get('/kustomer', 'kustomercontroller@index')->name('kustomer');
Route::get('/tambah-kustomer', 'kustomercontroller@create')->name('tambah-kustomer');
Route::post('/simpan-kustomer', 'kustomercontroller@store')->name('simpan-kustomer');
Route::get('/edit-kustomer/{id_kustomer}', 'kustomercontroller@edit')->name('edit-kustomer');
Route::put('/update-kustomer/{id_kustomer}', 'kustomercontroller@update')->name('update-kustomer');
Route::delete('/hapus-kustomer/{id_kustomer}', 'kustomercontroller@destroy')->name('hapus-kustomer');

//OPERATIONAL MANAGER

//Waktu Standar
Route::get('/waktustandar', 'waktustandarcontroller@index')->name('waktu');
Route::get('/tambah-waktu', 'waktustandarcontroller@create')->name('tambah-waktu');
Route::post('/simpan-waktu', 'waktustandarcontroller@store')->name('simpan-waktu');

//testAjax
Route::get('ubah1',array('as'=>'ubah1','uses'=>'waktustandarcontroller@create'));
Route::get('ubah1/ubah1Ajax/{id_mesin}',array('as'=>'ubah1.ajax','uses'=>'waktustandarcontroller@ubah1AJax'));
//testout
Route::get('/edit-waktu/{id}', 'waktustandarcontroller@edit')->name('edit-waktu');
Route::put('/update-waktu/{id}', 'waktustandarcontroller@update')->name('update-waktu');
Route::delete('/hapus-waktu/{id}', 'waktustandarcontroller@destroy')->name('hapus-waktu');

//data perencanaan
Route::get('/data-perencanaan', 'datappccontroller@index')->name('data-perencanaan');
Route::get('/data-setuju/{id_perencanaan}', 'datappccontroller@setuju')->name('data-setuju');
Route::get('/data-tolak/{id_perencanaan}', 'datappccontroller@tolak')->name('data-tolak');
Route::get('/data-detail/{id_perencanaan}', 'datappccontroller@show')->name('data-detail');

//data Serah Terima
Route::get('/data-serahterima', 'dataserahterimacontroller@index')->name('data-serahterima');
Route::get('/data-setuju-terima/{id}', 'dataserahterimacontroller@setuju')->name('data-setuju-terima');
Route::get('/data-tolak-terima/{id}', 'dataserahterimacontroller@tolak')->name('data-tolak-terima');
Route::get('/data-detail-terima/{id}', 'dataserahterimacontroller@show')->name('data-detail-terima');

//data laporan Harian
Route::get('/data-laporan', 'datalaporancontroller@index')->name('data-laporan');
Route::get('/data-setuju-laporan/{id}', 'datalaporancontroller@setuju')->name('data-setuju-laporan');
Route::get('/data-tolak-laporan/{id}', 'datalaporancontroller@tolak')->name('data-tolak-laporan');
Route::get('/data-detail-laporan/{id}', 'datalaporancontroller@show')->name('data-detail-laporan');


//Grafi-problem
Route::get('/grafik-porblem', 'grafikcontroller@index')->name('grafik-problem');
//PPC
//perencanaan prod
Route::get('/perencanaan-ppc', 'ppccontroller@index')->name('perencanaan-ppc');
Route::get('/tambah-ppc', 'ppccontroller@create')->name('tambah-ppc');
Route::post('/simpan-ppc', 'ppccontroller@store')->name('simpan-ppc');
Route::get('/detail-produksi', 'dettailproduksicontroller@index')->name('detail-produksi');
//testAjax
Route::get('create1',array('as'=>'create1','uses'=>'ppccontroller@create'));
Route::get('create1/create1Ajax/{id_komponen}',array('as'=>'create1.ajax','uses'=>'ppccontroller@create1AJax'));
//testOut
Route::get('/edit-ppc/{id_perencanaan}', 'ppccontroller@edit')->name('edit-ppc');
Route::put('/update-ppc/{id_perencanaan}', 'ppccontroller@update')->name('update-ppc');
Route::delete('/hapus-ppc/{id_perencanaan}', 'ppccontroller@destroy')->name('hapus-ppc');

//data waktu standar
Route::get('/data-waktu', 'datawaktucontroller@index')->name('data-waktu');
Route::get('/data-waktudetail/{id}', 'datawaktucontroller@show')->name('data-detailwaktu');

//Produksi

//serah terima barang
Route::get('/serahterima-produksi', 'produksicontroller@index')->name('serahterima-produksi');
Route::get('/tambah-produksi', 'produksicontroller@create')->name('tambah-produksi');
Route::post('/simpan-produksi', 'produksicontroller@store')->name('simpan-produksi');
//testAjax
Route::get('create',array('as'=>'create','uses'=>'produksicontroller@create'));
Route::get('create/createAjax/{id_komponen}',array('as'=>'create.ajax','uses'=>'produksicontroller@createAJax'));
//tesout
Route::get('/edit-produksi/{id}', 'produksicontroller@edit')->name('edit-produksi');
Route::put('/update-produksi/{id}', 'produksicontroller@update')->name('update-produksi');
Route::delete('/hapus-produksi/{id}', 'produksicontroller@destroy')->name('hapus-produksi');

//Laporan Harian Produksi
Route::get('/laporan-harian', 'laporancontroller@index')->name('laporan-harian');
Route::get('/tambah-laporan', 'laporancontroller@create')->name('tambah-laporan');
Route::post('/simpan-laporan', 'laporancontroller@store')->name('simpan-laporan');
//testAjax
Route::get('ubah',array('as'=>'ubah','uses'=>'laporancontroller@create'));
Route::get('ubah/ubahAjax/{id_mesin}',array('as'=>'ubah.ajax','uses'=>'laporancontroller@ubahAJax'));
//testout
Route::get('/edit-laporan/{id}', 'laporancontroller@edit')->name('edit-laporan');
Route::put('/update-laporan/{id}', 'laporancontroller@update')->name('update-laporan');
Route::delete('/hapus-laporan/{id}', 'laporancontroller@destroy')->name('hapus-laporan');
Route::get('/cetak-laporan/{tglawal}/{tglakhir}', 'laporancontroller@cetak')->name('cetak-laporan');


