<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
class FormController extends Controller
{
   
	/**
     * 入力画面
     *
     * @return string
     */
    public function input()
    {
        return view('form.input');
    }
 
    /**
     * 完了画面
     *
     * @return string
     */
    public function save(PostRequest $request)
    {
        return view('form.complete');
    }
}
