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

    //全てのデータを持ってくる
    public function getData()
    {
    	$data = DB::select("SELECT * FROM demand where delete_flg = ".self::DELETE_FLG_OFF);

    	return $data;
    }

    //指定したメンバーの存在確認
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
        $sql = "UPDATE demand SET demand = ".'"'.$demandData->demand.'"'.
        ", member_id = ".$demandData->member_id.
        ", category = ".'"'.$demandData->category.'"'.
        ", business = ".'"'.$demandData->business.'"'.        
        ", work = ".'"'.$demandData->work.'"'.        
        ", price = ".'"'.$demandData->price.'"'.   
        ", oder_date = ".'"'.$demandData->oder_date.'"'.
        ", receipt_date = ".'"'.$demandData->receipt_date.'"'.        
        ", complete_plans = ".'"'.$demandData->complete_plans.'"'.        
        ", complete_date = ".'"'.$demandData->complete_date.'"'. 
        ", status = ".'"'.$demandData->status.'"'. 
        " where demand_id = ".$demandData->demand_id;
        
        DB::update($sql);
        
        return true;
    }

    //指定した、メンバーを削除
    public function demandDelete($demandId)
    {
        $sql = "UPDATE demand SET delete_flg = ".self::DELETE_FLG_ON." where demand_id=".$demandId;
        
        DB::update($sql);
        
        return true;
    }
    
    //メンバIDから該当する注文情報を取得
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
            
}