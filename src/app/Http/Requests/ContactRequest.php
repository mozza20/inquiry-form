<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'last_name'=>['required','string','max:255'],
            'first_name'=>['required','string','max:255'],
            'gender'=>['required'],
            'email'=>['required','email','max:255'],
            'no1'=>['required','digits_between:2,5'],
            'no2'=>['required','digits_between:2,5'],
            'no3'=>['required','digits_between:2,5'],
            'address'=>['required','string','max:255'],
            'building' => ['nullable'],
            'category_id'=>['required','exists:categories,id'],
            'detail'=>['required','string','max:120'],
        ];
    }

    public function messages(){
        return[
            'last_name.required'=>'姓を入力してください',
            'first_name.required'=>'名を入力してください',
            'gender.required'=>'性別を選択してください',
            'email.required'=>'メールアドレスを入力してください',
            'email.email'=>'メールアドレスはメール形式で入力してください',
            'no1.required'=>'電話番号を入力してください',
            'no1.digits_between'=>'電話番号は5桁までの数字で入力してください',
            'no2.required'=>'電話番号を入力してください',
            'no2.digits_between'=>'電話番号は5桁までの数字で入力してください',
            'no3.required'=>'電話番号を入力してください',
            'no3.digits_between:2,5'=>'電話番号は5桁までの数字で入力してください',
            'address.required'=>'住所を入力してください',
            'category_id.required'=>'お問い合わせの種類を選択してください',
            'detail.required'=>'お問い合わせ内容を入力してください',
            'detail.max'=>'お問い合わせ内容は120文字以内で入力してください',
        ];
    }
}
