<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\MemberRequest;
use App\Member;

class MemberController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }
   
	/**
     * 入力画面
     *
     * @return string
     */
    public function memberInput(MemberRequest $request=null)
    {
        if(!empty($_GET["memberId"])) { // 詳細（メンバーIDがある時）
            $memberId = $_GET["memberId"];
        
        // Frameworksモデルのインスタンス化
        $md = new Member(); // メンバーファイルに接続する
        
        // データ取得
        $data = $md->memberSelect($memberId);
        
        
        } else { // 新規登録（メンバーIDがない時）
            
        }
       
        if (empty($data)) {
            $data =null;
        }
        
        // インプット画面を表示
        return view('member.input', ['data' => $data]);
    }
 
    /**
     * 完了画面
     *
     * @return string
     */
    public function memberSave(MemberRequest $request)
    {
     
        $nowDate = date('Y/m/d H:i:s');
        // データベース登録
        $member = new Member(); 
        $member->name    = $request->name;
        $member->gender  = $request->gender;
        $member->address = $request->address;
        $member->tel_1   = $request->tel_1;
        $member->tel_2   = $request->tel_2;
        $member->email   = $request->email;
        
         if(!empty($request->memberId)) { // 更新画面
         $member->member_id = $request->memberId;
          $data = $member->memberUpdate($member);
         }
         
           else {
               $member->recode_date = $nowDate;
               $member->save();
         }
   
        // リロード等による二重送信防止
        $request->session()->regenerateToken();

        return view('member.complete');
    }

    public function memberList()
    {
        $search = null;
        if (!empty($_GET["search"])) {
            $search = $_GET["search"]; // 検索文字列
        }
        // Frameworksモデルのインスタンス化
        $md = new Member(); // メンバーファイルに接続する
        
        // データ取得
        $data = $md->getData($search);
        if (empty($data)) {
            $data = null;
        }

    // ビューを返す
      return view('member.list', ['data' => $data]);
    }
   
    //削除
    public function memberDelete(MemberRequest $request=null)
    {
        $memberId = $_GET["memberId"]; // $memberIdに$_GETを入れる。

        $md = new Member(); // メンバーファイルに接続する
        
        $md->memberDelete($memberId); // 指定したメンバーIDの削除
        
        $data = $md->getData(); // 全てのデータを持ってくる
         
    // ビューを返す
        return view('member.list', ['data' => $data]);
    }
    
    

}


