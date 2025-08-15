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
            //修正予定
            'last_name' => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:255'],
            'gender' => ['required'],
            'email' => ['required', 'string', 'email', 'max:255'],
            //1桁から5桁の数字のみを受け付け
            'area-code' => ['required', 'regex:/^[0-9]{1,5}$/'],
            'number1' => ['required', 'regex:/^[0-9]{1,5}$/'],
            'number2' => ['required', 'regex:/^[0-9]{1,5}$/'],
            'address' => ['required'],
            'category_id'=> ['required'],
            'detail' => ['required','max:120']

        ];
        
    }

    public function messages()
    {
        //修正予定
        
        return[
            'last_name.required' => '姓を入力してください',
            //'last_name.string' => '名前を文字列で入力してください',
            //'last_name.max' => '名前を255文字以下で入力してください',
            'first_name.required' => '名を入力してください',
            //'first_name.string' => '名前を文字列で入力してください',
            //'first_name.max' => '名前を255文字以下で入力してください',
            'gender.required' => '性別を選択してください',

            'email.required' => 'メールアドレスを入力してください',
            //'email.string' => 'メールアドレスを文字列で入力してください',
            'email.email' => 'メールアドレスはメール形式で入力してください',
            'email.max' => 'メールアドレスを255文字以下で入力してください',

            'tel.required' => '電話番号を入力してください',
            'tel.regex:/^[0-9]{1,5}$/' => '電話番号は5桁までの数字で入力してください',

            'address.required' => '住所を入力してください',
            'content.required' => 'お問い合わせの種類を選択してください',
            'detail.required' => 'お問い合わせ内容を入力してください',
            'detail.max' => 'お問い合わせの内容は120文字以内で入力してください'

        ];
        
    }
}
