<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestC02Controller extends Controller
{
 public function testc02(Request $request){
     echo '111';
  //验证
    $request->validate([

          'name'=>'required|string'

      ]);

     $name=$request->get('name');
      return response()->json([
          'code'=>'121',
          'data'=>'测试模拟',
          'name'=>$name
      ]);
       //来自p01的项目

     //push 。。
 }
}
