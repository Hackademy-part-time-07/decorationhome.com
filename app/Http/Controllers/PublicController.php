<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\View;


class PublicController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        View::share('categories', $categories);
        return view('ads');
    }
}

