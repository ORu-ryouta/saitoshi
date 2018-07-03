<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Admin_userRequest;
use App\Admin_user;

class Admin_userController extends Controller
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
    public function adminUserInput(Admin_userRequest $request=null)
    {
        if(!empty($_GET["adminUserId"])) { // 詳細（メンバーIDがある時）
            $adminUserId = $_GET["adminUserId"];
        
        // Frameworksモデルのインスタンス化
        $md = new Admin_user(); // メンバーファイルに接続する
        
        // データ取得
        $data = $md->adminUserSelect($adminUserId);
        
        
        } else { // 新規登録（メンバーIDがない時）
            
        }
       
        if (empty($data)) {
            $data =null;
        }
        
        // インプット画面を表示
        return view('adminUser.input', ['data' => $data]);
    }
 
    /**
     * 完了画面
     *
     * @return string
     */
    public function adminUserSave(Admin_userRequest $request)
    {
     
        $nowDate = date('Y/m/d H:i:s');
        // データベース登録
        $adminUser = new Admin_user(); 
        $adminUser->name    = $request->name;
        $adminUser->password  = $request->password;
        $adminUser->email   = $request->email;
        
         if(!empty($request->adminUserId)) { // 更新画面
         $adminUser->adminUser_id = $request->adminUserId;
          $data = $adminUser->adminUserUpdate($adminUser);
         }
       
           else {
               $adminUser->recode_date = $nowDate;
               $adminUser->save();
         }
   
        // リロード等による二重送信防止
        $request->session()->regenerateToken();

        return view('adminUser.complete');
    }

    public function adminUserList()
    {
        $search = null;
        if (!empty($_GET["search"])) {
            $search = $_GET["search"]; // 検索文字列
        }
        // Frameworksモデルのインスタンス化
        $md = new Admin_user(); // メンバーファイルに接続する
        
        // データ取得
        $data = $md->getData($search);
        if (empty($data)) {
            $data = null;
        }

    // ビューを返す
      return view('adminUser.list', ['data' => $data]);
    }
   
    //削除
    public function adminUserDelete(Admin_userRequest $request=null)
    {
        $adminUserId = $_GET["adminUserId"]; // $memberIdに$_GETを入れる。

        $md = new Admin_User(); // メンバーファイルに接続する
        
        $md->adminUserDelete($adminUserId); // 指定したメンバーIDの削除
        
        $data = $md->getData(); // 全てのデータを持ってくる
         
    // ビューを返す
        return view('adminUser.list', ['data' => $data]);
    }
    
    

}


