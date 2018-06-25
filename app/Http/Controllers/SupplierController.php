<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SupplierRequest;
use App\Supplier;
use App\Company;
use App\Parts;

class SupplierController extends Controller
{
   
	/**
     * 入力画面
     
     * @return string
     */
    public function supplierInput(SupplierRequest $request=null)
    {
        $aa = new Company(); //companyファイルに接続する
        $data1 = $aa->getCompanyList();
        if(!empty($_GET["supplierId"])) { // 編集（会社IDがある時）
            $supplierId = $_GET["supplierId"];
        
        
        $aa = new Parts(); //partsファイルに接続する
        $data2 = $aa->getPartsList();
        if(!empty($_GET["supplierId"])) { // 編集（部品IDがある時）
            $supplierId = $_GET["supplierId"];
        }
        
        // Frameworksモデルのインスタンス化
        $md = new Supplier(); // カンパニーファイルに接続する
        
        
        // データ取得
        $data = $md->supplierSelect($supplierId);
        
        
        } else { // 新規登録（カンパニーIDがない時）
            
        }
       
        if (empty($data)) {
            $data =null;
        }

        // インプット画面を表示
        return view('supplier.input', ['data' => $data,'data1' => $data1,'data2' => $data2]);
    }
 
    /**
     * 完了画面
     *
     * @return string
     */
    public function supplierSave(SupplierRequest $request)
    {
     
        $nowDate = date('Y/m/d H:i:s');
        // データベース登録
        $supplier = new Supplier(); 
        $sale->parts_id  = $request->parts_id;
        $sale->company_id  = $request->company_id;
        $supplier->request_num    = $request->request_num;
        $supplier->price  = $request->price;
        $supplier->request_date = $request->request_date;
       
      
        
         if(!empty($request->supplierId)) { // 更新画面
         $supplier->supplier_id = $request->supplierId;
          $data = $supplier->supplierUpdate($supplier);
         }
         
           else {$supplier->recode_date = $nowDate;
        $supplier->save();
         }
   
        // リロード等による二重送信防止
        $request->session()->regenerateToken();

        return view('supplier.complete');
    }

    public function supplierList()
    {
        
        $aa = new Company(); //companyファイルに接続する
       $data1 = $aa->getCompanyList();
       
       // data1を元に配列番号をcompany_idに値をcompanyにした配列を作成する
       $companyNameList = array();
       foreach ($data1 as $company) {
           $companyNameList[$company->company_id] = $company->company; 
       }      
       
       $bb = new Parts(); //partsファイルに接続する
       $data2 = $bb->getpartsList();
       
       // data2を元に配列番号をparts_idに値をpartsにした配列を作成する
       $partsNameList = array();
       foreach ($data2 as $parts) {
           $partsNameList[$parts->parts_id] = $parts->parts;
       }      
       
       
    // Frameworksモデルのインスタンス化
        $md = new Supplier(); // カンパニーファイルに接続する
    // データ取得
        $data = $md->getData();
        if (empty($data)) {
            $data = null;
        }
        
    // ビューを返す
      return view('supplier.list', ['data' => $data,'companyNameList' => $companyNameList,'partsNameList' => $partsNameList]);
    }
    
    //削除
    public function supplierDelete(SupplierRequest $request=null)
    {
        $supplierId = $_GET["supplierId"]; // $companyIdに$_GETを入れる。

        $md = new Supplier(); // カンパニーファイルに接続する
        
        $md->supplierDelete($supplierId); // 指定したメンバーIDの削除
        
        $data = $md->getData(); // 全てのデータを持ってくる
         
    // ビューを返す
        return view('supplier.list', ['data' => $data]);
    }

}


