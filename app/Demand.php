<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Demand extends Model
{
     /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'demand';
    const DELETE_FLG_ON = 1;
    const DELETE_FLG_OFF = 0;
    
    public $timestamps = false;

    //全ての注文データを持ってくる
    /*
     * @param string $searchDemand
     */
    public function getData($searchDemand = null)
    {
        $sql = "SELECT * FROM demand where delete_flg = ".self::DELETE_FLG_OFF;
        // 検索文字列がある場合クエリにLIKE文を追加
        if (!empty($searchDemand)){
            $sql .= " AND company_id LIKE '%".$searchDemand."%'";
        }
        
    	$data = DB::select($sql);

    	return $data;
    }

    //指定した注文の存在確認
    public function demandCheck($demandId)
    {
        $sql = 'select demand_id from demand where demand_id = '.$demandId." AND delete_flg = ".self::DELETE_FLG_OFF;
        
        $result = DB::select($sql);

        if(!empty($result)) {
            return true;
        }
        
        return false;
    }

    //指定した注文を更新
    public function demandUpdate($demandData)
    {
        $sql = "UPDATE demand SET company_id = ".$demandData->company_id.
        ", category = ".'"'.$demandData->category.'"'.
        ", business = ".'"'.$demandData->business.'"'.        
        ", work = ".'"'.$demandData->work.'"'.        
        ", price = ".'"'.$demandData->price.'"'.   
        ", demand_date = ".'"'.$demandData->demand_date.'"'.
        ", receipt_date = ".'"'.$demandData->receipt_date.'"'.        
        ", complete_plans = ".'"'.$demandData->complete_plans.'"'.        
        ", complete_date = ".'"'.$demandData->complete_date.'"'. 
        ", status = ".'"'.$demandData->status.'"'. 
        " where demand_id = ".$demandData->demand_id;
        
        DB::update($sql);
        
        return true;
    }

    //指定した、注文を削除
    public function demandDelete($demandId)
    {
        $sql = "UPDATE demand SET delete_flg = ".self::DELETE_FLG_ON." where demand_id=".$demandId;
        
        DB::update($sql);
        
        return true;
    }
    
    //注文IDから該当する注文情報を取得
    /*
     * @param string $demandId
     */
    public function demandSelect($demandId = null)
    {
       $testDemandId=2;
       if (empty($demandId))$demandId=$testDemandId;
       $sql = "SELECT * FROM demand where demand_id=".$demandId;
       
       $result = DB::select($sql);
       return array_shift($result);
    }   
    
    
    // companyとdemand _idを持ってくる
    public function  getDemandList()
    {
        $data = DB::select("SELECT demand.demand_id,company.company from "
                . "demand inner join company on demand.company_id = company.company_id where demand.delete_flg = ".self::DELETE_FLG_OFF);
       
        return $data;
    }
            
            
            
}