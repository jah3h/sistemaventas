<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateClienteRequest extends FormRequest
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
            'nombres' => ['required', 'string', 'min:2','max:100','regex:/^[a-zA-Z\s]+$/'],
            'dni'=>['required','digits:8',Rule::unique('clientes')->ignore($this->cliente)],
            'fecha_nacimiento'=>['required', 'date'],
            'email'=>'required|email:rfc',
            'telefono'=>'required|digits_between:5,13'
        ];
    }
}
