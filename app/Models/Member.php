<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Self_;

//一般的一个模型只操作一个表
class Member extends Model
{
    //指定当前模型所对应的表
    protected $table='member';
    //指定时间戳中是否操作created at 和updated at字段，因一般下，表中是没有这两个字段的，所以需要设置为false
    public $timestamps=false;
    //指定主键，当所定义的主键不是id时 需要指定即 需要用以下去指定
    protected $primaryKey='id';
    //定义fillable 表示使用模型插入数据时，需要插入到数据库的字段信息
    protected $fillable=['name','age','email'];

//对插入数据 创建一个业务方法 ，可以灵活的让控制器方法去调用，如果不写成方法而将操作数据库写在各个控制器方法中，就很麻烦与没有必要
    public static function add($name,$age,$email)
    {
        //插入数据 大致有两种方法
        //1.通过获取的值 save() 后return
        //将用户参数一个一个写出而避免写入到一个整类，而造成模糊感（即有些类不需要封装类的参数，而造成资源浪费）
//        $s = new self();// self()就是类本身 与Member()作用相同
//        $s->name = '1';
//        $s->age = '2';
//        $s->email = '3';
//        $s->save();
//        return $s->id;
        //2.通过调用方法create()以数组的形式，向create()中传入参数，来将新数据插入数据库  将获取到的值传入
       return self::create([
            'name' => $name,
            'age' => $age,
            'email' => $email,
        ]);
    }
    public static function sel($n)
    {

        //查询指定主键的数据
      $data=  self::find($n);
      //将对象转化为数组
       $arry= $data->toArray();

      return $arry;
    }
    public static function upd($name,$id){
  /*      //修改
     $p= self::find($id);
     //展示这个Id值的对象信息
        echo "所查询的数据id值为:{$p->id},名叫:{$p->name},今年:{$p->age}岁了,他/她的邮箱为:{$p->email}";
      $p->name=$name;
       $p->save();
      echo"修改后";
     return   "所修改的的数据id值为:{$p->id},名叫:{$p->name},今年:{$p->age}岁了,他/她的邮箱为:{$p->email}";*/
        //修改使用update

        Member::query()->where('id',$id)
        ->update([
            'name'=>$name
        ]);
    }

}
