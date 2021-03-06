<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaleRequest extends FormRequest
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

            'price' => 'required|max:100',
            'credit_date' => 'required|max:100',
            
        ];
    }
    public function messages()
    {
        return [

            'price.required' => '金額を入力してください。',
            'price.max' => '金額を正しく入力してください。',
            'credit_date.required' => '入金日を入力してください。',
            'credit_date.max' => '入金日を正しく入力してください。',
            
 
        ];
    }
}