<?php

namespace App\Http\Requests\Base;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'name' => 'required|regex:/^[a-zA-Z][a-zA-Z0-9_]{5,19}$/',
            'pwd' => 'required|regex:/^[a-zA-Z]\w{5,19}$/',
        ];
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            'name.required' => '请填写用户名',
            'name.regex' => '账号由字母数字下划线组成(以字母开头),6-20位',
            'pwd.required' => '请填写密码',
            'pwd.regex' => '密码只能包含字母、数字和下划线(以字母开头),6-20位',

        ];
    }
}
