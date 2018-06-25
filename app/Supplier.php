<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Supplier extends Model
{
    protected $table = 'supplier';
    const DELETE_FLG_ON = 1;
    const DELETE_FLG_OFF = 0;
    
    public $timestamps = false;
    
    //全てのデータを持ってくる
    public function getData()
    {
    	$data = DB::select("SELECT * FROM supplier where delete_flg = ".self::DELETE_FLG_OFF);

    	return $data;
    }
    

    //指定したメンバーの存在確認
    public function supplierCheck($supplierId)
    {
        $sql = 'select supplier_id from supplier where supplier_id = '.$supplierId." AND delete_flg = ".self::DELETE_FLG_OFF;
        
        $result = DB::select($sql);

        if(!empty($result)) {
            return true;
        }
        
        return false;
    }

    //指定したメンバーを更新
    public function supplierUpdate($supplierData)
    {
        $sql = "UPDATE supplier SET supplier_id = ".$supplierData->supplier_id.      
        ", supplier_num = ".'"'.$supplierData->supplier_num.'"'.
        ", price = ".'"'.$supplierData->price.'"'.        
        ", supplier_date = ".'"'.$supplierData->supplier_date.'"'.  
        " where supplier_id = ".$supplierData->supplier_id;
        
        DB::update($sql);
        
        return true;
    }

    //指定した、メンバーを削除
    public function supplierDelete($supplierId)
    {
        $sql = "UPDATE supplier SET delete_flg = ".self::DELETE_FLG_ON." where supplier_id=".$supplierId;
        
        DB::update($sql);
        
        return true;
    }
    
    //メンバIDから該当するメンバー情報を取得
    /*
     * @param string $supplierId
     */
    public function supplierSelect($supplierId = null)
    {
       $testsupplierId=2;
       if (empty($supplierId))$supplierId=$testsupplierId;
       $sql = "SELECT * FROM supplier where supplier_id=".$supplierId;
       
       $result = DB::select($sql);
       return array_shift($result);
    }        
            
    
    
    
}
