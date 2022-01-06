<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UsersController;
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

// ROUTE AUTH -> LOGIN
Route::get('/', function () {
    return view('pages.auth.login');
})->middleware('guest')->name('login');
Route::post('login', [AuthController::class, 'Login']);

// ROUTE AUTH -> REGISTER
Route::get('register', function () {
    return view('pages.auth.register');
})->middleware('guest');
Route::post('register', [AuthController::class, 'Register']);

// ROUTE AUTH -> LOGOUT
Route::get('logout', [AuthController::class, 'Logout']);

// ROUTE USER
Route::get('user', [UsersController::class, 'DashboardUsers'])->middleware('auth')->name('home');
// ROUTE (USER) MASTER -> DOMPET
Route::get('user/dompet', [UsersController::class, 'Dompet'])->middleware('auth');
Route::get('user/add_dompet', [UsersController::class, 'GET_ADD_DOMPET'])->middleware('auth');
Route::post('user/add_dompet', [UsersController::class, 'POST_ADD_DOMPET'])->middleware('auth');
Route::get('user/edit_dompet/{id}', [UsersController::class, 'GET_EDIT_DOMPET'])->middleware('auth');
Route::post('user/edit_dompet/{id}', [UsersController::class, 'POST_EDIT_DOMPET'])->middleware('auth');
Route::get('user/detail_dompet/{id}', [UsersController::class, 'DOMPET_DETAIL'])->middleware('auth');
Route::get('user/status_dompet/{id}/{id_status}', [UsersController::class, 'CHECK_STATUS_DOMPET'])->middleware('auth');
Route::get('user/filter_dompet/{id_status}', [UsersController::class, 'FILTER_DOMPET'])->middleware('auth');
// ROUTE (USER) MASTER -> KATEGORI
Route::get('user/kategori', [UsersController::class, 'Kategori'])->middleware('auth');
Route::get('user/add_kategori', [UsersController::class, 'GET_ADD_KATEGORI'])->middleware('auth');
Route::post('user/add_kategori', [UsersController::class, 'POST_ADD_KATEGORI'])->middleware('auth');
Route::get('user/edit_kategori/{id}', [UsersController::class, 'GET_EDIT_KATEGORI'])->middleware('auth');
Route::post('user/edit_kategori/{id}', [UsersController::class, 'POST_EDIT_KATEGORI'])->middleware('auth');
Route::get('user/detail_kategori/{id}', [UsersController::class, 'KATEGORI_DETAIL'])->middleware('auth');
Route::get('user/status_kategori/{id}/{id_status}', [UsersController::class, 'CHECK_STATUS_KATEGORI'])->middleware('auth');
Route::get('user/filter_kategori/{id_status}', [UsersController::class, 'FILTER_KATEGORI'])->middleware('auth');
// ROUTE (USER) TRANSAKSI -> DOMPET_MASUK
Route::get('user/transaksi_masuk', [UsersController::class, 'Dompet_Masuk'])->middleware('auth');
Route::get('user/add_dompet_masuk', [UsersController::class, 'GET_ADD_DOMPET_MASUK'])->middleware('auth');
Route::post('user/add_dompet_masuk', [UsersController::class, 'POST_ADD_DOMPET_MASUK'])->middleware('auth');
// ROUTE (USER) TRANSAKSI -> DOMPET_KELUAR
Route::get('user/transaksi_keluar', [UsersController::class, 'Dompet_Keluar'])->middleware('auth');
Route::get('user/add_dompet_keluar', [UsersController::class, 'GET_ADD_DOMPET_KELUAR'])->middleware('auth');
Route::post('user/add_dompet_keluar', [UsersController::class, 'POST_ADD_DOMPET_KELUAR'])->middleware('auth');
// ROUTE (USER) LAPORAN -> LAPORAN_TRANSAKSI
Route::get('user/laporan', [UsersController::class, 'Laporan'])->middleware('auth');
Route::post('user/result', [UsersController::class, 'RESULT'])->middleware('auth');
