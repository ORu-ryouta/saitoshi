<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AdminUserRequest;
use App\AdminUser;

class AdminUserController extends Controller
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
    public function admin_userInput(AdminUserRequest $request=null)
    {
        if(!empty($_GET["admin_userId"])) { // 詳細（メンバーIDがある時）
            $admin_userId = $_GET["admin_userId"];
        
        // Frameworksモデルのインスタンス化
        $md = new AdminUser(); // メンバーファイルに接続する
        
        // データ取得
        $data = $md->admin_userSelect($admin_userId);
        
        
        } else { // 新規登録（メンバーIDがない時）
            
        }
       
        if (empty($data)) {
            $data =null;
        }
        
        // インプット画面を表示
        return view('admin_user.input', ['data' => $data]);
    }
 
    /**
     * 完了画面
     *
     * @return string
     */
    public function admin_userSave(AdminUserRequest $request)
    {
     
        $nowDate = date('Y/m/d H:i:s');
        // データベース登録
        $admin_user = new AdminUser(); 
        $admin_user->name    = $request->name;
        $admin_user->password  = $request->password;
        $admin_user->email   = $request->email;
        
         if(!empty($request->admin_userId)) { // 更新画面
         $admin_user->admin_user_id = $request->admin_userId;
          $data = $admin_user->admin_userUpdate($admin_user);
         }
       
           else {
               $admin_user->recode_date = $nowDate;
               $admin_user->save();
         }
   
        // リロード等による二重送信防止
        $request->session()->regenerateToken();

        return view('admin_user.complete');
    }

    public function admin_userList()
    {
        $search = null;
        if (!empty($_GET["search"])) {
            $search = $_GET["search"]; // 検索文字列
        }
        // Frameworksモデルのインスタンス化
        $md = new AdminUser(); // メンバーファイルに接続する
        
        // データ取得
        $data = $md->getData($search);
        if (empty($data)) {
            $data = null;
        }

    // ビューを返す
      return view('admin_user.list', ['data' => $data]);
    }
   
    //削除
    public function admin_userDelete(AdminUserRequest $request=null)
    {
        $admin_userId = $_GET["admin_userId"]; // $memberIdに$_GETを入れる。

        $md = new AdminUser(); // メンバーファイルに接続する
        
        $md->admin_userDelete($admin_userId); // 指定したメンバーIDの削除
        
        $data = $md->getData(); // 全てのデータを持ってくる
         
    // ビューを返す
        return view('admin_user.list', ['data' => $data]);
    }
    
    

}


