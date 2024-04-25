<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  App\Models\Juego;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Mail;
use App\Mail\CompraRealizada;
use App\Models\Pedido;
use App\Models\ItemPedido;





class CartController extends Controller
{
    public function add(Request $request)
    {
        $juego = Juego::find($request->id);
        if (empty($juego))
            return redirect('store.show');

        Cart::add([
            'id' => $juego->id,
            'name' => $juego->nombre,
            'qty' => 1,
            'price' => $juego->precio,
            'weight' => 0,
            'options' => [
                'image' => $juego->caratula,
                'user_id' => auth()->id(),
            ]
        ]);
        return redirect('store/show')->with("success", "Item agregado: " . $juego->nombre);
    }

    public function checkout()
    {
        return view('store.checkout');
    }

    public function removeItem(Request $request)
    {
        Cart::remove($request->rowId);
        return redirect('cart/checkout')->with("success", "Item eliminado! ");
    }

    public function clear()
    {
        Cart::destroy();
        return redirect('cart/checkout')->with("success", "Carrito Vaciado! ");
    }

    public function comprar()
    {
        $cartContent = Cart::content();
        $user = auth()->user();
        $userEmail = auth()->user()->email;


        // Crear un nuevo pedido
        $pedido = new Pedido();
        $pedido->user_id = $user->id;
        $pedido->save();

        // Guardar los elementos del carrito como ítems de pedido
        foreach ($cartContent as $item) {
            $juego = Juego::find($item->id); // Recuperar el juego correspondiente
            if ($juego) {
                $itemPedido = new ItemPedido();
                $itemPedido->pedido_id = $pedido->id;
                $itemPedido->juego_id = $item->id;
                $itemPedido->nombre = $juego->nombre; // Asignar el nombre del juego al ítem de pedido
                $itemPedido->caratula = $juego->caratula; // Asignar la carátula del juego al ítem de pedido
                $itemPedido->cantidad = $item->qty;
                $itemPedido->save();
            }
        }


        Mail::to($userEmail)->send(new CompraRealizada($cartContent));


        //Ahora se vacia el carrito y se reduce el Stock de los Juegos 
        Cart::destroy();
        foreach ($cartContent as $item) {
            $juego = Juego::find($item->id);
            if ($juego) {
                $juego->stock -= $item->qty;
                $juego->save();
            }
        }
        return redirect('store/show')->with("success", "¡Gracias por tu compra! Los detalles se han enviado correctamente a tu correo electrónico.");
    }
}
