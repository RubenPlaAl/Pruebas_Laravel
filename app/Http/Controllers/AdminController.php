<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Image;
use App\Models\Comment;
use App\Models\Like;


class AdminController extends Controller
{
    public function mostrarUsuarios($search = null)
    {

        if (!empty($search)) {
            $users = User::where('name', 'LIKE', '%' . $search . '%')
                ->orderBy('id', 'asc')
                ->paginate(5);
                

                return view('profile.index', [
                    'users' => $users
                ]);
        } else {
            $users = User::orderBy('id', 'asc')->paginate(5);

            return view('admin.borrar-usuarios', [
                'users' => $users
            ]);
        }
    }
    public function destroy($id)
{
    $user = User::findOrFail($id);
    $images = Image::where('user_id', $user->id)->get();

    // Eliminar las imágenes del usuario, excepto 'no-foto.jpg'
    foreach ($images as $image) {
        if ($image->image !== 'no-foto.jpg') {
            Like::where('image_id', $image->id)->delete();
            $image->delete();
        }
    }

    Comment::where('user_id', $user->id)->delete();
    Like::where('user_id', $user->id)->delete();
    $user->delete();
    
    return redirect()->route('admin.borrar-usuarios')->with('success', 'Usuario y sus datos relacionados eliminados correctamente.');
}

    
    
    
}
