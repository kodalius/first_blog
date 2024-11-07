<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'name' => 'string|required',
            'email' => 'string|required|email|unique:users,email,'.$this->user_id,
            'user_id' => 'required|integer|exists:users,id',
            'role' =>'required|integer',

        ];
    }

    public function messages()
    {
        return [
            'name.string' => 'Это поле должно быть строкой',
            'name.required' => 'Это поле не должно быть пустым',
            'email.string' => 'Это поле должно быть строкой',
            'email.required' => 'Это поле не должно быть пустым',
            'email.email' => 'Поле должно соответствовать формату user@mail.ru',
            'email.unique' => 'Данная почта уже существует'
        ];
    }
}
