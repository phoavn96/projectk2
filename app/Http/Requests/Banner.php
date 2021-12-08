<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Banner extends FormRequest
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
            'banner_name'=>'required',
            'images'=>'required|url',
            'banner_desc'=>'required',
        ];

    }
    public function messages()
    {
        return [
            'banner_name.required' => 'Vui lòng nhập tên',
            'banner_desc.required' => 'Vui lòng nhập mô tả',
            'images.url' => "Vui lòng nhập đúng định dạng url",
            'images.required' => "Vui lòng nhập link ảnh",
        ];
    }
}
