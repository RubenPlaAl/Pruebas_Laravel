<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use App\Models\Comment;
use App\Models\Like;

use function Laravel\Prompts\alert;

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
        $user = Auth::user();
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
            'success' => 'El tema se ha subido al foro correctamente'
        ]);
    }
    public function show()
    {
        $images = Image::orderBy('id', 'desc')->paginate(5);

        return view('image.show', [
            'images' => $images
        ]);
    }
    public function getImage($filename)
    {
        $file = Storage::disk('images')->get($filename);
        return new Response($file, 200);
    }
    public function detail($id)
    {
        $image = Image::find($id);

        return view('image.detail', [
            'image' => $image
        ]);
    }
    public function delete($id)
    {
        $user = auth()->user();
        $image = Image::find($id);
        $comments = Comment::where('image_id', $id)->get();
        $likes = Like::where('image_id', $id)->get();

        if (isset($user) && ($image->user->id === $user->id) || auth()->user()->role == 'admin') {
            if ($comments && count($comments) >= 1) {
                foreach ($comments as $comment) {
                    $comment->delete();
                }
            }
            if ($likes && count($likes) >= 1) {
                foreach ($likes as $like) {
                    $like->delete();
                }
            }
            Storage::disk('images')->delete($image->image_path);

            $image->delete();
        }
        return redirect()->route('image.show')
                ->with(['success' => 'Imagen borrada con exito']);

    }
    public function edit($id)
    {
        $user = auth()->user();
        $image = Image::find($id);

        if (isset($user) && ($image->user->id === $user->id)) {
            return view('image.edit', [
                'image' => $image
            ]);
        } else {
            return redirect()->route('image.show')
            ->with(['success' => 'Imagen editada con exito']);

        }
    }
    public function update(Request $request)
    {

        $this->validate($request, [
            'description' => 'required',
            'image_path' => 'image'
        ]);


        $image_id = $request->input('image_id');
        $image_path = $request->file('image_path');
        $description = $request->input('description');
        alert($description);

        $image = Image::find($image_id);
        $image->description = $description;

        if ($image_path) {
            $image_path_name = time() . $image_path->getClientOriginalName();
            Storage::disk('images')->put($image_path_name, File::get($image_path));
            $image->image_path = $image_path_name;
        }
        $image->update();
        return redirect()->route('image.detail', ['id' => $image_id])
            ->with(['success' => 'Imagen actualizada con exito']);
    }
}
