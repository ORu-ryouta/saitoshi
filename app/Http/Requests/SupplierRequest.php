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
            'company' => 'required|max:100',
            'fixer'=>'required|max:100',
            'address'=>'required|max:100',
            'tel' => 'required|max:255',
            'note' => 'required',
            
        ];
    }
    public function messages()
    {
        return [
            'company.required' => '会社名又は船舶名を入力してください。',
            'company.max' => '会社名又は船舶名は指定文字数以内で入力してください。',
            'fixer.required' => '代表者名を入力してください。',
            'fixer.max' => '代表者名を正しく入力してください。',
            'adles.required'=>'住所を正しく入力してください。',
            'adles.max'=>'住所は指定文字数以内で入力してください。',
            'tel.required' => '電話番号を入力してください。',
            'tel.max' => '電話番号は指定文字数以内で入力してください。',
            'note.required' => '備考欄を入力してください。',
            'note.max' => '備考欄を入力してください。',
            
        ];
    }
}