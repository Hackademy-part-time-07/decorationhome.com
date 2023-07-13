<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ad;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;




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

    // Obtener los usuarios paginados en grupos de 5
    $users = $query->latest()->paginate(5);

    // Retornar la vista del panel de revisor con los datos necesarios
    return view('dashboard', ['users' => $users]);
}


public function updateRole(Request $request, $id)
{
    // Obtener el usuario a partir del ID
    $user = User::findOrFail($id);

    // Verificar si el usuario que realiza la solicitud tiene el atributo is_admin igual a 1
    if (Auth::user()->is_admin == 1) {
        // Actualizar los roles del usuario según los valores enviados en el formulario
        $user->is_revisor = $request->has('is_revisor') ? 1 : 0;
        $user->is_admin = $request->has('is_admin') ? 1 : 0;
        $user->save();

        // Redirigir de vuelta al dashboard o a la página que desees
        return redirect()->route('dashboard')->with('success', 'Roles actualizados exitosamente.');
    }

    // Si el usuario que realiza la solicitud no tiene permisos de administrador, mostrar un mensaje de error o redirigir a una página de error
    return redirect()->route('dashboard')->with('error', 'No tienes permiso para actualizar los roles.');
}

    public function dashboardRevisor(Request $request)
{
    $filter = $request->input('filter');

    $query = Ad::query();

    if ($filter == 'accepted') {
        $query->where('is_accepted', 1);
    } elseif ($filter == 'not_accepted') {
        $query->where(function ($query) {
            $query->where('is_accepted', 0)
                ->orWhereNull('is_accepted');
        });
    }

    $ads = $query->latest()->paginate(6);

    return view('dashboard.dashboardrevisor', compact('ads', 'filter'));
}

    


public function update(Request $request, $id)
{
    // Obtener el anuncio a partir del ID
    $ad = Ad::findOrFail($id);

    // Actualizar los datos del anuncio según los valores enviados en el formulario
    $ad->title = $request->input('title');
    $ad->body = $request->input('body');
    $ad->price = $request->input('price');

    // Procesar la imagen si se ha subido
    if ($request->hasFile('image')) {
        // Eliminar la imagen existente si la hay
        if ($ad->image) {
            Storage::delete('public/images/' . $ad->image);
        }

        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->storeAs('public/images', $imageName);
        $ad->image = $imageName;
    }

    // Verificar si se marcó la casilla "Eliminar imagen"
    if ($request->has('delete_image')) {
        // Eliminar la imagen existente
        if ($ad->image) {
            Storage::delete('public/images/' . $ad->image);
            $ad->image = null;
        }
    }

    // Actualizar el campo is_accepted si se envió en el formulario
    if ($request->has('is_accepted')) {
        $ad->is_accepted = $request->input('is_accepted');
    } else {
        $ad->is_accepted = null; // Si no se envió, se establece como null
    }

    // Actualizar otros campos según sea necesario

    $ad->save();

    // Obtener el valor del filtro actual desde la solicitud
    $filter = $request->input('filter');

    // Redirigir de vuelta al dashboard con el filtro aplicado
    return redirect()->route('dashboardrevisor', ['filter' => $filter])->with('success', 'Anuncio actualizado exitosamente.');
}


public function destroyUser($id)
{
    // Obtener el usuario a eliminar
    $user = User::findOrFail($id);

    // Realizar la eliminación del usuario
    $user->delete();

    // Redirigir de vuelta al dashboard o a la página que desees
    return redirect()->route('dashboard')->with('success', 'Usuario eliminado exitosamente.');
}

public function destroyAd($id)
{
    // Obtener el anuncio a eliminar
    $ad = Ad::findOrFail($id);

    // Realizar la eliminación del anuncio
    $ad->delete();

    // Redirigir de vuelta al dashboard o a la página que desees
    return redirect()->route('dashboardrevisor')->with('success', 'Anuncio eliminado exitosamente.');
}




}

