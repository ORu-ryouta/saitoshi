<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SaleRequest;
use App\Sale;
use App\Company;

class SaleController extends Controller
{
   
	/**
     * 入力画面
     *
     * @return string
     */
    public function saleInput(SaleRequest $request=null)
    {
        
        $aa = new Company(); //saleファイルに接続する
        $data1 = $aa->getCompanyList();
        if(!empty($_GET["saleId"])) { // 編集（注文IDがある時）
            $saleId = $_GET["saleId"];
        
        // Frameworksモデルのインスタンス化
        $md = new Sale(); // 注文ファイルに接続する
        
        
        
        // データ取得
        $data = $md->saleSelect($saleId);
                 
        
        } else { // 新規登録（売り上げIDがない時）
            
        }
       
        if (empty($data)) {
            $data =null;
        }
        
        // 注文ステータスリスト取得
        $statusNameList = self::saleStatus();
        
        // 注文カテゴリリスト取得
        $categoryNameList = self::saleCategory();
        
        // インプット画面を表示
        return view('sale.input', ['data' => $data,'data1' => $data1,'status' => $statusNameList,'category' => $categoryNameList]);
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
        $sale->company_id  = $request->company_id;
        $sale->category = $request->category;
        $sale->business   = $request->business;
        $sale->work   = $request->work;
        $sale->price   = $request->price;
        $sale->demand_date   = $request->demand_date;
        $sale->receipt_date   = $request->receipt_date;
        $sale->complete_plans   = $request->complete_plans;
        $sale->complete_date   = $request->complete_date;
        $sale->status   = $request->status;
      
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
       $aa = new Company(); //companyファイルに接続する
       $data1 = $aa->getCompanyList();
       
       // data1を元に配列番号をcompany_idに値をcompanyにした配列を作成する
       $companyNameList = array();
       foreach ($data1 as $company) {
           $companyNameList[$company->company_id] = $company->company;
       }

    
           
        
    // Frameworksモデルのインスタンス化
        $md = new Sale(); // 注文ファイルに接続する
    // データ取得
        $data = $md->getData();
        if (empty($data)) {
            $data = null;
        }
        
        // 注文ステータスリスト取得
        $statusNameList = self::saleStatus();
        
        // 注文カテゴリリスト取得
        $categoryNameList = self::saleCategory();

    // ビューを返す
      return view('sale.list', ['data' => $data,'companyNameList' => $companyNameList,'status' => $statusNameList,'category' => $categoryNameList]);
    }
   
       
    
    
    
   
    //削除
    public function saleDelete(saleRequest $request=null)
    {
        $saleId = $_GET["saleId"]; // $saleIdに$_GETを入れる。

        $md = new Sale(); // 売り上げファイルに接続する
        
        $md->saleDelete($saleId); // 指定した注文IDの削除
        
        $data = $md->getData(); // 全てのデータを持ってくる
         
    // ビューを返す
        return view('sale.list', ['data' => $data]);
    }
    
     private function saleStatus(){
             
        $statusNameList= array(
            "完了",
            "進行中",
            "未受注",
            "保留",
            "破棄",
            );
        return $statusNameList;
     }
     
     
     private function saleCategory(){
                
        $categoryNameList= array(
           "メンテナンス",
           "発注",
           "クレーム",
           );
       return $categoryNameList;
     }

}


