<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\validation\Rule;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'username' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($this->user()->username, 'username')],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($this->user()->email, 'email')],
            'password' => ['nullable', 'string', 'min:8','confirmed'],
            'name' => ['nullable', 'string', 'max:100'],
            'last_name' => ['nullable', 'string', 'max:100'],
            'description' => ['nullable', 'string'],
        ];
    }
}
