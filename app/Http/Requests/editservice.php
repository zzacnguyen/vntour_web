<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class editservice extends FormRequest
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
            "sv_name"=>"required",
        ];
    }
    public function messages()
    {
        return[
            "sv_name.required"=>"Tên địa điểm không được bỏ trống",
        ];
    }
}
