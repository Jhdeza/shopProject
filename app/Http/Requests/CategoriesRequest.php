<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoriesRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        $categoryId = $this->route('category');
        return [
            "Categoria"=> 'required|string|max:255|unique:categories,description,' .$categoryId,
            
        ];
    }
    public function messages()
{
    return [
        
        'Categoria.required' => 'El campo Categoria es obligatorio.',
        'Categoria.string' => 'El campo Categoria debe ser una cadena.',
        'Categoria.max' => 'El campo Categoria no puede tener más de :max caracteres.',
        'Categoria.unique'=>' Ya existe una categoria con ese nombre ',
        
    ];
}
}
