<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

// 1. HALAMAN DEPAN (Landing Page)
Route::get('/', function () {
    return view('welcome');
});

// 2. GRUP ROUTE ADMIN
Route::prefix('admin')->group(function () {
    
    // --- A. OTENTIKASI (LOGIN) ---
    Route::get('/login', [AdminController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'login'])->name('admin.login.submit');

    // --- B. DASHBOARD ---
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // --- C. MODUL BOOKING (TRANSAKSI) ---
    // 1. Tampilkan Daftar Booking
    Route::get('/bookings', [AdminController::class, 'bookings'])->name('admin.bookings');
    // 2. Form Booking Manual (Create)
    Route::get('/bookings/create', [AdminController::class, 'createBooking'])->name('admin.bookings.create');
    // 3. Simpan Booking Manual (Store)
    Route::post('/bookings/store', [AdminController::class, 'storeBooking'])->name('admin.bookings.store');
    // 4. Update Status Booking (Terima/Selesai)
    Route::post('/bookings/{id}/update', [AdminController::class, 'updateBookingStatus'])->name('admin.bookings.update');

    // --- D. MODUL SERVICES (LAYANAN) ---
    // 1. Tampilkan Daftar Service
    Route::get('/services', [AdminController::class, 'services'])->name('admin.services');
    // 2. Simpan Service Baru
    Route::post('/services/store', [AdminController::class, 'storeService'])->name('admin.services.store');
    // 3. Form Edit Service
    Route::get('/services/{id}/edit', [AdminController::class, 'editService'])->name('admin.services.edit');
    // 4. Simpan Perubahan Service (Update)
    Route::put('/services/{id}', [AdminController::class, 'updateService'])->name('admin.services.update');
    // 5. Hapus Service
    Route::delete('/services/{id}', [AdminController::class, 'deleteService'])->name('admin.services.delete');

    // --- E. MODUL CUSTOMER (PELANGGAN) ---
    // 1. Tampilkan Daftar Customer
    Route::get('/customers', [AdminController::class, 'customers'])->name('admin.customers');
    // 2. Simpan Customer Baru
    Route::post('/customers/store', [AdminController::class, 'storeCustomer'])->name('admin.customers.store');
    // 3. Hapus Customer
    Route::delete('/customers/{id}', [AdminController::class, 'deleteCustomer'])->name('admin.customers.delete');
    
    // [BARU] 4. Form Edit Customer
    Route::get('/customers/{id}/edit', [AdminController::class, 'editCustomer'])->name('admin.customers.edit');
    // [BARU] 5. Proses Update Customer
    Route::put('/customers/{id}', [AdminController::class, 'updateCustomer'])->name('admin.customers.update');

    // --- F. MODUL VEHICLE (KENDARAAN) ---
    // 1. Tampilkan Daftar Kendaraan
    Route::get('/vehicles', [AdminController::class, 'vehicles'])->name('admin.vehicles');
    // 2. Hapus Kendaraan
    Route::delete('/vehicles/{id}', [AdminController::class, 'deleteVehicle'])->name('admin.vehicles.delete');
    
    // [BARU] 3. Form Edit Kendaraan
    Route::get('/vehicles/{id}/edit', [AdminController::class, 'editVehicle'])->name('admin.vehicles.edit');
    // [BARU] 4. Proses Update Kendaraan
    Route::put('/vehicles/{id}', [AdminController::class, 'updateVehicle'])->name('admin.vehicles.update');

    // --- G. LOGOUT ---
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');

});