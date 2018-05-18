<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddSocialRequest extends FormRequest
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
            'social_title' => 'required',
            'social_description' => 'required'
        ];
    }
    public function messages()
    {
        return [
            'social_title.required' => "Vui lòng nhập tiêu đề.",
            'social_description.required'  => "Vui lòng nhập mô tả.",
        ];
    }
}
