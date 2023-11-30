<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto_Proveedor extends Model
{
    use HasFactory;

    protected $table = 'producto_proveedor';
    protected $primaryKey  = 'id_producto_proveedor';
    protected $fillable = [
        'id_producto',
        'id_proveedor',
        'id_usuario',
        'fecha',
        'costo',
        'cantidad'
    ];
}
