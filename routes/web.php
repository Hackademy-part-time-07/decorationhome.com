<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdController;
use App\Http\Livewire\CreateAd;
use App\Http\Controllers\HomeController;
use App\Models\Ad;
use App\Models\Category;

Route::get('/', function () {
    $ads = Ad::latest()->take(6)->get(); // Obtener los 6 últimos anuncios creados
    $categoryName = null; // Establecer el valor predeterminado para evitar el error
    $welcomeMessage = '¡Bienvenido/a! Estas son las últimas publicaciones'; // Mensaje de bienvenida
    return view('ads', compact('ads', 'categoryName', 'welcomeMessage')); // Pasar las variables a la vista
});   //home




Route::get('/ad/create', [AdController::class, 'create'])->name('create'); //metodo para llegar al form create
Route::post('/ad', [AdController::class, 'store'])->name('ad.store');//metodo crear ads
Route::get('/ads', [AdController::class, 'showAds'])->name('ads'); //metodo estilo index para visualizar ads.blade
Route::get('/ads/{category}', [AdController::class, 'showAdsByCategory'])->name('ads.category');//vista para ver ads.blade por categorias.
 
//////////

//Route::post('/ad/ads', [AdController::class, 'store'])->name('ads.store');
//Route::get('/ad', [AdController::class, 'showAds'])->name('ads');
//Route::get('/ads/{category}', [AdController::class, 'showAdsByCategory'])->name('ads.category');


