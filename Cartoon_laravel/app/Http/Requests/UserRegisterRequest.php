<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRegisterRequest extends FormRequest
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
                 'name'=> 'required|unique:users,name',
                 'email'=>'required|email|unique:users,email',
                 'password'=>'required|confirmed|min:6',
                 'password_confirmation'=>'required',
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'用户名不能为空',
            'eamil.email'=>'邮箱格式不正确',
            'password.required'=>'密码不能空',
            'password.min'=>'密码不能少于六位',
            'password.confirmed'=>'二次密码不一致',
            'password_confirmation.required'=>'确认密码不能为空',
            'name.unique'=>'用户名已经被使用',
            'email.unique'=>'邮箱已经被使用',
        ];
    }
}
