<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemCarrito extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'carrito_id',
        'juego_id',
        'cantidad',
    ];

    public function carrito()
    {
        return $this->belongsTo(Carrito::class);
    }

    public function juego()
    {
        return $this->belongsTo(Juego::class);
    }
}
