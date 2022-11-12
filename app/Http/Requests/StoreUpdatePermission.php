<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdatePermission extends FormRequest
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
        $id = $this->segment(3);
        //dd($id);
        // recupera o valor do terceiro item do arrei para exeção de poder atualizar com o mesmo nome 
        return [
            'name' => "required|min:3|max:255|unique:permissions,name,{$id},id", //O nome é unico na tabela de plano com exceção que o nome seja igual ao editado
            'description' => 'nullable|min:3|max:255',
        ];
    }
}
