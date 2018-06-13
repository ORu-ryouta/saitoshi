<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PartsRequest;
use App\Parts;

class PartsController extends Controller
{
   
	/**
     * 入力画面
     *
     * @return string
     */
    public function partsInput(PartsRequest $request=null)
    {
        if(!empty($_GET["partsId"])) { // 編集（パーツIDがある時）
            $partsId = $_GET["partsId"];
        
        // Frameworksモデルのインスタンス化
        $md = new Parts(); // パーツファイルに接続する
        
        // データ取得
        $data = $md->partsSelect($partsId);
        
        
        } else { // 新規登録（パーツIDがない時）
            
        }
       
        if (empty($data)) {
            $data =null;
        }
        // パーツカテゴリリスト取得
        $partsCategory = self::getPartsCategory();
    
        // インプット画面を表示
        return view('parts.input', ['data' => $data,'partsCategory' => $partsCategory]);
    }
 
    /**
     * 完了画面
     *
     * @return string
     */
    public function partsSave(PartsRequest $request)
    {
     
        $nowDate = date('Y/m/d H:i:s');
        // データベース登録
         $parts = new Parts(); 
        $parts->parts    = $request->parts;
        $parts->category = (int)$request->category;
        
         if(!empty($request->partsId)) { // 更新画面
         $parts->parts_id = $request->partsId;
          $data = $parts->partsUpdate($parts);
         }
         
           else {
               $parts->recode_date = $nowDate;
               $parts->save();
         }
   
        // リロード等による二重送信防止
        $request->session()->regenerateToken();

        return view('parts.complete');
    }

    public function categoryList()
    {
    // Frameworksモデルのインスタンス化
        $md = new Parts(); // パーツファイルに接続する
    // データ取得
        $data = $md->getData();
        if (empty($data)) {
            $data = array(
                array(
                    "parts_id"=>"0",
                    "parts"=>"test編集絶対しない",
                    "category"=>"0",
                    "delete_flg"=>"0",
                    "record_date"=>now(),
                    "update_date"=>now(),
                    )
                );
        }
    //パーツカテゴリのリストを取得する
      $partsCategory = self::getPartsCategory();

    // ビューを返す
    return view('parts.categoryList', ['data' => $data,'partsCategory' => $partsCategory]);
    }
    
    //partsList 
    public function partsList()
    {// Frameworksモデルのインスタンス化
        $md = new Parts(); // パーツファイルに接続する
    // データ取得
        $data = $md->getData();
        if (empty($data)) {
            $data = array(
                array(
                    "parts_id"=>"0",
                    "parts"=>"test編集絶対しない",
                    "category"=>"0",
                    "delete_flg"=>"0",
                    "record_date"=>now(),
                    "update_date"=>now(),
                    )
                );
        }
       
       //パーツカテゴリのリストを取得する
      $partsCategory = self::getPartsCategory();

    // ビューを返す
    return view('parts.partsList', ['data' => $data,'partsCategory' => $partsCategory]);
    
    }
   
    //削除
    public function partsDelete(PartsRequest $request=null)
    {
        $partsId = $_GET["partsId"]; // $partsIdに$_GETを入れる。

        $md = new Parts(); // パーツファイルに接続する
        
        $md->partsDelete($partsId); // 指定したパーツIDの削除
        
        $data = $md->getData(); // 全てのデータを持ってくる
         
    // ビューを返す
        return view('parts.categoryList', ['data' => $data]);
    }
    
    private function getPartsCategory(){
        $partsCategory = array(
            "キャプスタン・Vローラ",
            "ラインホーラ・ネットホーラ",
            "減速機",
            "ドラム",
            "油圧ポンプ・油圧モーター",
            "電磁クラッチ付,油圧ポンプ",
            "オイルタンク",
            "配管材",
            "切換弁",
            "移送ポンプ",
            "電磁クラッチ",
            "プロペラ",
            "プロペラ軸",
            "船尾管",
            "船尾部品",
            "舵スタンチューブ",
            "防食亜鉛",
            "支面材",
            "リモコン・トリムタブ・オートスラスター",
            "中形舶用主機前部駆動装置",
            "電磁クラッチ",
            "油圧クラッチ",
            "ポンプ",
            "ビルジポンプ",
            "ポンプ関連金具",
            "排気システム",
            "キングストン",
            "燃料油濾過機",
            "海水コシ器",
            "ヤンマー純正オイル",
            "バッテリー・バッテリーチャージャー",
            "冷却水用錆剤",
            "液体ガスケット",
            "リンク・Vベルト",
            "スリーブ",
            "洗剤",
            "ビス",
            "ネジ",
            "ボルト",
            "ナット",
            "釘",
            "ワッシャー・シムリング",
            "座金",
            "オイルシール・Oリング・パッキン",
            "金属ー板",
            "金属ー丸棒",
            "金属ーパイプ",
            "スプレー",
            "グリス",
            "接着剤・補修材",
            "溶接用品",
            "切断研磨",
            "手研磨",
            "サンダー・グラインダ研磨",
            "切削工具",
            "消耗備品",
        );
        
        return $partsCategory;
    }
    

}


