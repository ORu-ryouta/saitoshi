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
    public function adminUserInput(AdminUserRequest $request=null)
    {
        if(!empty($_GET["admin_userId"])) { // 詳細（メンバーIDがある時）
            $adminUserId = $_GET["admin_userId"];
        
        // Frameworksモデルのインスタンス化
        $md = new AdminUser(); // メンバーファイルに接続する
        
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
    public function adminUserSave(AdminUserRequest $request)
    {
     
        $nowDate = date('Y/m/d H:i:s');
        // データベース登録
        $adminUser = new AdminUser(); 
        $adminUser->name    = $request->name;
        $adminUser->password  = $request->password;
        $adminUser->email   = $request->email;
        
         if(!empty($request->admin_user_id)) { // 更新画面
         $adminUser->admin_user_id = $request->admin_user_id;
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
        $md = new AdminUser(); // メンバーファイルに接続する
        
        // データ取得
        $data = $md->getData($search);
        if (empty($data)) {
            $data = null;
        }

    // ビューを返す
      return view('adminUser.list', ['data' => $data]);
    }
   
    //削除
    public function adminUserDelete(AdminUserRequest $request=null)
    {
        $adminUserId = $_GET["admin_user_id"]; // $memberIdに$_GETを入れる。

        $md = new AdminUser(); // メンバーファイルに接続する
        
        $md->adminUserDelete($adminUserId); // 指定したメンバーIDの削除
        
        $data = $md->getData(); // 全てのデータを持ってくる
         
    // ビューを返す
        return view('adminUser.list', ['data' => $data]);
    }
    
    

}


