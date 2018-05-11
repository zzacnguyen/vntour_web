<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class addservice extends FormRequest
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
            "sv_description"=>"required",
            "img1"=>"required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "img2"=>"required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
            "img3"=>"required|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ];
    }
    public function messages()
    {
        return[
            "sv_description.required"=>"Tên địa điểm không được bỏ trống",
            "img1.required"=>"Ảnh không được bỏ trống",
            "img1.mimes"=>"Không đúng định dạng ảnh",
            "img1.max"=>"kích thước quá lớn",
            "img2.required"=>"Ảnh không được bỏ trống",
            "img2.mimes"=>"Không đúng định dạng ảnh",
            "img2.max"=>"kích thước quá lớn",
            "img3.required"=>"Ảnh không được bỏ trống",
            "img3.mimes"=>"Không đúng định dạng ảnh",
            "img3.max"=>"kích thước quá lớn",
        ];
       
    }
}
