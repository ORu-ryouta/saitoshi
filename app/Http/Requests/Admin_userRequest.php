<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Admin_userRequest extends FormRequest
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
            'name' => 'required|max:100',
            'password' => 'required|max:255',
            'email' => 'required',
            
        ];
    }
    public function messages()
    {
        return [
            'name.required' => '氏名を入力してください。',
            'name.max' => '氏名は指定文字数以内で入力してください。',
            'password.required' => 'パスワードを入力してください。',
            'password.max' => 'パスワードは半角英数字8桁以内で入力してください。',
            'email.required' => 'メールアドレスを入力してください。',
            'email.email' => 'メールアドレスは正しいメールアドレス形式で入力してください。',
            
        ];
    }
}