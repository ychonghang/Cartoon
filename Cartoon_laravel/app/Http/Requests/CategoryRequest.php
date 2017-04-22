<?php

namespace App\Http\Requests;

use App\Common\Info;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name' => 'required|unique:categorys,name',
            'rank' => 'required',
        ];
    }


    public function messages()
    {
        return [
            'name.required' =>Info::info('分类名不能为空'),
            'name.unique' => Info::info('该分类名已存在'),
            'rank.required' => Info::info('分类级别不能为空'),
        ];
    }


}
