<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateTool extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        $id = $this->segment(2); // serve para buscar o 3 segmento no endereço http://controleferramentas.test/machines/3/ no caso 3 que a ID
        

        return [
            'name' => "required|min:3|max:255|unique:tools,name,{$id},id",
            'description' => 'nullable|min:3|max:255',
            'code_system' => 'required|min:3|max:255',
            'supplier' => 'nullable|min:3|max:255',
        ];
    }
}
