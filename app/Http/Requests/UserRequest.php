<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email'=>'required|email',
            'password'=>'required',
            'name'=>'required',
            'phone'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'email.required'=>'Vui lòng nhập email',
            'password.required'=>'Vui lòng nhập mật khẩu',
            'name.required'=>'Vui lòng nhập tên',
            'phone.required'=>'Vui lòng nhập số điện thoại',
        ];
    }
}
