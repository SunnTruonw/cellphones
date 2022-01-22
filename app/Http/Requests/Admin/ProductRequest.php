<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'price' => 'required',
            'image' => 'required',
            'qty' => 'required',
            'sku' => 'required',
           
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Tên danh mục không được bỏ trống !',
            'price.required' => 'Giá sản phẩm không được bỏ trống !',
            'image.required' => 'Ảnh sản phẩm không được bỏ trống !',
            'qty.required' => 'Số lượng không được bỏ trống !',
            'sku.required' => 'Mã sản phẩm không được bỏ trống !',
        ];
    }
}
