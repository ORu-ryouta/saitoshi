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
            'receipt_date' => 'required|max:100',
            'complete_plans' => 'required|max:100',
        ];
    }
    public function messages()
    {
        return [

            'price.required' => '金額を入力してください。',
            'price.max' => '金額を正しく入力してください。',
            'receipt_date.required' => '受注日を入力してください。',
            'receipt_date.max' => '受注日を正しく入力してください。',
            'complete_plans.required' => '完了日を入力してください。',
            'complete_plans.max' => '完了日を正しく入力してください。',
 
        ];
    }
}