<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdController;
use App\Http\Controllers\RevisorController;
use App\Http\Controllers\PublicController;
use App\Http\Middleware\SetLocalMiddleware;
use App\Http\Livewire\CreateAd;
use App\Http\Controllers\HomeController;
use App\Models\Ad;
use App\Models\Category;
use App\Models\User;


Route::get('/', function () {
    $ads = Ad::where('is_accepted', 1)->latest()->paginate(6); // Obtener los últimos anuncios aceptados con paginación
    $categoryName = null; // Establecer el valor predeterminado para evitar el error
    $welcomeMessage = '¡Bienvenido/a! Estas son las últimas publicaciones de nuestros vendedores'; // Mensaje de bienvenida
    return view('ads', compact('ads', 'categoryName', 'welcomeMessage')); // Pasar las variables a la vista
});



Route::get('/request-reviewer', function () {
    return view('request_reviewer');
})->name('request.reviewer');

Route::post('/request-reviewer', [PublicController::class, 'requestReviewer'])->name('request.reviewer');



Route::get('/ad/create', [AdController::class, 'create'])->name('create'); //metodo para llegar al form crear
Route::post('/ad', [AdController::class, 'store'])->name('ad.store');//metodo crear ads
Route::get('/ads', [AdController::class, 'showAds'])->name('ads'); //metodo, estilo index, para visualizar ads.blade
Route::get('/ads/{category}', [AdController::class, 'showAdsByCategory'])->name('ads.category');//para ver ads.blade por categorias.
Route::get('/ad/{id}', [AdController::class, 'show'])->name('ad.show');


Route::get('/dashboard', [RevisorController::class, 'dashboard'])->name('dashboard');
Route::post('/dashboard/{id}', [RevisorController::class, 'updateRole'])->name('dashboard.updateRole');
Route::get('/dashboardrevisor', [RevisorController::class, 'dashboardRevisor'])->name('dashboardrevisor');
Route::post('/dashboardrevisor/{id}', [RevisorController::class, 'update'])->name('dashboardrevisor.update');
Route::delete('/users/{id}', [RevisorController::class, 'destroyUser'])->name('dashboard.destroyUser');
Route::get('/locale/{locale}', [PublicController::class, 'setLocale'])->name('locale.setLocale');

Route::delete('/dashboardrevisor/delete/{id}', [RevisorController::class, 'destroyAd'])->name('dashboardrevisor.destroyAd');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


