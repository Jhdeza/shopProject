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
            "nombre"=> "required|string|max:255|unique:oferts,name,' .$ofertid,",
        ];
    }
    public function messages()
{
    return [
        
        'Nombre.required' => 'El campo Nombre es obligatorio.',
        'Nombre.string' => 'El campo Nombre debe ser una cadena.',
        'Nombre.max' => 'El campo Nombre no puede tener más de :max caracteres.',
        'Nombre.unique'=>' Ya existe una Nombre con ese nombre ',
        
    ];
}
}
