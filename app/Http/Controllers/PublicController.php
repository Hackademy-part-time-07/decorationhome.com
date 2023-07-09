<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Ad;
use Illuminate\Support\Facades\View;


class PublicController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        View::share('categories', $categories);

        $ads = Ad::where('is_accepted', 1)->get();

        return view('ads', compact('ads'));
    }
}

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

