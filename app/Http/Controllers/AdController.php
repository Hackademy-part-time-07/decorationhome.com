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

        return redirect()->route('ads')->with('success', 'El anuncio ha sido guardado exitosamente.');
    }

    public function showAds()
    {
        $ads = Ad::all();
        return view('ads', ['ads' => $ads]);
    }
}
