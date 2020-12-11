<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCategoriaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre' => ['required', 'string', 'min:2',Rule::unique('categorias')->ignore($this->categoria)->whereNull('deleted_at')],
        ];
    }

    public function messages()
    {
        return [
            'min'=>'El nombre debe de tener minimo :min caractéres',
        ];
    }
}
