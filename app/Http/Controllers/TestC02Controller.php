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
          'data'=>'up_p01本地修改后',
          'name'=>$name
      ]);
      //第二次更新本地项请问A
     echo"1111";

 }
}
