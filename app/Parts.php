<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Parts extends Model
{
    //
    
    
     /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'parts';
    const DELETE_FLG_ON = 1;
    const DELETE_FLG_OFF = 0;
    
    public $timestamps = false;

    //全てのデータを持ってくる
    
    public function getData()
    {
        
    	$data = DB::select("SELECT * FROM parts where delete_flg = ".self::DELETE_FLG_OFF);

    	return $data;
    }
    
     //partsとparts_idを持ってくる
    public function  getPartsList()
    {
        $data = DB::select("SELECT parts_id,parts FROM parts" );
        
        return $data;
    }

    //指定したメンバーの存在確認
    public function partsCheck($partsId)
    {
        $sql = 'select parts_id from parts where parts_id = '.$partsId." AND delete_flg = ".self::DELETE_FLG_OFF;
        
        $result = DB::select($sql);

        if(!empty($result)) {
            return true;
        }
        
        return false;
    }

    //指定したメンバーを更新
    public function partsUpdate($partsData)
    {
         $sql = "UPDATE parts SET parts = ".'"'.$partsData->parts.'"'.
        ", category = ".'"'.$partsData->category.'"'.  
        " where parts_id = ".$partsData->parts_id;
        
        DB::update($sql);
        
        return true;
    }

    //指定した、メンバーを削除
    public function partsDelete($partsId)
    {
        $sql = "UPDATE parts SET delete_flg = ".self::DELETE_FLG_ON." where parts_id=".$partsId;
        
        DB::update($sql);
        
        return true;
    }
    
    //パーツIDから該当する部品情報を取得
    /*
     * @param string $partsId
     */
    public function partsSelect($partsId = null)
    {
       $testPartsId=2;
       if (empty($partsId))$partsId=$testPartsId;
       $sql = "SELECT * FROM parts where parts_id=".$partsId;
       
       $result = DB::select($sql);
       return array_shift($result);
    }  
    
    
    //カテゴリから該当する部品情報を取得
    /*
     * @param string $category
     */
    public function partsSeleteByCategory($category = null)
    { 
       $testPartsId=2;
       if (empty($category)) {
           if($category!=0) {
               $category = $testPartsId;
           }
       }
       $sql = "SELECT * FROM parts where category = ".$category." AND delete_flg = ".self::DELETE_FLG_OFF;
       
       $result = DB::select($sql);
       return $result;
        
        
    }
    
  
            
}
