<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateMachine extends FormRequest
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
        $name = $this->segment(3); // serve para buscar o 3 segmento no endereço http://larafood.test/admin/plans/plan30/edit no caso plan30
        

        return [
            'name' => "required|min:3|max:255|unique:machines,name,{$name},name",
            'description' => 'nullable|min:3|max:255',
        ];
    }
}
