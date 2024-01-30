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
       
        return [
            "name" => ['required','max:255',
                
            ],
            "price" => [
                'required',
                'regex:/^\d+\.\d{2}$/',
                'max:99999',
            ],
            "quantity" => "required|integer",
            "quantity_alert"=> "required|integer",
            "description"=> "required",
            "category_id"=> "required",
            'file' => 'getGalery'   
        ];
    }
    public function attributes(): array
    {
        return [
            'name'=>'nombre',
            'price'=>'precio',
            'quantity' => 'cantidad',
            'quantity_alert' => 'alerta de cantidad ',
            'description' => 'descripción',
            'category_id' => 'categoria',
        ];
    }
}
