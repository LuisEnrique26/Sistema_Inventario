<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta_Detalle extends Model
{
    use HasFactory;

    protected $table = 'venta_detalle';
    protected $primaryKey = 'id_venta_detalle';
    protected $fillable = [
        'id_venta',
        'id_producto',
        'cantidad_venta_detalle'
    ];

}
