<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'name'  => 'required|min:3|max:25',
            'email' => 'required|email|unique:users,email',
            'role'  => 'required',
            'password' => 'min:3'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Silahkan masukan nama',
            'name.min' => 'Nama minimal 3 Karakter',
            'name.max' => 'Nama maksimal 25 Karakter',
            'email.required' => 'Silahkan masukan email',
            'email.email' => 'Silahkan masukan email yang benar',
            'email.unique' => 'Email ini sudah terdaftar',
            'role.required' => 'Silahkan pilih role',
            'password.required' => 'Silahkan masukan password',
            'password.min' => 'Password minimal 3 karakter',
        ];
    }
}
