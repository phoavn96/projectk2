<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Redirect;
use Session;
class AccountRequest extends FormRequest
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
            'name'=>'required',
            'phone'=>'required',
            'email'=>'required|email',
            'password'=>'required',
            'confirm_password'=>'required',
        ];
    }

    public function withValidator($validator){
        $validator->after(function ($validator){
            $password = $this->get('password');
            $confirm_password = $this->get('confirm_password');
            if ($password != $confirm_password){
                $validator->errors()->add('password','Mật khẩu không trùng khớp');
            }
        });
    }
    public function messages()
    {
        return [
            'name.required'=>'Vui lòng nhập tên',
            'phone.required'=>'Vui lòng nhập số điện thoại',
            'email.required'=>'Vui lòng nhập email',
            'password.required'=>'Vui lòng nhập mật khẩu',
            'confirm_password.required'=>'Vui lòng nhập nhập lại mật khẩu',

        ];
    }
}
