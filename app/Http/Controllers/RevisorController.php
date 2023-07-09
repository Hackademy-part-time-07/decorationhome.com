<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ad;


class RevisorController extends Controller
{
    public function dashboard(Request $request)
    {
        $query = User::query();

        // Verificar si se envió un valor de búsqueda
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('name', 'LIKE', "%$search%");
        }

        // Obtener los últimos diez usuarios registrados en la base de datos
        $users = $query->latest()->take(10)->get();


        // Retornar la vista del panel de revisor con los datos necesarios
        return view('dashboard', ['users' => $users]);
    }

    public function updateRole(Request $request, $id)

{
    // Obtener el usuario a partir del ID
    $user = User::findOrFail($id);
    
    // Actualizar los roles del usuario según los valores enviados en el formulario
    $user->is_revisor = $request->has('is_revisor') ? 1 : 0;
    $user->save();
    
    // Redirigir de vuelta al dashboard o a la página que desees
    return redirect()->route('dashboard')->with('success', 'Roles actualizados exitosamente.');
}

public function dashboardRevisor()
{
    $ads = Ad::all();
    return view('dashboard.dashboardrevisor', compact('ads'));
}


public function update(Request $request, $id)
{
    // Obtener el anuncio a partir del ID
    $ad = Ad::findOrFail($id);
    
    // Actualizar los datos del anuncio según los valores enviados en el formulario
    $ad->title = $request->input('title');
    $ad->body = $request->input('body');
    $ad->price = $request->input('price');
    // Actualizar otros campos según sea necesario
    
    $ad->save();
    
    // Redirigir de vuelta al dashboard o a la página que desees
    return redirect()->route('dashboardrevisor')->with('success', 'Anuncio actualizado exitosamente.');
}
}

