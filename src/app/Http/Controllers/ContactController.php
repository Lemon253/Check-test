<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Category;

class ContactController extends Controller
{
    //
    public function index()
    {
        $category = Category::all();
        return view('index',compact('category'));
    }

    public function confirm(ContactRequest $request)
    //public function confirm(Request $request)
    {
        //修正予定
        //フォームから送られてきた値の受け取り
        $contact = $request->only([
            'first_name',
            'last_name',
            'gender',
            'email',
            'area-code',
            'number1',
            'number2',
            'address',
            'building',
            'category_id',
            'detail'
        ]);
        $category = Category::find($contact['category_id']);
        //viewへ値の受け渡し
       return view('confirm', compact('contact', 'category'));

    }

    public function thanks(Request $request)
    {
        // 特定のボタンが押されたかを確認
        if ($request->input('submit') === 'submit') {
            //送信ボタンを押した時の処理
            $contact = $request->only([
                'first_name',
                'last_name',
                'gender',
                'email',
                'address',
                'building',
                'category_id',
                'detail'
            ]);
            
            // 電話番号の各部分を取得
            $areaCode = $request->input('area-code');
            $number1 = $request->input('number1');
            $number2 = $request->input('number2');
            // 電話番号を配列に格納
            $contact['tel'] = $areaCode . $number1 . $number2;

            // categories テーブルに新しいカテゴリを作成            
            //$category =Category::create($contact);

            //　category_id を追加
           // $contact['category_id'] = $category->id;

            //$contact の変数に格納されたデータを作成
            Contact::create($contact);

            //thanks.blade.php を呼び出し
            //return view('thanks')->with('message', 'フォームが送信されました。');

            //配列の中身確認用
            return view('thanks', compact('contact'))->with('message', 'フォームが送信されました。');
        } elseif ($request->input('back') === 'back') {
            // 修正ボタンが押された場合の処理
            return redirect('/')
            ->with('message', '送信がキャンセルされました。')
            ->withInput();
        }
    }

    public function admin(Request $request)
    {
        //Contactsテーブルの情報取得
        $contacts = Contact::all();
        //Categoriesテーブルの問い合わせの種類取得
        $content = Category::select('content')->get();

        //　管理画面用の配列作成

        return view('auth.admin', compact('contacts'));
    }

}
