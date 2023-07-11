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
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validación para la imagen
    ]);

    $user = Auth::user();
    $adData['user_id'] = $user->id;

    // Procesar la imagen si se ha subido
    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->storeAs('public/images', $imageName);
        $adData['image'] = $imageName; // Guardar el nombre de archivo en la columna 'image'
    }

    Ad::create($adData);

    $categoryName = null; // Establecer el valor predeterminado para evitar el error

    return redirect()->route('ads')->with([
        'success' => 'El anuncio ha sido guardado exitosamente.',
        'categoryName' => $categoryName
    ]);
}



public function show($id)
{
    $ad = Ad::find($id);

    if (!$ad) {
        abort(404);
    }

    return view('ad.show', compact('ad'));
}

public function showAds()
{
    if (request()->is('/')) {
        $slicedAds = Ad::latest()->take(6)->get();
        $ads = collect([]); // Crear una colección vacía para el paginador
    } else {
        $ads = Ad::latest()->paginate(10);
        $slicedAds = $ads->take(10);
    }

    $categoryName = null; // Establecer el valor predeterminado para evitar el error
    $welcomeMessage = '¡Bienvenido/a! Estas son las últimas publicaciones'; // Mensaje de bienvenida

    return view('ads', compact('slicedAds', 'categoryName', 'welcomeMessage'))->with('ads', $ads);
}

public function showAdsByCategory($category)
{
    $ads = Ad::whereHas('category', function ($query) use ($category) {
        $query->where('name', $category);
    })->paginate(6);

    $slicedAds = $ads->take(6);

    $categoryName = Category::where('name', $category)->value('name');

    return view('ads', compact('slicedAds', 'categoryName'))->with('ads', $ads);
}

}   
