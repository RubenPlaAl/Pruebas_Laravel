<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;

class PedidosController extends Controller
{
    public function compras()
{
    $user = auth()->user();
    $pedidos = Pedido::where('user_id', $user->id)->with('items')->get();

    return view('store.compras', compact('pedidos'));
}
    
}
