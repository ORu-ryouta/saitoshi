<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class company extends Model
{
    const DELETE_FLG_OFF = 0;
    
    //全てのデータを持ってくる
    public function getData()
    {
    	$data = DB::select("SELECT * FROM company where delete_flg = ".self::DELETE_FLG_OFF);

    	return $data;
    }
}
