<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ad;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;


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
    $adsQuery = Ad::where('is_accepted', 1)->latest();

    $ads = $adsQuery->paginate(6);
    $slicedAds = $adsQuery->take(6)->get();

    $categoryName = null; // Establecer el valor predeterminado para evitar el error
    $welcomeMessage = '¡Bienvenido/a! Estas son las últimas publicaciones'; // Mensaje de bienvenida

    return view('ads', compact('slicedAds', 'categoryName', 'welcomeMessage'))->with('ads', $ads);
}


    public function showAdsByCategory($category)
    {
        $ads = Ad::where('is_accepted', 1)->whereHas('category', function ($query) use ($category) {
            $query->where('name', $category);
        })->paginate(6);

        $slicedAds = $ads->take(6);

        $categoryName = Category::where('name', $category)->value('name');

        return view('ads', compact('slicedAds', 'categoryName'))->with('ads', $ads);
    }
}
