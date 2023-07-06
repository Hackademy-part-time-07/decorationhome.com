<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ad;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class AdController extends Controller
{
    public function create()
    {
        $categories = Category::all();
        return view('ad.create', compact('categories'));
    }

    public function store(Request $request)
{
    $adData = $request->validate([
        'title' => 'required',
        'body' => 'required',
        'price' => 'required|numeric',
        'category_id' => 'required|exists:categories,id',
    ]);

    $user = Auth::user();
    $adData['user_id'] = $user->id;

    Ad::create($adData);
    
    $categoryName = null; // Establecer el valor predeterminado para evitar el error
    
    return redirect()->route('ads')->with([
        'success' => 'El anuncio ha sido guardado exitosamente.',
        'categoryName' => $categoryName
    ]);
}

public function showAds()
{
    $ads = Ad::all();
    $categoryName = null;
    $showCategories = true; // Variable para controlar la visualización de "Todas las Categorías"

    return view('ads', compact('categoryName', 'ads', 'showCategories'));
}


    public function showAdsByCategory($category)
{
    // Obtén los anuncios de la categoría
    $ads = Ad::whereHas('category', function ($query) use ($category) {
        $query->where('name', $category);
    })->get();

    // Obtén el nombre de la categoría
    $categoryName = Category::where('name', $category)->value('name');

    // Pasar los datos a la vista
    return view('ads', [
        'categoryName' => $categoryName,
        'ads' => $ads,
        'pageTitle' => $categoryName, // Establecer el valor del título de la página
    ]);
}




}
