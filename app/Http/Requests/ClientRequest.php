<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
            "name" => ['required','max:255',],
            'email_address'=>"required|email",
            'client_phone'=>['required','regex:/^(\+[0-9]{0,3}|\+[0-9]{1,3}\s)?([0-9]{8,9})$/'],
            'message'=>'required|string',
        ];
    }

    public function attributes(): array
    {
        return [
            'name'=>'nombre',
            'email_address' => 'email',
            'client_phone' => 'telefono',
            'message' => 'mensaje',
        ];
    }
}
