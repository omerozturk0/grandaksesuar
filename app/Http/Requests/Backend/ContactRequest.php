<?php

namespace App\Http\Requests\Backend;

use App\Http\Requests\Request;

class ContactRequest extends Request
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
        switch (\Request::get('type')) {
            case 3:
                return array(
                    'name' => 'required',
                    'val' => 'required|url',
                );
                break;
            case 4:
                return array(
                    'name' => 'required',
                    'val' => 'required|email',
                );
                break;
            default:
                return array(
                    'name' => 'required',
                    'val' => 'required',
                );
                break;
        }
    }

    public function messages()
    {
        return [
            'name.required' => 'Bağlantı adı alanını boş bırakamazsınız!',
            'val.required' => 'Bu alanı boş bırakamazsınız!',
            'val.email' => 'Lütfen geçerli bir email adresi giriniz!',
            'val.numeric' => 'Bu kısım sadece numaradan oluşmalıdır!',
            'val.url' => 'Lütfen geçerli bir url biçimi giriniz!',
        ];
    }
}
