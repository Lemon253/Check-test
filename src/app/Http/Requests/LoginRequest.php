<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Laravel\Fortify\Http\Requests\LoginRequest as FortifyLoginRequest;

//継承元の変更
//class LoginRequest extends FormRequest
class LoginRequest extends FortifyLoginRequest
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
            //バリデーションルール
            'email' => 'required|string|email|max:255|',
            'password' => 'required|string|min:8|',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスは「ユーザ名＠ドメイン」形式で入力してください',
            'password.required' => 'パスワードを入力してください',
        ];
    }
}
