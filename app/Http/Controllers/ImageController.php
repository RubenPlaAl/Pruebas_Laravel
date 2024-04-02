<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;

class ImageController extends Controller
{
    public function create()
    {
        return view('image.create');
    }
    public function save(Request $request)
    {
        $this->validate($request, [
            'description' => 'required',
            'image_path' => 'required|image'
        ]);

        $image_path = $request->file('image_path');
        $description = $request->input('description');
        $user = auth()->user();
        $image = new Image();
        $image->user_id = $user->id;
        $image->description = $description;

        if ($image_path) {
            $image_path_name = time() . $image_path->getClientOriginalName();
            Storage::disk('images')->put($image_path_name, File::get($image_path));
            $image->image_path = $image_path_name;
        }
        $image->save();

        return redirect()->route('forum')->with([
            'message' => 'El tema se ha subido al foro correctamente'
        ]);
    }
    public function show()
    {
        $images = Image::orderBy('id', 'desc')->paginate(5);
        
        return view('image.show', [
            'images' => $images
        ]);
    }
    public function getImage($filename){
        $file = Storage::disk('images')->get($filename);
        return new Response($file, 200);
    }
    public function detail($id){
        $image = Image::find($id);

        return view('image.detail', [
        'image' => $image
        ]);
    }
}
