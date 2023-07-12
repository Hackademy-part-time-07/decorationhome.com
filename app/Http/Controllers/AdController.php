<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ad;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator;
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
            'success' => 'El anuncio ha sido guardado exitosamente. En cuanto lo revisemos será publicado.',
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
    $ads = Ad::where('is_accepted', 1)->latest()->paginate(9);

    $categoryName = null;
    $welcomeMessage = '¡Bienvenido/a! Estas son las últimas publicaciones';

    return view('ads', compact('ads', 'categoryName', 'welcomeMessage'));
}



public function showAdsByCategory($category)
{
    $categoryName = $category; // Obtener el nombre de la categoría para mostrar en la vista
    $category = Category::where('name', $category)->firstOrFail(); // Obtener el objeto de categoría
    $ads = $category->ads()->where('is_accepted', 1)->latest()->paginate(3); // Obtener los anuncios de la categoría con paginación
    return view('ads', compact('ads', 'categoryName'));
}



}
