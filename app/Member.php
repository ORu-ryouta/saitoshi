<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Member extends Model
{
     /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'member';
    const DELETE_FLG_ON = 1;
    const DELETE_FLG_OFF = 0;

    public $timestamps = false;

    public function getData()
    {
    	$data = DB::select("SELECT * FROM member");

    	return $data;
    }

    public function memberCheck($memberId)
    {
        $sql = 'select member_id from '.$table.' where member_id = '.$memberId;
        $result = null;
        $result = DB::statement($sql);

        if(!empty($result)) {
            return true;
        }
        
        return false;
    }

    public function memberUpdate($memberData)
    {
        $sql = 'UPDATE '.$table.
        ' SET name = '.$memberData->name.
        ', gender =  '.$memberData->gender.
        ', delete_flg = '.self::DELETE_FLG_OFF.
        ' where member_id = '.$memberData->member_id;
        
        DB::statement($sql);
        
        return true;
    }

	public function memberDelete($memberId)
    {
        $sql = 'UPDATE '.$table.' SET delete_flg = '.self::DELETE_FLG_ON.' where member_id = '.$memberId;
        
        DB::statement($sql);
        
        return true;
    }
}