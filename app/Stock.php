<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Stock extends Model
{
     /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'stock';
    const DELETE_FLG_ON = 1;
    const DELETE_FLG_OFF = 0;
    
    public $timestamps = false;

    //全てのデータを持ってくる
    public function getData()
    {
    	$data = DB::select("SELECT * FROM stock where delete_flg = ".self::DELETE_FLG_OFF);

    	return $data;
    }

    //指定した在庫の存在確認
    public function stockCheck($stockId)
    {
        $sql = 'select stock_id from stock where member_id = '.$stockId." AND delete_flg = ".self::DELETE_FLG_OFF;
        
        $result = DB::select($sql);

        if(!empty($result)) {
            return true;
        }
        
        return false;
    }

    //指定した在庫を更新
    public function stockUpdate($stockData)
    {
        $sql = "UPDATE stock SET name = ".'"'.$stockData->name.'"'.
        ", gender = ".$stockData->gender.
        ", address = ".'"'.$stockData->address.'"'.        
        ", tel_1 = ".'"'.$stockData->tel_1.'"'.        
        ", tel_2 = ".'"'.$stockData->tel_2.'"'.   
        ", email = ".'"'.$stockData->email.'"'.
        " where stock_id = ".$stockData->stock_id;
        
        DB::update($sql);
        
        return true;
    }

    //指定した、在庫を削除
    public function stockDelete($stockId)
    {
        $sql = "UPDATE stock SET delete_flg = ".self::DELETE_FLG_ON." where stock_id=".$stockId;
        
        DB::update($sql);
        
        return true;
    }
    
    //メンバIDから該当する在庫情報を取得
    /*
     * @param string $stockId
     */
    public function stockSelect($stockId = null)
    {
       $teststockId=2;
       if (empty($stockId))$stockId=$teststockId;
       $sql = "SELECT * FROM stock where stock_id=".$stockId;
       
       $result = DB::select($sql);
       return array_shift($result);
    }        
            
}