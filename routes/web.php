<?php

use App\Http\Controllers\DashboardC;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TablesC;
use App\Http\Controllers\LoginC;
use App\Http\Controllers\ReservationsC;
use App\Http\Controllers\TransaksiC;
use App\Http\Controllers\LogC;
use App\Http\Controllers\UsersR;
use Carbon\Carbon;

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

Route::get('/', function () {
    $subtitle = 'Home Page';
    return view('dashboard', compact('subtitle'));
})->middleware('auth');

//LOGIN LOGOUT
Route::get('logout', [LoginC::class, 'logout'])->middleware('auth');
Route::post('login', [LoginC::class, 'login_action'])->name('login.action');
Route::get('login',[LoginC::class, 'login'])->name('login');

//TABLES
Route::get('/table', [TablesC::class, 'index'])->name('tables.index')->middleware('auth');
Route::get('table/create', [TablesC::class, 'create'])->name('table.create')->middleware('auth');
Route::post('table/store', [TablesC::class, 'store'])->name('tables.store')->middleware('auth');
Route::get('table/edit/{id}', [TablesC::class, 'edit'])->name('tables.edit')->middleware('auth');
Route::put('table/update/{id}', [TablesC::class, 'update'])->name('tables.update')->middleware('auth');
Route::delete('table/destroy/{id}', [TablesC::class, 'destroy'])->name('tables.destroy')->middleware('auth');

//RESERVATIONS
Route::get('reservations', [ReservationsC::class, 'index'])->name('reservations.index')->middleware('userAkses:admin,teller,owner,kasir');
Route::get('reservations/create', [ReservationsC::class, 'create'])->name('reservations.create')->middleware('userAkses:admin,teller');
Route::post('reservations/store', [ReservationsC::class, 'store'])->name('reservations.store')->middleware('userAkses:admin,teller');
Route::get('reservations/edit/{id}', [ReservationsC::class, 'edit'])->name('reservations.edit')->middleware('userAkses:admin,teller');
Route::put('reservations/update/{id}', [ReservationsC::class, 'update'])->name('reservations.update')->middleware('userAkses:admin,teller');
Route::get('reservations/pdf', [ReservationsC::class, 'pdf'])->name('reservations.pdf')->middleware('userAkses:admin,teller,owner');
Route::get('reservations/cetak/{id}', [ReservationsC::class,'cetak'])->name('reservations.cetak')->middleware('userAkses:admin,teller');
Route::delete('reservations/destroy/{id}',[ReservationsC::class,'destroy'])->name('reservations.destroy')->middleware('userAkses:admin,teller');

//TRANSAKSI
Route::get('transaksi', [TransaksiC::class, 'index'])->name('transaksi.index')->middleware('userAkses:admin,kasir,owner,teller');
Route::get('transaksi/create', [TransaksiC::class, 'create'])->name('transaksi.create')->middleware('userAkses:admin,kasir');
Route::post('transaksi/store', [TransaksiC::class, 'store'])->name('transaksi.store')->middleware('userAkses:admin,kasir');
Route::get('transaksi/edit/{id}', [TransaksiC::class, 'edit'])->name('transaksi.edit')->middleware('userAkses:admin,kasir');
Route::put('transaksi/update/{id}', [TransaksiC::class, 'update'])->name('transaksi.update')->middleware('userAkses:admin,kasir');
Route::delete('transaksi/destroy/{id}', [TransaksiC::class, 'destroy'])->name('transaksi.destroy')->middleware('userAkses:admin,kasir');
Route::get('transaksi/pdf', [TransaksiC::class, 'pdf'])->name('transaksi.pdf')->middleware('userAkses:admin,kasir,owner');
Route::get('transaksi/cetak/{id}', [TransaksiC::class,'cetak'])->name('transaksi.cetak')->middleware('userAkses:admin,kasir');

//USERS
Route::get('users/changepassword/{id}', [UsersR::class, 'changepassword'])->name('users.changepassword')->middleware('userAkses:admin,owner');
Route::put('users/change/{id}', [UsersR::class, 'change'])->name('users.change')->middleware('userAkses:admin,owner');
Route::delete('users/destroy/{id}', [UsersR::class, 'destroy'])->name('users.destroy')->middleware('userAkses:admin,owner');
Route::resource('users', UsersR::class)->middleware('userAkses:admin,owner');

//LOG
Route::resource('log', LogC::class)->middleware('userAkses:admin,owner');

//DASHBOARD
