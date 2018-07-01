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
            
        } else if(!empty($_GET["demandId"])) { // 注文詳細からの遷移時（注文IDがある時）
            $demandId = $_GET["demandId"]; // リクエストで送られたdemandIdを変数に格納

            // saleテーブルに注文IDに該当するデータが存在するかチェック
            $dbSale = new Sale(); // Sale.phpを使用するため$dbSaleとして宣言
            $saleId = $dbSale->saleCheckByDemand($demandId); // demandId用チェック関数を使用　返り値:saleId)
            
            if ($saleId) {// demandIdに該当するsaleIdがあった
                $data = $dbSale->saleSelect($saleId); // saleIdに紐づく全てのデータを取得する
            } else { // saleIdが存在しないため代わりにdemandテーブルのデータを使用する
                // demandテーブルに保存されている(demandId,price)を取得する
                $dbDemand   = new Demand(); //Demand.phpを使用するため$dbDemandとして宣言
                $demandData = $dbDemand->demandSelect($demandId); // demandIdに紐づく全てのデータを取得する
                
                // 取得したdemandデータをsaleのデータに変換する
                $data = new Sale(); // saleクラスを使用する
                $data->demand_id   = $demandData->demand_id;
                $data->price       = $demandData->price;
                $data->credit_date = now(); // とりあえず現在時刻
            }
        }else { // 新規登録
            $data =null;
        }
       
        if (empty($data)) { // データがないので新規登録。念のためデータを空にする
            $data =null;
        }

        // 売上げ詳細画面を表示
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