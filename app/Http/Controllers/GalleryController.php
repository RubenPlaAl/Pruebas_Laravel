<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class GalleryController extends Controller
{
    public function index()
{
    // Obtener la lista de archivos en la carpeta public
    $files = Storage::files('public/gallery');

    // Filtrar solo las imágenes
    $images = [];
    foreach ($files as $file) {
        if (preg_match('/\.(jpg|jpeg|png|gif)$/i', $file)) {
            $images[] = $file;
        }
    }

    return view('gallery', ['images' => $images]);
}
}
