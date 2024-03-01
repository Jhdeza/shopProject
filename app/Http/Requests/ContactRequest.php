<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            "name_contact" =>'required|string|max:255',
            'address_contacts'=>'required|max:255',
            'email'=>'required|email',
            'phone_contacts'=>['required','regex:/^(\+[0-9]{0,3}|\+[0-9]{1,3}\s)?([0-9]{8,9})$/'],
            'description'=>'required|string',
            'week_hours'=>'required|string',

        ];
    }
    public function attributes(): array
    {
        return [
            'name_contact'=>'nombre',
            'address_contacts'=>'dirección',
            'email' => 'email',
            'phone_contacts' => 'telefono',
            'description' => 'descripción',
            'week_hours' => 'Horario',
        ];
    }




}
