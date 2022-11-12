<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class StoreCreatePermission extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|min:3|max:255|unique:permissions', //O nome é unico na tabela de plano com exceção que o nome seja igual ao editado
            'description' => 'nullable|min:3|max:255',
        ];
    }
}
