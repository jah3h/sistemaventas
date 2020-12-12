<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class UnidadMedida extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'nombre','codigo'
    ];

    public function productos(){
        return $this->hasMany(Producto::class,'unidad_medida_id','id');
    }
}
