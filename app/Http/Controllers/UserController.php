<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{

public function __construct(){
    $this->middleware('auth');
}
public function store(Request $request){
$image_id =  $request->input('image_id');   
$content = $request->input('content');

}
}
