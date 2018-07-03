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

Route::get('', function () {
//    return view('welcome');
    return view('member/list');
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

//parts画面群のルートパス
Route::group(['as' => 'parts::'], function() {
 
    // 入力画面
    Route::get('/partsInput', ['as' => 'input', 'uses' => 'PartsController@partsInput']);
    // 完了画面
    Route::post('/partsSave', ['as' => 'save', 'uses' => 'PartsController@partsSave']);
    // カテゴリ　リスト画面
    Route::get('/partsCategoryList', ['as' => 'categoryList', 'uses' => 'PartsController@categoryList']);
    // パーツ　リスト画面
    Route::get('/partsList', ['as' => 'partsList', 'uses' => 'PartsController@partsList']);
    // 削除画面
    Route::get('/partsDelete',['as' => 'delete', 'uses' => 'PartsController@partsDelete']);
});

//demand画面群のルートパス
Route::group(['as' => 'demand::'], function() {
 
    // 入力画面
    Route::get('/demandInput', ['as' => 'input', 'uses' => 'DemandController@demandInput']);
    // 完了画面
    Route::post('/demandSave', ['as' => 'save', 'uses' => 'DemandController@demandSave']);
    // リスト画面
    Route::get('/demandList', ['as' => 'list', 'uses' => 'DemandController@demandList']);
    // 削除画面
    Route::get('/demandDelete',['as' => 'delete', 'uses' => 'DemandController@demandDelete']);
});



//sale画面群のルートパス
Route::group(['as' => 'sale::'], function() {
 
    // 入力画面
    Route::get('/saleInput', ['as' => 'input', 'uses' => 'SaleController@saleInput']);
    // 完了画面
    Route::post('/saleSave', ['as' => 'save', 'uses' => 'SaleController@saleSave']);
    // リスト画面
    Route::get('/saleList', ['as' => 'list', 'uses' => 'SaleController@saleList']);
    // 削除画面
    Route::get('/saleDelete',['as' => 'delete', 'uses' => 'SaleController@saleDelete']);
});

//supplier画面群のルートパス
Route::group(['as' => 'supplier::'], function() {
 
    // 入力画面
    Route::get('/supplierInput', ['as' => 'input', 'uses' => 'SupplierController@supplierInput']);
    // 完了画面
    Route::post('/supplierSave', ['as' => 'save', 'uses' => 'SupplierController@supplierSave']);
    // リスト画面
    Route::get('/supplierList', ['as' => 'list', 'uses' => 'SupplierController@supplierList']);
    // 削除画面
    Route::get('/supplierDelete',['as' => 'delete', 'uses' => 'SupplierController@supplierDelete']);
});

//adminUser画面群のルートパス
Route::group(['as' => 'adminUser::'], function() {
 
    // 入力画面
    Route::get('/adminUserInput', ['as' => 'input', 'uses' => 'Admin_userController@adminUserInput']);
    // 完了画面
    Route::post('/adminUserSave', ['as' => 'save', 'uses' => 'Admin_userController@adminUserSave']);
    // リスト画面
    Route::get('/adminUserList', ['as' => 'list', 'uses' => 'Admin_userController@adminUserList']);
    // 削除画面
    Route::get('/adminUserDelete',['as' => 'delete', 'uses' => 'Admin_userController@adminUserDelete']);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
