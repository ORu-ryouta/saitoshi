<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SaleRequest;
use App\Sale;
use App\Demand;

class SaleController extends Controller
{
   
	/**
     * 入力画面
     *
     * @return string
     */
    public function saleInput(SaleRequest $request=null)
    {
         if(!empty($_GET["saleId"])) { // 詳細（メンバーIDがある時）
            $saleId = $_GET["saleId"];
        
        // Frameworksモデルのインスタンス化
        $md = new Sale(); // カンパニーファイルに接続する
        
        
        // データ取得
        $data = $md->saleSelect($saleId);
        
        
        } else { // 新規登録（カンパニーIDがない時）
            
        }
       
        if (empty($data)) {
            $data =null;
        }
        
     
        
        $aa = new Demand(); //saleファイルに接続する
        $data1 = $aa->getDemandList();
        if(!empty($_GET["demandId"])) { // 詳細（注文IDがある時）
            $demandId = $_GET["demandId"];
        }
        
        // インプット画面を表示
        return view('sale.input', ['data' => $data,'data1' => $data1]);
    }
 
    /**
     * 完了画面
     *
     * @return string
     */
    public function saleSave(saleRequest $request)
    {
     
        $nowDate = date('Y/m/d H:i:s');
        // データベース登録
        $sale = new Sale(); 
        $sale->demand_id  = $request->demand_id;
        $sale->price   = $request->price;
        $sale->credit_date   = $request->credit_date;
      
         if(!empty($request->saleId)) { // 更新画面
         $sale->sale_id = $request->saleId;
          $data = $sale->saleUpdate($sale);
         }
         
           else {
               $sale->recode_date = $nowDate;
               $sale->save();
         }
   
        // リロード等による二重送信防止
        $request->session()->regenerateToken();

        return view('sale.complete');
    }

    public function saleList()
    {
        $search = null;
        if (!empty($_GET["search"])) {
            $search = $_GET["search"]; // 検索文字列
        }  
        // Frameworksモデルのインスタンス化
        $md = new Sale(); // 注文ファイルに接続する
        //
        // データ取得
        $data = $md->getData($search);
        if (empty($data)) {
            $data = null;
        }
        
        $aa = new Demand(); //demandファイルに接続する
       $data1 = $aa->getdemandList();
       
       // data1を元に配列番号をdemand_idに値をdemandにした配列を作成する
       $demandNameList = array();
       foreach ($data1 as $demand) {
           $demandNameList[$demand->demand_id] = $demand->company;
       }      

        


    // ビューを返す
      return view('sale.list', ['data' => $data,'demandNameList' => $demandNameList]);
    }
   
       
    
    
    
   
    //削除
    public function saleDelete(saleRequest $request=null)
    {
        $saleId = $_GET["saleId"]; // $saleIdに$_GETを入れる。

        $md = new Sale(); // 売り上げファイルに接続する
        
        $md->saleDelete($saleId); // 指定した注文IDの削除
        
        $data = $md->getData(); // 全てのデータを持ってくる
         
        $aa = new Demand(); //demandファイルに接続する
       $data1 = $aa->getdemandList();
       
       // data1を元に配列番号をdemand_idに値をdemandにした配列を作成する
       $demandNameList = array();
       foreach ($data1 as $demand) {
           $demandNameList[$demand->demand_id] = $demand->company;
       }      
       
    // ビューを返す
        return view('sale.list', ['data' => $data,'demandNameList' => $demandNameList]);
    }

}