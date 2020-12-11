<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateRoleRequest extends FormRequest
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
            'name'=>['required','regex:/^[a-zA-Z\s]+$/',Rule::unique('roles')->ignore($this->role)],
            'permisos'=>'required'
        ];
    }


    public function messages()
    {
        return [
            'permisos.required'=>'Debe seleccionar al menos un permiso.',
            'name.required' =>'Debe ingresar un rol',
            'name.regex' =>'El rol solo debe contener letras.',
        ];
    }
}
