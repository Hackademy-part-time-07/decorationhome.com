<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdController;
use App\Http\Livewire\CreateAd;
use App\Http\Controllers\HomeController;
use App\Models\Ad;
use App\Models\Category;

Route::get('/', function () {
    $ads = Ad::latest()->take(6)->get(); // Obtener los 6 últimos anuncios creados
    return view('ads', compact('ads')); // Pasar la variable $ads a la vista
});


Route::get('/ad/create', [AdController::class, 'create'])->name('create');
Route::post('/ad', [AdController::class, 'store'])->name('ad.store');
Route::post('/ad/ads', [AdController::class, 'store'])->name('ads.store');
//Route::get('/ad', [AdController::class, 'showAds'])->name('ads');
//Route::get('/ads/{category}', [AdController::class, 'showAdsByCategory'])->name('ads.category');
Route::get('/ads', [AdController::class, 'showAds'])->name('ads');
Route::get('/ads/{category}', [AdController::class, 'showAdsByCategory'])->name('ads.category');



