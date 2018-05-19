<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
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
        ];
    }
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
         'gender'=>'required|max:100'
         'adles'=>'required|max:100'
         'tel_1' => 'required|max:255',
         'tel_2' => 'required|max:255',
         'mail' => 'required|mail',
         'company' => 'required|max:100',
         'ship_id' => 'required|max:100'
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
         'tel_1.required' => '電話番号を入力してください。',
         'tel_1.max' => '電話番号は指定文字数以内で入力してください。',
         'tel_2.required' => '電話番号を入力してください。',
         'tel_2.max' => '電話番号は指定文字数以内で入力してください。',
         'mail.required' => 'メールアドレスを入力してください。',
         'mail.email' => 'メールアドレスは正しいメールアドレス形式で入力してください。',
         'company.required'=>'会社名を入力してください。',
         'company.max' => '会社名は指定文字数以内で入力してください。',
         'ship_id.required'=>'船舶名を入力してください。',
         'ship_id.max'=>'船舶名は指定文字数以内で入力してください。',
     ];
 }

