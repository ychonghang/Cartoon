<?php

namespace App\Http\Requests;

use App\Common\Info;
use Illuminate\Foundation\Http\FormRequest;

class CartoonUpdRequest extends FormRequest
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
            //
            'desc' => 'max:200',
            'authornotice' => 'max:200',
            'cartoontype' => 'required|exists:categorys,id',
            'theme' => 'required|exists:categorys,id',
            'usergroup' => 'required|exists:categorys,id',
            'createschedule' => 'required|in:0,1',
            'imagepath' => 'image|dimensions:max_width=104,max_height=137',

        ];
    }


    public function messages()
    {
        return [
            'desc.max' => Info::info('超过最大输入上限','notice_info'),
            'authornotice.max' => Info::info('超过最大输入上限','notice_info'),
            'cartoontype.required' => Info::info('作品类型不能为空','notice_info'),
            'cartoontype.exists' => Info::info('该作品类型不存在','notice_info'),
            'theme.required' => Info::info('作品题材不能为空','notice_info'),
            'theme.exists' => Info::info('该作品题材不存在','notice_info'),
            'usergroup.required' => Info::info('用户群不能为空','notice_info'),
            'usergroup.exists' => Info::info('该用户群不存在','notice_info'),
            'createschedule.required' => Info::info('创作进程不能为空','notice_info'),
            'createschedule.in' => Info::info('该创作进程不存在','notice_info'),
            'imagepath.image' => Info::info('上传文件不是图片格式','notice_info'),
            'imagepath.dimensions' => Info::info('图片尺寸最大宽度104,高度137','notice_info'),
        ];
    }
}
