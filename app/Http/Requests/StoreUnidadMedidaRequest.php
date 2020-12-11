<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Rule as ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUnidadMedidaRequest extends FormRequest
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
        return [
            'codigo'=>['required',Rule::unique('unidad_medidas')],
            'nombre'=>'required|unique:unidad_medidas'
        ];
    }

    public function messages()
    {
        return [
            'codigo.required'=>'Es necesario ingresar el código',
            'nombre.required'=>'Es necesario ingresar el nombre'
        ];
    }
}
