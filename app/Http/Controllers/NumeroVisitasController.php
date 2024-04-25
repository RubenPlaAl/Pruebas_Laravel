<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Shetabit\Visitor\Traits\Visitor;
use Shetabit\Visitor\Models\Visit;
use WhichBrowser\Parser;




class NumeroVisitasController extends Controller
{
    public function mostrar(Request $request)
    {
        // Obtener todas las visitas
        $visitas = Visit::orderBy('created_at', 'desc')->paginate(50);
    
        // Inicializar un array para almacenar los datos de las visitas
        $datosVisitas = [];
    
        // Iterar sobre cada visita para obtener información del navegador
        foreach ($visitas as $visita) {
            $userAgent = $visita->user_agent;

            // Crear un nuevo objeto Parser con el agente de usuario
            $parser = new Parser($userAgent);
    
            // Obtener información sobre el navegador
            $browser = $request->visitor()->browser();
    
            // Obtener la IP del visitante
            $ip = $visita->ip;
    
            // Obtener la página visitada
            $paginaVisitada = $visita->url;
    
            // Obtener la fecha de la visita
            $fecha = $visita->created_at->toDateTimeString();
    
            // Agregar los datos de la visita al array
            $datosVisitas[] = [
                'ip' => $ip,
                'navegador' => $browser,
                'pagina_visitada' => $paginaVisitada,
                'fecha' => $fecha
            ];
        }
    
        // Contar el número de visitas
        $numeroVisitas = $visitas->total();
    
        // Renderizar la vista con los datos
        return view('admin.numero-visitas', compact('visitas'));
    }
}
    

