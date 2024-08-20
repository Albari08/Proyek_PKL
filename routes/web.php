<?php

use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InfoUserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\TabelController;
use App\Http\Controllers\KonfirmasiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
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


Route::group(['middleware' => 'auth'], function () {

    Route::get('/', [HomeController::class, 'home']);
	Route::get('dashboard', function () {
		return view('dashboard');
	})->name('dashboard');

	// START Pengajuan
	Route::get('pengajuan', function () {
		return view('pengajuan');
	})->name('pengajuan');

	// Membuat Pengajuan Spesifikasi
    Route::get('/spesifikasi', [PengajuanController::class, 'indexSpesifikasi'])->name('form_spesifikasi');
	Route::post('/spesifikasi', [PengajuanController::class, 'saveSpesifikasi'])->name('buat_spesifikasi');

	// END Pengajuan Spesifikasi

	// Membuat Pengajuan Pembelian

	Route::get('/pembelian', [PengajuanController::class, 'indexPembelian'])->name('form_pembelian');
	Route::post('/pembelian', [PengajuanController::class, 'savePembelian'])->name('buat_pembelian');

	// END Pengajuan Pembelian

	Route::get('profile', function () {
		return view('profile');
	})->name('profile');

	Route::get('user-management', function () {
		return view('laravel-examples/user-management');
	})->name('user-management');

	// START Tabel PR
	// Route::get('tables', function () {
	// 	return view('tables');
	// })->name('tables');

	Route::get('/tables', [TabelController::class, 'index'])->name('index.tabel');
	Route::get('/search', [TabelController::class, 'search'])->name('search');

	//END Tabel PR

	// START Update Status

	// View Spesifikasi
	Route::get('/tables-edit/{id}', [KonfirmasiController::class, 'view']);

	// Mengubah status

	Route::put('/tables-edit/{id}', [KonfirmasiController::class, 'updateStatus']);
	
	// END Adm. Pengadaan

    Route::get('static-sign-in', function () {
		return view('static-sign-in');
	})->name('sign-in');

    Route::get('static-sign-up', function () {
		return view('static-sign-up');
	})->name('sign-up');

    Route::get('/logout', [SessionsController::class, 'destroy']);
	Route::get('/user-profile', [InfoUserController::class, 'create']);
	Route::post('/user-profile', [InfoUserController::class, 'store']);
    Route::get('/login', function () {
		return view('dashboard');
	})->name('sign-up');
});



Route::group(['middleware' => 'guest'], function () {
    Route::get('/register', [RegisterController::class, 'create']);
    Route::post('/register', [RegisterController::class, 'store']);
    Route::get('/login', [SessionsController::class, 'create']);
    Route::post('/session', [SessionsController::class, 'store']);
	Route::get('/login/forgot-password', [ResetController::class, 'create']);
	Route::post('/forgot-password', [ResetController::class, 'sendEmail']);
	Route::get('/reset-password/{token}', [ResetController::class, 'resetPass'])->name('password.reset');
	Route::post('/reset-password', [ChangePasswordController::class, 'changePassword'])->name('password.update');

});

Route::get('/login', function () {
    return view('session/login-session');
})->name('login');