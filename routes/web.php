<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdController;
use App\Http\Livewire\CreateAd;
use App\Http\Controllers\HomeController;

Route::get('/', function () {
    return view('home');
});


Route::get('/ad/create', [AdController::class, 'create'])->name('create');
Route::post('/ad', [AdController::class, 'store'])->name('ad.store');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::post('/ad/ads', [AdController::class, 'store'])->name('ads.store');
Route::get('/ad', [AdController::class, 'showAds'])->name('ads');

Auth::routes();

