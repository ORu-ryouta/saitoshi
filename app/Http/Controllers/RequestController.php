<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RequestRequest;
use App\Request;

class RequestController extends Controller
{
   
	/**
     * 入力画面
     
     * @return string
     */
    public function requestInput(requestRequest $request=null)
    {
        if(!empty($_GET["requestId"])) { // 編集（メンバーIDがある時）
            $requestId = $_GET["requestId"];
        
        // Frameworksモデルのインスタンス化
        $md = new Request(); // カンパニーファイルに接続する
        
        
        // データ取得
        $data = $md->requestSelect($requestId);
        
        
        } else { // 新規登録（カンパニーIDがない時）
            
        }
       
        if (empty($data)) {
            $data =null;
        }
        
        // インプット画面を表示
        return view('request.input', ['data' => $data]);
    }
 
    /**
     * 完了画面
     *
     * @return string
     */
    public function requestSave(requestRequest $request)
    {
     
        $nowDate = date('Y/m/d H:i:s');
        // データベース登録
        $dbRequest = new Request(); 
        $dbRequest->company    = $request->company;
        $dbRequest->fixer  = $request->fixer;
        $dbRequest->address = $request->address;
        $dbRequest->tel   = $request->tel;
        $dbRequest->note   = $request->note;
      
        
         if(!empty($request->requestId)) { // 更新画面
         $dbRequest->request_id = $request->requestId;
          $data = $dbRequest->requestUpdate($dbRequest);
         }
         
           else {$dbRequest->recode_date = $nowDate;
        $dbRequest->save();
         }
   
        // リロード等による二重送信防止
        $request->session()->regenerateToken();

        return view('request.complete');
    }

    public function requestList()
    {
    // Frameworksモデルのインスタンス化
        $md = new Request(); // カンパニーファイルに接続する
    // データ取得
        $data = $md->getData();
        if (empty($data)) {
            $data = null;
        }

    // ビューを返す
      return view('request.list', ['data' => $data]);
    }
    
    //削除
    public function requestDelete(RequestRequest $request=null)
    {
        $requestId = $_GET["requestId"]; // $companyIdに$_GETを入れる。

        $md = new Request(); // カンパニーファイルに接続する
        
        $md->requestDelete($companyId); // 指定したメンバーIDの削除
        
        $data = $md->getData(); // 全てのデータを持ってくる
         
    // ビューを返す
        return view('request.list', ['data' => $data]);
    }

}


