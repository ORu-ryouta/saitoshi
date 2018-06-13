<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StockrRequest;
use App\Member;

class StockController extends Controller
{
   
	/**
     * 入力画面
     *
     * @return string
     */
    public function stockInput(StockRequest $request=null)
    {
        if(!empty($_GET["stockId"])) { // 編集（在庫IDがある時）
            $stockId = $_GET["stockId"];
        
        // Frameworksモデルのインスタンス化
        $md = new Stock(); // 在庫ファイルに接続する
        
        // データ取得
        $data = $md->stockSelect($stockId);
        
        
        } else { // 新規登録（在庫IDがない時）
            
        }
       
        if (empty($data)) {
            $data =null;
        }
        
        // インプット画面を表示
        return view('stock.input', ['data' => $data]);
    }
 
    /**
     * 完了画面
     *
     * @return string
     */
    public function stockSave(StockRequest $request)
    {
     
        $nowDate = date('Y/m/d H:i:s');
        // データベース登録
        $stock = new Member(); 
        $stock->name    = $request->name;
        $stock->gender  = $request->gender;
        $stock->address = $request->address;
        $stock->tel_1   = $request->tel_1;
        $stock->tel_2   = $request->tel_2;
        $stock->email   = $request->email;
        
         if(!empty($request->stockId)) { // 更新画面
         $stock->stock_id = $request->stockId;
          $data = $stock->stockUpdate($stock);
         }
         
           else {
               $stock->recode_date = $nowDate;
               $stock->save();
         }
   
        // リロード等による二重送信防止
        $request->session()->regenerateToken();

        return view('stock.complete');
    }

    public function stockList()
    {
    // Frameworksモデルのインスタンス化
        $md = new Stock(); // 在庫ファイルに接続する
    // データ取得
        $data = $md->getData();
        if (empty($data)) {
            $data = array("name"=>"test");
        }

    // ビューを返す
      return view('stock.list', ['data' => $data]);
    }
   
    //削除
    public function stockDelete(StockRequest $request=null)
    {
        $stockId = $_GET["stockId"]; // $stockIdに$_GETを入れる。

        $md = new Stock(); // 在庫ファイルに接続する
        
        $md->stockDelete($stockId); // 指定した在庫IDの削除
        
        $data = $md->getData(); // 全てのデータを持ってくる
         
    // ビューを返す
        return view('stock.list', ['data' => $data]);
    }

}


