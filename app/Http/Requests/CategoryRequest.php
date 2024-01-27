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
        $categoryId = $this->route('category');
        return [
            "name"=> 'required|string|max:255|unique:categories,name,' .$categoryId,
            "parent_id" => 'required_with:is_sub',
            'file' => 'image'            
        ];
    }
    public function attributes(): array
    {
        return [
            'name'=>'nombre',
            'parent_id' => 'categoria',
            
        ];
    }
}
