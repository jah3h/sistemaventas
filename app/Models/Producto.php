<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'nombre','precio','unidad_medida_id','categoria_id'
    ];

    public function categoria(){
        return $this->belongsTo(Categoria::class,'categoria_id','id')->withTrashed();
    }

    public function unidadMedida(){
        return $this->belongsTo(UnidadMedida::class,'unidad_medida_id','id')->withTrashed();
    }

    public function ventas(){
        return $this->belongsToMany(Venta::class)->withTrashed();
    }
}
