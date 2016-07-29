<?php

namespace App\Http\Requests\Backend;

use App\Http\Requests\Request;

class AuthResetPasswordRequest extends Request
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
            'email' => 'required|email',
            'password' => 'required|min:5|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email alanını boş bırakamazsınız!',
            'email.email' => 'Lütfen geçerli bir email adresi giriniz!',
            'password.required' => 'Parola alanını boş bırakamazsınız!',
            'password.min' => 'Parola en az :min karakterli olmalıdır!',
            'password.confirmed' => 'Parolalar eşleşmemektedir!',
        ];
    }
}
