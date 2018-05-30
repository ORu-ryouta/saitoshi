<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
     /**
    * The table associated with the model.
    *
    * @var string
    */
    protected $table = 'members';

    public $timestamps = false;

    public function getData()
    {
    	$data = DB::table($this->table)->get();

    	return $data;
    }
	
}