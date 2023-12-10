<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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

//dd(request()->all());
        $categoryId = $this->route('category');
        return [
            "category"=> 'required|string|max:255|unique:categories,description,' .$categoryId,
            "parent_id" => 'required_with:is_sub'
            
        ];
    }
    public function messages()
{
    return [
        
        'category.required' => 'El campo Categoria es obligatorio.',
        'category.string' => 'El campo Categoria debe ser una cadena.',
        'category.max' => 'El campo Categoria no puede tener más de :max caracteres.',
        'category.unique'=>' Ya existe una categoria con ese nombre ',
        'parent_id.required_with' => __('main.must_select_a_parent_for_subcategories')
        
    ];
}
}
