<?php

namespace App\Http\Requests;

use App\Common\Info;
use Illuminate\Foundation\Http\FormRequest;

class SectionUpdRequest extends FormRequest
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
            "name" => "required|max:16",
        ];
    }

    public function messages()
    {
        return [
            "name.required" => Info::info("章节名不能为空","notice_info"),
            "name.max" => Info::info("章节名输入上限16个","notice_info"),
        ];
    }
}
