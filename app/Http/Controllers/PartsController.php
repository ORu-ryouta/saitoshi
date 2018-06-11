<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PartsRequest;
use App\Parts;

class PartsController extends Controller
{
   
	/**
     * 入力画面
     *
     * @return string
     */
    public function partsInput(PartsRequest $request=null)
    {
        if(!empty($_GET["partsId"])) { // 編集（メンバーIDがある時）
            $partsId = $_GET["partsId"];
        
        // Frameworksモデルのインスタンス化
        $md = new Parts(); // パーツファイルに接続する
        
        // データ取得
        $data = $md->partsSelect($partsId);
        
        
        } else { // 新規登録（パーツIDがない時）
            
        }
       
        if (empty($data)) {
            $data =null;
        }
        
        // インプット画面を表示
        return view('parts.input', ['data' => $data]);
    }
 
    /**
     * 完了画面
     *
     * @return string
     */
    public function partsSave(PartsRequest $request)
    {
     
        $nowDate = date('Y/m/d H:i:s');
        // データベース登録
         $parts = new Parts(); 
        $parts->company    = $request->company;
        $parts->fixer  = $request->fixer;
        $parts->address = $request->address;
        $parts->tel   = $request->tel;
        $parts->note   = $request->note;
        
         if(!empty($request->partsId)) { // 更新画面
         $parts->parts_id = $request->partsId;
          $data = $parts->partsUpdate($parts);
         }
         
           else {$parts->recode_date = $nowDate;
        $parts->save();
         }
   
        // リロード等による二重送信防止
        $request->session()->regenerateToken();

        return view('parts.complete');
    }

    public function partsList()
    {
    // Frameworksモデルのインスタンス化
        $md = new Parts(); // パーツファイルに接続する
    // データ取得
        $data = $md->getData();
        if (empty($data)) {
            $data = array("parts"=>"test");
        }

    // ビューを返す
      return view('parts.list', ['data' => $data]);
    }
   
    //削除
    public function partsDelete(PartsRequest $request=null)
    {
        $partsId = $_GET["partsId"]; // $partsIdに$_GETを入れる。

        $md = new Parts(); // メンバーファイルに接続する
        
        $md->partsDelete($partsId); // 指定したパーツIDの削除
        
        $data = $md->getData(); // 全てのデータを持ってくる
         
    // ビューを返す
        return view('parts.list', ['data' => $data]);
    }

}


