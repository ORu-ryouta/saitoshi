<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Member;

class FormController extends Controller
{
   
	/**
     * 入力画面
     *
     * @return string
     */
    public function input()
    {
        return view('form.input');
    }
 
    /**
     * 完了画面
     *
     * @return string
     */
    public function save(PostRequest $request)
    {
        // データベース登録
        $member = new Member();
        $member->name    = $request->name;
        $member->gender  = $request->gender;
        $member->adles   = $request->adles;
        $member->tel_1   = $request->tel1;
        $member->tel_2   = $request->tel2;
        $member->mail    = $request->mail;
        $member->company = $request->company;
        $member->ship_id = 0;
        $member->save();
   
        // リロード等による二重送信防止
        $request->session()->regenerateToken();

        return view('form.complete');
    }


        # Http/Controllers/GreetingController.php
        public function list(Request $request)
    {
        # greetingsテーブルのレコードを全件取得
        $data = Greeting::all();
        # data連想配列に代入&Viewファイルをlist.blade.phpに指定
        return view('list', ['data' => $data]);
}



}



