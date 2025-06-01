<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ServiceRequestController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\KategoriKendaraanController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\LogActivityController;

// Halaman Utama
Route::get('/', function () {
    return view('auth.login');
});

// Auth
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Halaman Publik
Route::get('/home', [AuthController::class, 'home'])->name('user.home');
Route::get('/about', [HomeController::class, 'about']);
Route::get('/services', [HomeController::class, 'services'])->name('services');

// Booking
Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');

// Service Requests
Route::get('/service-requests', [ServiceRequestController::class, 'index'])->name('service.requests');
Route::post('/service-requests', [ServiceRequestController::class, 'store'])->name('service.requests.store');
Route::put('/service-requests/{id}/status', [ServiceRequestController::class, 'updateStatus'])->name('service.requests.updateStatus');

// Pengguna
Route::get('/users', [AuthController::class, 'listUsers'])->name('users');
Route::get('/user', [AuthController::class, 'listUsers'])->name('user.index');
Route::get('/user/create', [AuthController::class, 'createUser'])->name('user.create');
Route::post('/user', [AuthController::class, 'storeUser'])->name('user.store');
Route::get('/user/{id}/edit', [AuthController::class, 'editUser'])->name('user.edit');
Route::put('/user/{id}', [AuthController::class, 'updateUser'])->name('user.update');
Route::delete('/user/{id}', [AuthController::class, 'destroyUser'])->name('user.destroy');

// Mekanik
Route::get('/mekanik', [AuthController::class, 'mekanik'])->name('mekanik.index');
Route::get('/mekanik/create', [AuthController::class, 'create'])->name('mekanik.create');
Route::post('/mekanik', [AuthController::class, 'store'])->name('mekanik.store');
Route::get('/mekanik/{id}/edit', [AuthController::class, 'edit'])->name('mekanik.edit');
Route::put('/mekanik/{id}', [AuthController::class, 'update'])->name('mekanik.update');
Route::delete('/mekanik/{id}', [AuthController::class, 'destroy'])->name('mekanik.destroy');

Route::get('/service', [LayananController::class, 'index'])->name('layanan.index');
Route::post('/service', [LayananController::class, 'store'])->name('layanan.store');
Route::put('/service/{id}', [LayananController::class, 'update'])->name('layanan.update');
Route::delete('/service/{id}', [LayananController::class, 'destroy'])->name('layanan.destroy');

Route::get('/export-pdf', [PembayaranController::class, 'exportPdf'])->name('pembayaran.exportPdf');
Route::get('/export-excel', [PembayaranController::class, 'exportExcel'])->name('pembayaran.exportExcel'); 

// Pembayaran routes for users and admins
Route::post('/pembayaran/{id}/upload', [PembayaranController::class, 'upload'])->name('pembayaran.upload');
Route::put('/pembayaran/{id}/verifikasi', [PembayaranController::class, 'verifikasi'])->name('pembayaran.verifikasi');

Route::get('/dashboardadmin', [DashboardAdminController::class, 'index'])->name('dashboardadmin');

Route::get('/log_activity', [LogActivityController::class, 'index'])->name('log_activity.index');

// Dashboard Khusus for authenticated users
Route::middleware(['auth'])->group(function () {
    Route::get('/riwayat-pembayaran-admin', [PembayaranController::class, 'indexadmin'])->name('riwayat.pembayaran.admin');
    Route::get('/riwayat-pembayaran', [PembayaranController::class, 'index'])->name('riwayat.pembayaran');
    Route::get('/booking-history', [BookingController::class, 'history'])->name('booking.history');
    // Route::get('/dashboardadmin', [AuthController::class, 'dashboardadmin'])->name('dashboard.admin');

    Route::get('/category', [KategoriKendaraanController::class, 'index'])->name('category.index');
    Route::post('/category', [KategoriKendaraanController::class, 'store'])->name('category.store');
    Route::put('/category/{id}', [KategoriKendaraanController::class, 'update'])->name('category.update');
    Route::delete('/category/{id}', [KategoriKendaraanController::class, 'destroy'])->name('category.destroy');

    Route::resource('category', KategoriKendaraanController::class);

    Route::get('/pengguna/dashboard', function () {
        return view('pengguna.dashboard');
    })->name('pengguna.dashboard');
});
