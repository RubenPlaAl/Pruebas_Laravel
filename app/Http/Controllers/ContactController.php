<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormSubmitted;


class ContactController extends Controller
{
    public function sendContactEmail(Request $request)
    {
        $name = $request->input('name');
        $email = Auth::user()->email; 
        $pregunta = $request->input('question');

      
        // Envía el correo electrónico
        Mail::to('plar.hub.store@gmail.com')->send(new ContactFormSubmitted($name, $email, $pregunta));
    
        return redirect()->route('dashboard')->with('success', '¡El mensaje se ha enviado correctamente!');
    }
    
}
