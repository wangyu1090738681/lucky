<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/test', function () {
    return "hello lucky";
});

//控制器路由写法
Route::get('/hometest/test1','TestController@test1');
//DB门面的增删改查
Route::group(['prefix'=>'/home/test'],function(){
        Route::get('add','TestController@add');
        Route::get('del','TestController@del');
    Route::get('update','TestController@update');
    Route::get('select','TestController@select');
    Route::get('showView','TestController@showView');
    Route::get('showView2','TestController@showView2');
    Route::get('test6','TestController@test6');
    Route::post('test7','TestController@test7' );
});
//测试路由
//添加数据路由
 Route::get('test8','TestController@test8');
 //查询数据路由
Route::get('test9','TestController@test9');
//修改数据路由
Route::get('test10','TestController@test10');
//创建一个自动验证的路由
Route::post('check','TestController@check');
//定义cache路由
//Route::get('huancun','TestController@huancun');

Route::get('log','TestController@log');
//模拟
Route::get('c02','TestC02Controller@testc02');


