<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductoRequest extends FormRequest
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
            'nombre' => ['required',Rule::unique('productos')->ignore($this->producto)->whereNull('deleted_at')],
            'precio' => 'required|regex:/^\d+(\.\d{1,2})?$/',
            'categoria_id' => 'required',
            'unidad_medida_id' => 'required',
        ];
    }
}
