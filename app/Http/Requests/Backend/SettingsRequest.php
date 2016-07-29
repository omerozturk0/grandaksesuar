<?php

namespace App\Http\Requests\Backend;

use App\Http\Requests\Request;

class SettingsRequest extends Request
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
            'site_title' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Site başlığı alanını boş bırakamazsınız!',
        ];
    }
}
