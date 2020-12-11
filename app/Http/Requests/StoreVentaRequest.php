<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVentaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'codigo_comprobante'=>'required',
            'fecha_venta'=>'required',
            'cliente_id'=>'required',
            'user_id'=>'required',
            'subtotal'=>'required',
            'impuesto'=>'required',
            'total'=>'required',
            'ordenProductos.*.producto_id' => 'required',
            'ordenProductos.*.cantidad' => 'Required',
            'ordenProductos'=> 'required'
        ];

        return $rules;
    }

    public function messages()
    {
        return [

        ];
    }

    
}
