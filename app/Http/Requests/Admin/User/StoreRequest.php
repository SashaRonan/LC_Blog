<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name'=>'required|string',
            'email'=>'required|string|email|unique:users',
            'password'=>'required',
            'role'=>'required|integer'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Это поле необходимо заполнить',
            'name.string' => 'Имя должно быть строкой',
            'email.required' => 'Это поле необходимо заполнить',
            'email.string' => 'Почта должна быть строкой',
            'email.email' => 'Ваша почта должна соответствовать формату user@mail.ru',
            'email.unique' => 'Данный email уже используется',
            'password.required' => 'Пароль должен быть строкой',
        ];
    }
}
