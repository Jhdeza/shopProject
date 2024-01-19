<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class OfertRequest extends FormRequest
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
            "name" => [
                'required',
                'max:255',
                Rule::unique('oferts', 'name')->ignore($ofertid),
            ],
            "percent" => "required|numeric|max:99",
        ];
    }
   
}
