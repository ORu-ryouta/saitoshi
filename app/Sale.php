<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    
     /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'sale';
    const DELETE_FLG_ON = 1;
    const DELETE_FLG_OFF = 0;
    
    public $timestamps = false;

    //全ての売り上げデータを持ってくる
    public function getData()
    {
    	$data = DB::select("SELECT * FROM sale where delete_flg = ".self::DELETE_FLG_OFF);

    	return $data;
    }

    //指定した売り上げの存在確認
    public function saleCheck($saleId)
    {
        $sql = 'select sale_id from sale where sale_id = '.$saleId." AND delete_flg = ".self::DELETE_FLG_OFF;
        
        $result = DB::select($sql);

        if(!empty($result)) {
            return true;
        }
        
        return false;
    }

    //指定した注文を更新
    public function saleUpdate($saleData)
    {
        $sql = "UPDATE sale SET company_id = ".$saleData->company_id.
        ", category = ".'"'.$saleData->category.'"'.
        ", business = ".'"'.$saleData->business.'"'.        
        ", work = ".'"'.$saleData->work.'"'.        
        ", price = ".'"'.$saleData->price.'"'.   
        ", demand_date = ".'"'.$saleData->demand_date.'"'.
        ", receipt_date = ".'"'.$saleData->receipt_date.'"'.        
        ", complete_plans = ".'"'.$saleData->complete_plans.'"'.        
        ", complete_date = ".'"'.$saleData->complete_date.'"'. 
        ", status = ".'"'.$saleData->status.'"'. 
        " where sale_id = ".$saleData->sale_id;
        
        DB::update($sql);
        
        return true;
    }

    //指定した、注文を削除
    public function saleDelete($saleId)
    {
        $sql = "UPDATE sale SET delete_flg = ".self::DELETE_FLG_ON." where sale_id=".$saleId;
        
        DB::update($sql);
        
        return true;
    }
    
    //売り上げIDから該当する注文情報を取得
    /*
     * @param string $saleId
     */
    public function saleSelect($saleId = null)
    {
       $testSaleId=2;
       if (empty($saleId))$saleId=$testSaleId;
       $sql = "SELECT * FROM sale where sale_id=".$saleId;
       
       $result = DB::select($sql);
       return array_shift($result);
    }        

    
}
