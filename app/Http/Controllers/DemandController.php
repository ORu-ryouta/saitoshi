<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DemandRequest;
use App\Demand;
use App\Company;

class DemandController extends Controller
{
   
	/**
     * 入力画面
     *
     * @return string
     */
    public function demandInput(DemandRequest $request=null)
    {
        if(!empty($_GET["demandId"])) { // 編集（注文IDがある時）
            $demandId = $_GET["demandId"];
        
        // Frameworksモデルのインスタンス化
        $md = new Demand(); // 注文ファイルに接続する
        
        $aa = new Company(); //companyファイルに接続する
        
        // データ取得
        $data = $md->demandSelect($demandId);
        $data1 = $aa->getCompanyList();
                 
        
        } else { // 新規登録（注文IDがない時）
            
        }
       
        if (empty($data)) {
            $data =null;
        }
        
        // インプット画面を表示
        return view('demand.input', ['data' => $data,'data1' => $data1]);
    }
 
    /**
     * 完了画面
     *
     * @return string
     */
    public function demandSave(demandRequest $request)
    {
     
        $nowDate = date('Y/m/d H:i:s');
        // データベース登録
        $demand = new Demand(); 
        $demand->member_id  = 0;//$request->member_id;
        $demand->category = $request->category;
        $demand->business   = $request->business;
        $demand->work   = $request->work;
        $demand->price   = $request->price;
        $demand->demand_date   = $request->demand_date;
        $demand->receipt_date   = $request->receipt_date;
        $demand->complete_plans   = $request->complete_plans;
        $demand->complete_date   = $request->complete_date;
        $demand->status   = $request->status;
      
         if(!empty($request->demandId)) { // 更新画面
         $demand->demand_id = $request->demandId;
          $data = $demand->demandUpdate($demand);
         }
         
           else {
               $demand->recode_date = $nowDate;
               $demand->save();
         }
   
        // リロード等による二重送信防止
        $request->session()->regenerateToken();

        return view('demand.complete');
    }

    public function demandList()
    {
    // Frameworksモデルのインスタンス化
        $md = new Demand(); // 注文ファイルに接続する
    // データ取得
        $data = $md->getData();
        if (empty($data)) {
            $data = null;
        }

    // ビューを返す
      return view('demand.list', ['data' => $data]);
    }
   
    //削除
    public function demandDelete(DemandRequest $request=null)
    {
        $demandId = $_GET["demandId"]; // $demandIdに$_GETを入れる。

        $md = new Demand(); // 注文ファイルに接続する
        
        $md->demandDelete($demandId); // 指定した注文IDの削除
        
        $data = $md->getData(); // 全てのデータを持ってくる
         
    // ビューを返す
        return view('demand.list', ['data' => $data]);
    }

}


