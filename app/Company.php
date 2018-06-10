<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class company extends Model
{
    protected $table = 'company';
    const DELETE_FLG_ON = 1;
    const DELETE_FLG_OFF = 0;
    
    public $timestamps = false;
    
    //全てのデータを持ってくる
    public function getData()
    {
    	$data = DB::select("SELECT * FROM company where delete_flg = ".self::DELETE_FLG_OFF);

    	return $data;
    }
    
    //指定したメンバーの存在確認
    public function companyCheck($companyId)
    {
        $sql = 'select company_id from company where company_id = '.$companyId." AND delete_flg = ".self::DELETE_FLG_OFF;
        
        $result = DB::select($sql);

        if(!empty($result)) {
            return true;
        }
        
        return false;
    }

    //指定したメンバーを更新
    public function companyUpdate($companyData)
    {
        $sql = "UPDATE company SET company = ".'"'.$companyData->company.'"'.
        ", fixer = ".'"'.$companyData->fixer.'"'.
        ", address = ".'"'.$companyData->address.'"'.        
        ", tel = ".'"'.$companyData->tel.'"'.        
        ", note = ".'"'.$companyData->note.'"'.   
        " where company_id = ".$companyData->company_id;
        
        DB::update($sql);
        
        return true;
    }

    //指定した、メンバーを削除
    public function companyDelete($companyId)
    {
        $sql = "UPDATE company SET delete_flg = ".self::DELETE_FLG_ON." where company_id=".$companyId;
        
        DB::update($sql);
        
        return true;
    }
    
    //メンバIDから該当するメンバー情報を取得
    /*
     * @param string $companyId
     */
    public function companySelect($companyId = null)
    {
       $testcompanyId=2;
       if (empty($companyId))$companyId=$testcompanyId;
       $sql = "SELECT * FROM company where company_id=".$companyId;
       
       $result = DB::select($sql);
       return array_shift($result);
    }        
            
    
    
    
}
