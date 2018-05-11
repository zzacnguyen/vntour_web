<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class edituserplace extends FormRequest
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
            "place_name"=>"required",
            "place_phone"=>"required|between:10,11",
            "place_address"=>"required",
        ];
    }
    public function messages()
    {
        return [
            "place_name.required"=>"Tên địa điểm không được bỏ trống",
            "place_phone.required"=>"Số điện thoại không đươc để trống",
            "place_phone.between"=>"Số điện thoại chỉ được 10 hoặc 11 số",
            "place_address.required"=>"Địa chỉ không đươc để trống",
        ];
    }
}
