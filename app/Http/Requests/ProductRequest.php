<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
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
        // $productid = $this->route('product');
        return [
            "name" => [
                'required',
                'max:255',
                // Rule::unique('oferts', 'name')->ignore($productid),
            ],
            "price" => "required|integer|max:999",
            "quantity" => "required|integer",
            "quantity_alert"=> "required|integer",
            "description"=> "required",
            "category_id"=> "required",
        ];
    }
    public function messages()
{
    return [
        
        'name.required' => 'El campo Nombre es obligatorio.',
        'name.max' => 'El campo Nombre no puede tener más de :max caracteres.',
        'name.unique'=>' Ya existe una Nombre con ese nombre ',
        'price.required' => 'El campo precio es obligatorio.',
        'price.integer' => 'El campo precio debe ser un numero.',
        'price.max' => 'El campo precio no puede tener más de :max caracteres.',
        'quantity.required'=> 'El campo cantidad es obligatorio.',
        'quantity.integer'=> 'El campo cantidad debe ser un numero.',
        'quantity_alert.required'=> 'El campo cantidad Alerta es obligatorio.',
        'quantity_alert.integer'=> 'El campo cantidad Alerta debe ser un numero.',
        'description.required'=> 'El campo descripción es obligatorio.',
        'category_id.required'=> 'Seleccionar una categoria es obligatorio.',
        
    ];
}
}
