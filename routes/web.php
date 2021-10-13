<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ModulController;
use App\Http\Controllers\AdminYonetim;
Route::get('/', function () {
    return view('welcome');
});

Route::get("/yonetim",[AdminYonetim::class,'home'])->name("home");

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get("/yonetim/moduller",[ModulController::class,"index"])->name("moduller");
Route::post("/yonetim/modul-ekle",[ModulController::class,"modulekle"])->name("modul-ekle");
Route::get("/yonetim/liste/{modul}",[AdminYonetim::class,"liste"])->name("liste");
Route::get("/yonetim/ekle/{modul}",[AdminYonetim::class,"ekle"])->name("ekle");
Route::post("/yonetim/ekle-post/{modul}",[AdminYonetim::class,"eklePost"])->name("eklepost");
