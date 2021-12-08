<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductValidate extends FormRequest
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
            'product_name'=>'required|max:255',
            'category_id'=>'required',
            'brand_id'=>'required',
            'product_price'=>'required|numeric|min:1',
            'product_desc'=>'',
        ];
    }
    public function messages()
    {
        return [
            'required'=>'Không được để trống',
            'numeric'=>'Sai định dạng, Vui lòng nhập giá trị là số nguyên',
            'min'=>'Số tiền quá bé, vui lòng nhập giá trị lớn hoặc bằng 1',
            'max'=>'Chuỗi quá dài, vui lòng nhập lại (ít hơn 255 kí tự)',
        ];
    }
}
