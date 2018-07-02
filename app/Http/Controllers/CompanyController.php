<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CompanyRequest;
use App\Company;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }
   
	/**
     * 入力画面
     
     * @return string
     */
    public function companyInput(CompanyRequest $request=null)
    {
        if(!empty($_GET["companyId"])) { // 詳細（メンバーIDがある時）
            $companyId = $_GET["companyId"];
        
        // Frameworksモデルのインスタンス化
        $md = new Company(); // カンパニーファイルに接続する
        
        
        // データ取得
        $data = $md->companySelect($companyId);
        
        
        } else { // 新規登録（カンパニーIDがない時）
            
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
    public function companySave(CompanyRequest $request)
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
        $search = null;
        if (!empty($_GET["search"])) {
            $search = $_GET["search"]; // 検索文字列
        }
        // Frameworksモデルのインスタンス化
        $md = new Company(); // カンパニーファイルに接続する
        
        // データ取得
        $data = $md->getData($search);
        if (empty($data)) {
            $data = null;
        }

        // ビューを返す
        return view('company.list', ['data' => $data]);
    }
    
    //削除
    public function companyDelete(CompanyRequest $request=null)
    {
        $companyId = $_GET["companyId"]; // $companyIdに$_GETを入れる。

        $md = new Company(); // カンパニーファイルに接続する
        
        $md->companyDelete($companyId); // 指定したメンバーIDの削除
        
        $data = $md->getData(); // 全てのデータを持ってくる
         
    // ビューを返す
        return view('company.list', ['data' => $data]);
    }
    
    

}


