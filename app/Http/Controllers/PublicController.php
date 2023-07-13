<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Mail;
use App\Mail\RequestReviewer;
use Illuminate\Support\Facades\Auth;

class PublicController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        View::share('categories', $categories);
        return view('ads');
    }

    public function requestReviewer(Request $request)
    {
        $data = [
            'name' => Auth::user()->name,
            'email' => Auth::user()->email,
            'message' => $request->input('message')
        ];
    
        $recipientEmail = 'your-email@example.com'; // Reemplaza esto con la dirección de correo del destinatario
    
        Mail::raw($data['message'], function ($message) use ($data, $recipientEmail) {
            $message->to($recipientEmail)
                ->subject('Solicitud de Revisor')
                ->from($data['email'], $data['name']);
        });
    
        return redirect()->back()->with('success', 'Tu solicitud ha sido enviada correctamente.');
    }



    public function setLocale($locale)
    {
        session()->put('locale', $locale);
        return redirect()->back();
    }
}
