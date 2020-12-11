<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Venta extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable =
    [
        'codigo_comprobante',
        'fecha_venta',
        'impuesto',
        'subtotal',
        'total',
        'cliente_id',
        'user_id'
    ];

    public function cliente(){
        return $this->belongsTo(Cliente::class)->withTrashed();
    }

    public function usuario(){
        return $this->belongsTo(User::class);
    }

    public function productos(){
        return $this->belongsToMany(Producto::class)->withTrashed();
    }

    public function generarCodigo(){

        $formato = "VNT-%010d";

        return sprintf($formato, $this->count()+1);
    }
}
