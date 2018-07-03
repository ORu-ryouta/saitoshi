<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Admin_user extends Model
{
     /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'adminUser';
    const DELETE_FLG_ON = 1;
    const DELETE_FLG_OFF = 0;
    
    public $timestamps = false;

    //全てのデータを持ってくる
     /*
     * @param string $searchMember
     */
    public function getData($searchAdmin_user= null)
    {
        $sql = "SELECT * FROM adminUser where delete_flg = ".self::DELETE_FLG_OFF;
        // 検索文字列がある場合クエリにLIKE文を追加
        if (!empty($searchAdmin_user)){
            $sql .= " AND name LIKE '%".$searchAdmin_user."%'";
        }
        
    	$data = DB::select($sql);

    	return $data;
    }

    //指定したメンバーの存在確認
    public function adminUserCheck($adminUserId)
    {
        
        
        $sql = 'select adminUser_id from adminUser where adminUser_id = '.$adminUserId." AND delete_flg = ".self::DELETE_FLG_OFF;
        
        $result = DB::select($sql);

        if(!empty($result)) {
            return true;
        }
        
        return false;
    }

    //指定したメンバーを更新
    public function adminUserUpdate($adminUserData)
    {
        $sql = "UPDATE admin_user SET name = ".'"'.$adminUserData->name.'"'.
        ", password = ".'"'.$adminUserData->password.'"'.          
        ", email = ".'"'.$adminUserData->email.'"'.
        " where adminUser_id = ".$adminUserData->adminUser_id;
        
        DB::update($sql);
        
        return true;
    }

    //指定した、メンバーを削除
    public function adminUserDelete($adminUserId)
    {
        $sql = "UPDATE adminUser SET delete_flg = ".self::DELETE_FLG_ON." where adminUser_id=".$adminUserId;
        
        DB::update($sql);
        
        return true;
    }
    
    //メンバIDから該当するメンバー情報を取得
    /*
     * @param string $memberId
     */
    public function adminUserSelect($adminUserId = null)
    {
       $testAdmin_userId=2;
       if (empty($adminUserId))$adminUserId=$testAdmin_userId;
       $sql = "SELECT * FROM adminUser where adminUser_id=".$adminUserId;
       
       $result = DB::select($sql);
       return array_shift($result);
    }        
            
}