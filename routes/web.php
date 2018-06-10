<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
//    return view('welcome');
    return view('top');
});

Route::get('admin',function(){
    return view('sample');
});

//member画面群のルートパス
Route::group(['as' => 'member::'], function() {
 
    // 入力画面
    Route::get('/memberInput', ['as' => 'input', 'uses' => 'MemberController@memberInput']);
    // 完了画面
    Route::post('/memberSave', ['as' => 'save', 'uses' => 'MemberController@memberSave']);
    // リスト画面
    Route::get('/memberList', ['as' => 'list', 'uses' => 'MemberController@memberList']);
    // 削除画面
    Route::get('/memberDelete',['as' => 'delete', 'uses' => 'MemberController@memberDelete']);
});

//company画面群のルートパス
Route::group(['as' => 'company::'], function() {
 
    // 入力画面
    Route::get('/companyInput', ['as' => 'input', 'uses' => 'CompanyController@companyInput']);
    // 完了画面
    Route::post('/companySave', ['as' => 'save', 'uses' => 'CompanyController@companySave']);
    // リスト画面
    Route::get('/companyList', ['as' => 'list', 'uses' => 'CompanyController@companyList']);
    // 削除画面
    Route::get('/companyDelete',['as' => 'delete', 'uses' => 'CompanyController@companyDelete']);
});
