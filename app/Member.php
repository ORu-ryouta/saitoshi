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

    public $timestamps = false;

    public function getData()
    {
    	$data = DB::select("SELECT * FROM member");

    	return $data;
    }
	
}