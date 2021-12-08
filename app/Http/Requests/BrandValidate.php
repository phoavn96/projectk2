<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BrandValidate extends FormRequest
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
            'brand_name'=>'required',
            'brand_desc'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'brand_name.required' => 'Vui lòng nhập tên',
            'brand_desc.required' => 'Vui lòng nhập mô tả'
        ];
    }
}
