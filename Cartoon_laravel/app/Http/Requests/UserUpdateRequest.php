<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
            'old_password'=>'required',
            'new_password'=>'required|confirmed|min:6',
            'new_password_confirmation'=>'required',
        ];
    }
    public function messages()
    {
       return [
          'old_password.required'=>'旧密码不能空或不正确',
           'new_password.required'=>'密码不能空',
           'new_password.confirmed'=>'两次密码不一致',
           'new_password.min'=>'密码不能少余六位',
           'new_password_confirmation.required'=>'确认密码不能空',
       ];
    }
}
