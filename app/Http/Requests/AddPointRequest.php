<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddPointRequest extends FormRequest
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
            'point_title' => 'required',
            'point_description' => 'required',
            'point_date' => 'required',
            'point_rate' => 'required|min:0',
        ];
    }
    public function messages()
    {
        return [
            'point_title.required' => "Vui lòng nhập tiêu đề.",
            'point_description.required'  => "Vui lòng nhập mô tả.",
            'point_date.required'  => "Vui lòng nhập ngày áp dụng.",
            'point_rate.min'  => "Điểm phải là số lớn hơn 0.",
            'point_rate.required'  => "Vui lòng nhập vào điểm."
        ];
    }
}
