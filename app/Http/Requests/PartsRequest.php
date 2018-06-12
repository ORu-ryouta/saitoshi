<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PartsRequest extends FormRequest
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
            
             'parts' => 'required|max:100',
            'category'=>'required|max:100',
            
        ];
    }
    public function messages()
    {
        return [
            
           'company.required' => '部品名を入力してください。',
            'company.max' => '部品名は指定文字数以内で入力してください。',
            'category.required' => 'カテゴリを選択してください。',
            'category.in' => 'カテゴリを正しく選択してください。',
        ];
    }
}