<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Company;

class CompanyController extends Controller
{
   
	/**
     * 入力画面
     *
     * @return string
     */
    public function input(PostRequest $request=null)
    {
        if(!empty($_GET["companyId"])) { // 編集（メンバーIDがある時）
            $companyId = $_GET["companyId"];
        
        // Frameworksモデルのインスタンス化
        $md = new Company(); // メンバーファイルに接続する
        
        // データ取得
        $data = $md->companySelect($companyId);
        
        
        } else { // 新規登録（メンバーIDがない時）
            
        }
       
        if (empty($data)) {
            $data =null;
        }
        
        // インプット画面を表示
        return view('company.input', ['data' => $data]);
    }
 
    /**
     * 完了画面
     *
     * @return string
     */
    public function save(PostRequest $request)
    {
     
        $nowDate = date('Y/m/d H:i:s');
        // データベース登録
        $company = new Company(); 
        $company->company    = $request->company;
        $company->fixer  = $request->fixer;
        $company->address = $request->address;
        $company->tel   = $request->tel;
        $company->note   = $request->note;
      
        
         if(!empty($request->companyId)) { // 更新画面
         $company->company_id = $request->companyId;
          $data = $company->companyUpdate($company);
         }
         
           else {$company->recode_date = $nowDate;
        $company->save();
         }
   
        // リロード等による二重送信防止
        $request->session()->regenerateToken();

        return view('company.complete');
    }

    public function companyList()
    {
    // Frameworksモデルのインスタンス化
        $md = new Company(); // カンパニーファイルに接続する
    // データ取得
        $data = $md->getData();
        if (empty($data)) {
            $data = array("company"=>"test");
        }

    // ビューを返す
      return view('company.list', ['data' => $data]);
    }
    
    //削除
    public function companyDelete(PostRequest $request=null)
    {
        $companyId = $_GET["companyId"]; // $memberIdに$_GETを入れる。

        $md = new Company(); // メンバーファイルに接続する
        
        $md->companyDelete($companyId); // 指定したメンバーIDの削除
        
        $data = $md->getData(); // 全てのデータを持ってくる
         
    // ビューを返す
        return view('company.list', ['data' => $data]);
    }

}


