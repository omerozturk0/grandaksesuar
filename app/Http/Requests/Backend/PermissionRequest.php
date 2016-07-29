<?php

namespace App\Http\Requests\Backend;

use App\Http\Requests\Request;

class PermissionRequest extends Request
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
            'name' => 'required',
            'display_name' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Ad alanını boş bırakazsınız!',
            'display_name.required' => 'Native alanını boş bırakazsınız!',
        ];
    }
}
