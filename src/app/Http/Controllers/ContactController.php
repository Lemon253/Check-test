<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;

class ContactController extends Controller
{
    //
    public function index()
    {
        return view('index');
    }

    public function confirm(Request $request)
    {
        $contact = $request->only(['name','email','tel','content']);
        //return view('confirm', ['contact' => $contact]);
        return view('confirm', compact('contact'));

    }

    public function store(Request $request)
    {
        $contact = $request->only(['name', 'email', 'tel', 'content']);

        //$contact の変数に格納されたデータを作成
        //Contact::create($contact);

        //thanks.blade.php を呼び出し
        return view('thanks');
    }
}
