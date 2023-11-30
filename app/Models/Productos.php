<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;

    protected $table = 'productos';
    protected $primaryKey = 'id_producto';
    protected $fillable = [
        'id_proveedor',
        'nombre_producto',
        'stock_producto',
        'descripcion_producto',
        'precio_producto'
    ];

}