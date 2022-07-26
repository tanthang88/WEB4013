<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RuleAddPost extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title'=>['required'],
            'subcategories'=>['required'],
            'active'=>['required'],
            'content'=>['required'],
        ];
    }
    public function messages()
    {
        return [
            'title.required'=>'Vui lòng nhập tiêu đề bài viết.',
            'subcategories.required'=>'Vui lòng chọn chuyên mục.',
            'active.required'=>'Vui lòng tích chọn trạng thái bài viết.',
            'content.required'=>'Vui lòng nhập nội dung bài viết.'
        ];
    }
}
