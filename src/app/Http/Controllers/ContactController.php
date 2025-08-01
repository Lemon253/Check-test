<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Category;

class ContactController extends Controller
{
    //
    public function index()
    {
        return view('index');
    }

    public function confirm(ContactRequest $request)
    {
        $contact = $request->only(['name','email','tel','content']);
        //return view('confirm', ['contact' => $contact]);
        return view('confirm', compact('contact'));

    }

    public function store(ContactRequest $request)
    {
        $contact = $request->only(['name', 'email', 'tel', 'content']);

        //$contact の変数に格納されたデータを作成
        //Contact::create($contact);

        //thanks.blade.php を呼び出し
        return view('thanks');
    }

    public function admin()
    {
        return view('auth.admin');
    }
}
