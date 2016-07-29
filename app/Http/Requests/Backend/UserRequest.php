<?php

namespace App\Http\Requests\Backend;

use App\Http\Requests\Request;

class UserRequest extends Request
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
        if (\Request::segment(3) == 'create') {
            return [
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|min:5|confirmed',
                'role' => 'required',
            ];
        } else {
            return [
                'name' => 'required',
                'email' => 'required|email|unique:users,email,'.\Request::segment(3),
                'password' => 'min:5|confirmed',
                'role' => 'required',
            ];
        }
    }

    public function messages()
    {
        return [
            'name.required' => 'Ad soyad alanını boş bırakamazsınız!',
            'email.required' => 'Email alanını boş bırakamazsınız!',
            'email.email' => 'Lütfen geçerli bir email adresi giriniz!',
            'email.unique' => 'Bu email adresi kayıtlarımızda zaten bulunmaktadır!',
            'password.required' => 'Parola alanını boş bırakamazsınız!',
            'password.min' => 'Parola en az :min karakterli olmalıdır!',
            'password.confirmed' => 'Parolalar eşleşmemektedir!',
            'role.required' => 'Rol alanını boş bırakamazsınız!',
        ];
    }
}
