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
    public function input(PostRequest $membersId=null)
    {
        // Frameworksモデルのインスタンス化
        $md = new Member();
        
        // データ取得
        $data = $md->memberSelect($membersId);
        if (empty($data)) {
            $data = array("name"=>"test");
        }
        
        // インプット画面を表示
        return view('form.input', ['data' => $data]);
    }
 
    /**
     * 完了画面
     *
     * @return string
     */
    public function save(PostRequest $request)
    {
        $nowDate = date('Y/m/d H:i:s');
        // データベース登録
        $member = new Member();
        $member->name    = $request->name;
        $member->gender  = $request->gender;
        $member->address = $request->address;
        $member->tel_1   = $request->tel_1;
        $member->tel_2   = $request->tel_2;
        $member->email    = $request->email;
        $member->recode_date = $nowDate;
        $member->save();
   
        // リロード等による二重送信防止
        $request->session()->regenerateToken();

        return view('form.complete');
    }

    public function membersList()
    {
    // Frameworksモデルのインスタンス化
        $md = new Member();
    // データ取得
        $data = $md->getData();
        if (empty($data)) {
            $data = array("name"=>"test");
        }

    // ビューを返す
        return view('form.membersList', ['data' => $data]);
    }


}



