<?php


echo"你好test3.blade.php<br>";
?>
使用compact方式进行变量值传递<br/>

现在是：{{$date}},星期 {{$day}}<br/>

明年是：{{date('y-m-d h:i:s',$time)}}
