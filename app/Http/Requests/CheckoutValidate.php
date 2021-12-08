<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CheckoutValidate extends FormRequest
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
            'shipping_email'=>'required|email|max:255',
            'shipping_name'=>'required|max:255',
            'shipping_address'=>'required|max:255',
            'shipping_phone'=>'required|numeric|min:1',
            'shipping_notes'=>'max:255',
            'order_status'=>'required',
            'quantity'=>'numeric|min:1|max:10',
        ];
    }
    public function messages()
    {
        return [
            'required' => 'Không được để trống',
            'email' => 'Bạn phải nhập email',
            'numeric' => 'Bạn phải nhập đúng định dạng là số',
            'max' => 'Nội dung quá dài, vui lòng nhập lại',
            'shipping_phone.min' => 'Số điện thoại phải từ 9 đến 12 chữ số',
            'quantity.min' => 'Số lượng quá ít, vui lòng chọn lại',
            'quantity.max' => 'Số lượng quá lớn, bạn chỉ được mua tối đa 10 sản phẩm cùng mã trên 1 đơn hàng',

        ];
    }
}
