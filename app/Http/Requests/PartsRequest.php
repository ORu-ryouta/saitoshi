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
            'stock' => 'required|max:100',
            'min_stock' => 'required|max:100',
            'last_date' => 'required|max:100',
            'category'=>'required|max:100',
            
        ];
    }
    public function messages()
    {
        return [
            
           'parts.required' => '部品名を入力してください。',
            'parts.max' => '部品名は指定文字数以内で入力してください。',
            
             'stock.required' => '在庫数を選択してください。',
            'stock.in' => '在庫数を正しく選択してください。',
            
             'min_stock.required' => '最低在庫数を選択してください。',
            'min_stock.in' => '最低在庫数を正しく選択してください。',
            
             'last_date.required' => '最終仕入れ日を選択してください。',
            'last_date.in' => '最終仕入れ日を正しく選択してください。',
            
            'category.required' => 'カテゴリを選択してください。',
            'category.in' => 'カテゴリを正しく選択してください。',
        ];
    }
}