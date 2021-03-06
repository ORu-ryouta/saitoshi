<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberRequest extends FormRequest
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
            'gender'=>'required|max:100',
            'address'=>'required|max:100',
            'tel_1' => 'required|max:255',
            'tel_2' => 'required|max:255',
            'email' => 'required',
            
        ];
    }
    public function messages()
    {
        return [
            'name.required' => '氏名を入力してください。',
            'name.max' => '氏名は指定文字数以内で入力してください。',
            'gender.required' => '性別を選択してください。',
            'gender.in' => '性別を正しく選択してください。',
            'adles.required'=>'住所を正しく入力してください。',
            'adles.max'=>'住所は指定文字数以内で入力してください。',
            'tel1.required' => '電話番号を入力してください。',
            'tel1.max' => '電話番号は指定文字数以内で入力してください。',
            'tel2.required' => '電話番号を入力してください。',
            'tel2.max' => '電話番号は指定文字数以内で入力してください。',
            'email.required' => 'メールアドレスを入力してください。',
            'email.email' => 'メールアドレスは正しいメールアドレス形式で入力してください。',
            
        ];
    }
}