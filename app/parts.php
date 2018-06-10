<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

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
        $sql = "UPDATE parts SET name = ".'"'.$partsData->name.'"'.
        ", gender = ".$partsData->gender.
        ", address = ".'"'.$partsData->address.'"'.        
        ", tel_1 = ".'"'.$partsData->tel_1.'"'.        
        ", tel_2 = ".'"'.$partsData->tel_2.'"'.   
        ", email = ".'"'.$partsData->email.'"'.
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
    
    //メンバIDから該当するメンバー情報を取得
    /*
     * @param string $memberId
     */
    public function partsSelect($partsId = null)
    {
       $testartsId=2;
       if (empty($partsId))$partsId=$testpartsId;
       $sql = "SELECT * FROM parts where parts_id=".$partsId;
       
       $result = DB::select($sql);
       return array_shift($result);P
    }        
            
}
