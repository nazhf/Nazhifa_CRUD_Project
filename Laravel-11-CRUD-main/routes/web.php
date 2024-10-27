<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

// Rute untuk menampilkan daftar kontak
Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');

// Rute untuk menampilkan form tambah kontak
Route::get('/contact-form', function () {
    return view('contact-form'); // Pastikan ini sesuai dengan lokasi file Anda
})->name('contact-form');

// Rute untuk menyimpan data kontak
Route::post('/contacts', [ContactController::class, 'store'])->name('contacts.store');

// Rute untuk menampilkan form tambah kontak
Route::get('/edit-form', function () {
    return view('edit-form'); // Pastikan ini sesuai dengan lokasi file Anda
})->name('edit-form');

// Rute untuk menampilkan form edit kontak
Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.index');
Route::put('/contacts/{id}', [ContactController::class, 'update'])->name('contacts.update');

// Rute untuk menghapus kontak
Route::delete('/contacts/{id}', [ContactController::class, 'destroy'])->name('contacts.destroy');


Route::resource('contacts', ContactController::class);

// Rute untuk menampilkan form tambah kontak
Route::get('/contact-form', function () {
    return view('contact-form'); // Pastikan ini sesuai dengan lokasi file Anda
})->name('contact-form');

// Rute resource untuk kontak
Route::resource('contacts', ContactController::class);