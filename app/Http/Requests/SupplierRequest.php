<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierRequest extends FormRequest
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
            'supplier_num' => 'required|max:100',
            'price'=>'required|max:100',
            'supplier_date'=>'required|max:100',
           
            
        ];
    }
    public function messages()
    {
        return [
            'supplier_num.required' => '仕入数を入力してください。',
            'supplier_num.max' => '仕入数を指定文字数以内で入力してください。',
            'price.required' => '単価を入力してください。',
            'price.max' => '単価を正しく入力してください。',
            'supplier_date.required'=>'仕入れ日を正しく入力してください。',
            'supplier_date.max'=>'仕入れ日は指定文字数以内で入力してください。',
            
            
        ];
    }
}