<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Juego;
use App\Models\User;

class StoreController extends Controller
{
    public function crear()
    {
        return view('store.crear');
    }


    public function save(Request $request)
    {
        $this->validate($request, [
            'image_path' => 'required|image',
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required',
            'stock' => 'required',
        ]);

        $caratula = $request->file('image_path');
        $nombre = $request->input('nombre');
        $descripcion = $request->input('descripcion');
        $precio = $request->input('precio');
        $stock = $request->input('stock');
     
        $juego = new Juego();
        $juego->nombre = $nombre; 
        $juego->descripcion = $descripcion;
        $juego->precio = $precio;
        $juego->stock = $stock;
      

        if ($caratula) {
            $image_path_name = time() . $caratula->getClientOriginalName();
            Storage::disk('images')->put($image_path_name, File::get($caratula));
            $juego->caratula = $image_path_name;
        }
        $juego->save();

        return redirect()->route('store')->with([
            'success' => 'El producto se ha subido a la tienda correctamente'
        ]);
    }

    public function show()
    {
        $juegos = Juego::orderBy('id', 'desc')->paginate(6);

        return view('store.show', [
            'juegos' => $juegos
        ]);
    }

    public function getImage($filename)
    {
        $file = Storage::disk('images')->get($filename);
        return new Response($file, 200);
    }

    public function detail($id)
    {
        $juego = Juego::find($id);

        return view('store.detalles', [
            'juego' => $juego
        ]);
    }

}
