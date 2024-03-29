<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Comment extends FormRequest
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
            'phone' => 'required',
            'messages' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Quý khách vui lòng kiểm tra lại thông tin',
            'phone.required' => 'Quý khách vui lòng kiểm tra lại thông tin',
            'mesages.required' => 'Vui lòng bình luận',
        ];
    }
}
