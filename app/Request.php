<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Request extends Model
{
    protected $table = 'request';
    const DELETE_FLG_ON = 1;
    const DELETE_FLG_OFF = 0;
    
    public $timestamps = false;
    
    //全てのデータを持ってくる
    public function getData()
    {
    	$data = DB::select("SELECT * FROM request where delete_flg = ".self::DELETE_FLG_OFF);

    	return $data;
    }
    
    //companyとcompany_idを持ってくる
    public function  getRequestList()
    {
        $data = DB::select("SELECT request_id,request FROM request where delete_flg = ".self::DELETE_FLG_OFF);
        
        return $data;
    }


    //指定したメンバーの存在確認
    public function requestCheck($requestId)
    {
        $sql = 'select request_id from request where request_id = '.$requestId." AND delete_flg = ".self::DELETE_FLG_OFF;
        
        $result = DB::select($sql);

        if(!empty($result)) {
            return true;
        }
        
        return false;
    }

    //指定したメンバーを更新
    public function requestUpdate($requestData)
    {
        $sql = "UPDATE request SET request = ".'"'.$requestData->company.'"'.
        ", fixer = ".'"'.$requestData->fixer.'"'.
        ", address = ".'"'.$requestData->address.'"'.        
        ", tel = ".'"'.$requestData->tel.'"'.        
        ", note = ".$requestData->note.  
        " where request_id = ".$requestData->company_id;
        
        DB::update($sql);
        
        return true;
    }

    //指定した、メンバーを削除
    public function requestDelete($requestId)
    {
        $sql = "UPDATE request SET delete_flg = ".self::DELETE_FLG_ON." where request_id=".$requestId;
        
        DB::update($sql);
        
        return true;
    }
    
    //メンバIDから該当するメンバー情報を取得
    /*
     * @param string $requestId
     */
    public function requestSelect($requestId = null)
    {
       $testrequestId=2;
       if (empty($requestId))$requestId=$testrequestId;
       $sql = "SELECT * FROM request where request_id=".$requestId;
       
       $result = DB::select($sql);
       return array_shift($result);
    }        
            
    
    
    
}
