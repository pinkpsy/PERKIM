<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\Mapcontroller;
use App\Http\Controllers\ProfileController; 
// use App\Http\Controllers\AboutController;
// use App\Http\Controllers\PermintaanPetaController;
use App\Http\Controllers\AduanController;
use App\Http\Controllers\AjuanController;
use App\Http\Controllers\CekStatusController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\SimulasiController;
use App\Http\Controllers\SimulasiRenovasiController;
use App\Http\Controllers\FaqController;
use Illuminate\Support\Facades\Route;

//Home
Route::get('/', [ArticleController::class, 'home'])->name('home');

//Profil
Route::get('/tugasfungsi', [ProfileController::class, 'tugasfungsi'])->name('tugasfungsi');
Route::get('/visimisi', [ProfileController::class, 'visimisi'])->name('visimisi');
Route::get('/strukturorganisasi', [ProfileController::class, 'struktur'])->name('strukturorganisasi');
Route::get('/pejabatstruktural', [ProfileController::class, 'pejabatstruktural'])->name('pejabatstruktural');

//Berita
Route::get('/article', [ArticleController::class, 'article'])->name('article');
Route::get('/article/{article:slug}', [ArticleController::class,'detail'])->name('article.detail');

//Dokumen
Route::get('/document', [DocumentController::class, 'document'])->name('document');

//Map
Route::get('/map', [Mapcontroller::class, 'map'])->name('map');

//Kontak
Route::get('/kontak', [ContactController::class, 'kontak'])->name('kontak');

//aduan Masyarakat
Route::get('/aduan', [AduanController::class, 'create'])->name('aduan.create');
Route::post('/aduan', [AduanController::class, 'store'])->name('aduan.store');
Route::get('/aduan/{id}/generate-pdf', [AduanController::class, 'generatePDF'])->name('aduan.generatePDF');


//ajuan instansi
Route::get('/ajuan', [AjuanController::class, 'create'])->name('ajuan.create');
Route::post('/ajuan', [AjuanController::class, 'store'])->name('ajuan.store');
Route::get('/ajuan/{id}/generate-pdf', [AjuanController::class, 'generatePDF'])->name('ajuan.generatePDF');

//cek status

Route::get('/cek-status', [CekStatusController::class, 'index'])->name('cek-status.form');
Route::post('/cek-status', [CekStatusController::class, 'check'])->name('cek-status.check');

Route::get('/pengembang', function () {
    return view('pengembang');
});

//simulasi
Route::get('/simulasire', [SimulasiRenovasiController::class, 'simulasire'])->name('simulasire');

//materi
Route::get('/materi', [MateriController::class, 'materi'])->name('materi');

Route::get('/simulasi', [SimulasiController::class, 'simulasi'])->name('simulasi');

Route::get('/faq', [FaqController::class, 'index'])->name('faq');