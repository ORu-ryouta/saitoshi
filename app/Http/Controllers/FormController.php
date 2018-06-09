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
    public function input(PostRequest $request=null)
    {
        $logPass="/home/vagrant/code/saitoshiHps/log/query.log";
        error_log(print_r($request->memberId, TRUE), 3, $logPass);
        error_log(print_r("tetete".$_GET, TRUE), 3, $logPass);
        
        // Frameworksモデルのインスタンス化
        $md = new Member();
        
        // データ取得
        $data = $md->memberSelect($request->memberId);
        
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



