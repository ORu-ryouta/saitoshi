<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
    /*
     * @param string $searchSale
     */
    public function getData($searchSale = null)
    {
        $sql = "SELECT * FROM sale where delete_flg = ".self::DELETE_FLG_OFF;
        // 検索文字列がある場合クエリにLIKE文を追加
        if (!empty($searchSale)){
            $sql .= " AND sale LIKE '%".$searchSale."%'";
        }
        
    	$data = DB::select($sql);

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
    
    // demandIdのsaleレコードが存在するか確認する
    public function saleCheckByDemandId($demandId)
    {
        $sql = 'select sale_id from sale where demand_id = '.$demandId." AND delete_flg = ".self::DELETE_FLG_OFF;
        
        $result = DB::select($sql);

        if(!empty($result)) {
            return $result;
        }
        
        return null;
    }

    //指定した注文を更新
    public function saleUpdate($saleData)
    {
        $sql = "UPDATE sale SET sale_id = ".$saleData->sale_id.       
        ", price = ".'"'.$saleData->price.'"'.   
        ", credit_date = ".'"'.$saleData->credit_date.'"'.
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
