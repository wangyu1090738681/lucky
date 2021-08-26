<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;//命名空间三元素 常量，方法，类
use App\Models\Member;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TestController extends Controller
{
    //测试控制器路由的使用
    public function test1(){
        return 1;
    }
    //test2测试input获取数据
      public function test2(Request $request){
        $this->test1();
    }

      function add(){
        //定义用户关联的表;
          $db=DB::table('member');
          //使用insert添加记录
         $result=$db->insert([
              ['name'=>'韩梅梅',
                  'age'=>'35',
                  'email'=>'hanmeimei@qq.com'
          ],['name'=>'李雪英',
                  'age'=>'22',
                  'email'=>'lixueying@qq.com']]);
         dd($result);
      }
      function update()
      {
          //定义用户关联的表
          $db = DB::table('member');
          $result = $db->where("id", "=", "2")->update([
              "name" => "李雪迎",
              "age" => "23"
          ]);
          dd($result);

      }
      function select(){
        //定义用户关联的表
          $db=DB::table('member');

        $result1=$db->get();//得到数据库全部数据信息
          //通过foreach循环进行遍历打印
          foreach($result1 as $key=>$value){
              echo "姓名:{$value->name}.年龄为{$value->age}.的邮箱地址为{$value->email}.<br>";
          }
         // dd($result1);//打印
          //获取单行数据
          $result2=$db->first();
//          dd($result2);
            //只取指定条件的数据
           $result3=$db->where('age','=','23')->get();
           //dd($result3);
           //取多条指定条件的数据
          $result4=$db->where('id','=','1')->orwhere('age','23')->get();
           //dd($result4);
          //取指定字段的值
        /*dd($db->when(true, function ($q) {

        }));*/
      }
      function showView(){
        /*$date=date('Y-m-d',time());//创建时间并规定格式
          $day="日";//手动定义日期值
          $time=strtotime('+1 year');
      //  return View('showHome/test3',['date'=>$date,'day'=>$day]); 变量分配与展示，使用数组方式
          return View('showHome/test3',compact('date','day','time'));//使用compact()函数进行变量值的分配*/
          //获取数据库数据
          $db=DB::table('member');
          $person=$db->get();
           $weak=date('N');
          return(View('showHome/test4',compact('person','weak')));
      }
      public function showView2(){
        return(View('showHome/test5'));
      }
    public function test6(Request $request){
        return response()->json(
            [
                'code' => 0,
                'msg' => '操作成功',
                'data' => [
                    'name' => 'davis'
                ]
            ]
        );

    }
    public function test7(){
        return(View('showHome/test7'));
    }
    public function test8(Request $request){
        $name = $request->get('name');
        $age = $request->get('age');
        $email = $request->get('email');
        $result = Member::add($name,$age,$email);
        dd($result);
    }

    public function test9(Request  $request){
        //查询数据
        $n=$request->get('n');
         $result= Member::sel($n);
         dd($result);
    }
    public function test10(Request  $request){
      //修改数据
       $name= $request->get('name');
       $id= $request->get('id');
     $result=  Member::upd($name,$id);
     dd($result);

    }
    public function check(Request  $request){
        //验证
        if($request->method()=='POST'){
            //验证

            $this->validate($request,[
                'name'=>'required|max:5|min:2',
                'age'=>'required|integer|max:100|min:1',
                'email'=>'required|email'
            ]);
            echo "验证通过，继续执行代码";

        }else{
              echo "当前请求方式为get不符合要求";

        }

    }
    public function huancun(){
        //使用缓存存储数据
        //设置存储一分钟
     /*   Cache::put('username','lilei',10);//有则覆盖，没有则创建
        Cache::add('adr','shenzhennanshan',10);//创建新的缓存，
        Cache::forever('age','100');*/
  echo'缓111存';


    }

    public function log()
    {
        Log::channel('single')->error('Something happened! 112');
    }
}
