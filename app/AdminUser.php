<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class AdminUser extends Model
{
     /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'admin_user';
    const DELETE_FLG_ON = 1;
    const DELETE_FLG_OFF = 0;
    
    public $timestamps = false;

    //全てのデータを持ってくる
     /*
     * @param string $searchMember
     */
    public function getData($searchAdminUser= null)
    {
        $sql = "SELECT * FROM admin_user where delete_flg = ".self::DELETE_FLG_OFF;
        // 検索文字列がある場合クエリにLIKE文を追加
        if (!empty($searchAdminUser)){
            $sql .= " AND name LIKE '%".$searchAdminUser."%'";
        }
        
    	$data = DB::select($sql);

    	return $data;
    }

    //指定したメンバーの存在確認
    public function admin_userCheck($admin_userId)
    {
        
        
        $sql = 'select admin_user_id from admin_user where admin_user_id = '.$admin_userId." AND delete_flg = ".self::DELETE_FLG_OFF;
        
        $result = DB::select($sql);

        if(!empty($result)) {
            return true;
        }
        
        return false;
    }

    //指定したメンバーを更新
    public function admin_userUpdate($admin_userData)
    {
        $sql = "UPDATE admin_user SET name = ".'"'.$admin_userData->name.'"'.
        ", password = ".'"'.$admin_userData->password.'"'.          
        ", email = ".'"'.$admin_userData->email.'"'.
        " where admin_user_id = ".$admin_userData->admin_user_id;
        
        DB::update($sql);
        
        return true;
    }

    //指定した、メンバーを削除
    public function admin_userDelete($admin_userId)
    {
        $sql = "UPDATE admin_user SET delete_flg = ".self::DELETE_FLG_ON." where admin_user_id=".$admin_userId;
        
        DB::update($sql);
        
        return true;
    }
    
    //メンバIDから該当するメンバー情報を取得
    /*
     * @param string $memberId
     */
    public function admin_userSelect($admin_userId = null)
    {
       $testAdmin_userId=2;
       if (empty($admin_userId))$admin_userId=$testAdminUserId;
       $sql = "SELECT * FROM admi_user where admin_user_id=".$admin_userId;
       
       
       $result = DB::select($sql);
       return array_shift($result);
    }        
            
}