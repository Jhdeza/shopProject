<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ofertRequest extends FormRequest
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
        $ofertid = $this->route('ofert');
        return [
            "nombre"=> "required|max:255|unique:oferts,name,' .$ofertid,",
            "descuento"=> "required|integer|max:2,' .$ofertid,",
        ];
    }
    public function messages()
{
    return [
        
        'nombre.required' => 'El campo Nombre es obligatorio.',
        'nombre.max' => 'El campo Nombre no puede tener más de :max caracteres.',
        'nombre.unique'=>' Ya existe una Nombre con ese nombre ',

        'descuento.required' => 'El campo (porciento de descuento) es obligatorio.',
        'descuento.integer' => 'El campo (porciento de descuento) debe ser un numero.',
        'descuento.max' => 'El campo (porciento de descuento) no puede tener más de :max caracteres.',
        
    ];
}
}
