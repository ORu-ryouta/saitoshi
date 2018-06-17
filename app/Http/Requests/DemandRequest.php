<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Request extends FormRequest
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
       
            'category'=>'required|max:100',
            'business' => 'required|max:255',
            'work' => 'required|max:255',
            'price' => 'required|max:100',
            'oder_date' => 'required|max:100',
            'receipt_date' => 'required|max:100',
            'complete_plans' => 'required|max:100',
            'complete_date' => 'required|max:100',
            
        ];
    }
    public function messages()
    {
        return [
       
            'category.required'=>'注文内容を正しく入力してください。',
            'category.max'=>'注文内容を正しく入力してください。',
            'business.required' => '商談内容を入力してください。',
            'business.max' => '商談内容を正しく入力してください。',
            'work.required' => '作業内容を入力してください。',
            'work.max' => '作業内容を正しく入力してください。',
            'price.required' => '金額を入力してください。',
            'price.max' => '金額を正しく入力してください。',
            'oder_date.required' => '注文日を入力してください。',
            'oder_date.max' => '注文日を正しく入力してください。',
            'receipt_date.required' => '受注日を入力してください。',
            'receipt_date.max' => '受注日を正しく入力してください。',
            'complete_plans.required' => '完了日を入力してください。',
            'complete_plans.max' => '完了日を正しく入力してください。',
            'complete_date.required' => '完了予定日を入力してください。',
            'complete_date.max' => '完了予定日を正しく入力してください。',
            'status.required' => '進捗状況を入力してください。',
            'status.max' => '進捗状況入力してください。',
            
        ];
    }
}