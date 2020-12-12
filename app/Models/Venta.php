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
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function productos(){
        return $this->belongsToMany(Producto::class)->withTrashed()->withPivot('cantidad', 'subtotal');
    }

    public function generarCodigo(){

        $formato = "VNT-%010d";

        return sprintf($formato, $this->withTrashed()->get()->count()+1);
    }


}
