<?php

namespace App\Http\Requests\Backend;

use App\Http\Requests\Request;

class MenuRequest extends Request
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
            'title' => 'required',
            'area' => 'required',
            'special_url' => 'url',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Ad alanını boş bırakamazsınız!',
            'area.required' => 'Gösterim alanını boş bırakamazsınız!',
            'special_url.url' => 'Lütfen geçerli bir url giriniz!',
        ];
    }
}
