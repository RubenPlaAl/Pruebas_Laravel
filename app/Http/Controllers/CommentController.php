<?php

namespace App\Http\Controllers;
use  App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


use function Laravel\Prompts\alert;

class CommentController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    public function save(Request $request){

       $validate = $this->validate($request, [
        'image_id' => 'integer|required',
        'content' => 'string | required'
       ]);
        //Recoger los datos del formullario

        $user = auth()->user();
        $image_id = $request->input('image_id');
        $content = $request->input('content');

        $comment = new Comment();
        $comment->user_id = $user->id;
        $comment->image_id = $image_id;
        $comment->content = $content;
        $comment->save();
        return redirect()->route('image.detail', ['id' => $image_id]);
    }
  
}
