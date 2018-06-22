<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SupplierRequest;
use App\Supplier;

class SupplierController extends Controller
{
   
	/**
     * 入力画面
     
     * @return string
     */
    public function supplierInput(supplierRequest $supplier=null)
    {
        if(!empty($_GET["supplierId"])) { // 編集（メンバーIDがある時）
            $requestId = $_GET["supplierId"];
        
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
        return view('supplier.input', ['data' => $data]);
    }
 
    /**
     * 完了画面
     *
     * @return string
     */
    public function supplierSave(supplierRequest $request)
    {
     
        $nowDate = date('Y/m/d H:i:s');
        // データベース登録
        $supplier = new Supplier(); 
        $supplier->company    = $request->company;
        $supplier->fixer  = $request->fixer;
        $supplier->address = $request->address;
        $supplier->tel   = $request->tel;
        $supplier->note   = $request->note;
      
        
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
    // Frameworksモデルのインスタンス化
        $md = new Supplier(); // カンパニーファイルに接続する
    // データ取得
        $data = $md->getData();
        if (empty($data)) {
            $data = null;
        }

    // ビューを返す
      return view('supplier.list', ['data' => $data]);
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


