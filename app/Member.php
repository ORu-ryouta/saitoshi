<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Member extends Model
{
     /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'member';
    const DELETE_FLG_ON = 1;
    const DELETE_FLG_OFF = 0;
    const TABLE = "member";
    
    public $timestamps = false;

    //全てのデータを持ってくる
    public function getData()
    {
    	$data = DB::select("SELECT * FROM member");

    	return $data;
    }

    //指定したメンバーの存在確認
    public function memberCheck($memberId)
    {
        $sql = 'select member_id from member where member_id = '.$memberId;
        $result = null;
        $result = DB::statement($sql);

        if(!empty($result)) {
            return true;
        }
        
        return false;
    }

    //指定したメンバーを更新
    public function memberUpdate($memberData)
    {
        $sql = 'UPDATE member SET name = '.$memberData->name.
        ', gender =  '.$memberData->gender.
        ', delete_flg = '.self::DELETE_FLG_OFF.
        ' where member_id = '.$memberData->member_id;
        
        DB::statement($sql);
        
        return true;
    }

    //指定した、メンバーを削除
    public function memberDelete($memberId)
    {
        $sql = 'UPDATE member SET delete_flg = '.self::DELETE_FLG_ON.' where member_id = '.$memberId;
        
        DB::statement($sql);
        
        return true;
    }
    
    //メンバIDから該当するメンバー情報を取得
    public function memberSelect($memberId)
    {
       $sql = "SELECT * FROM member where member_id=".$memberId; 
       
       $result =DB::statement($sql);
       
       return $result;
    }        
            
}