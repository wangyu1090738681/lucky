foreach循环<br/>
<hr/>
id &emsp; &emsp; &emsp; name &emsp; &emsp; &emsp; email &emsp; &emsp; &emsp;<br/>
@foreach($person as $value)
    {{$value->id}} &emsp; &emsp; &emsp;{{$value->name}} &emsp; &emsp; &emsp;
{{$value->email}} &emsp; &emsp; &emsp;<br/>
@endforeach

<hr/>

@if($weak=1)
    今天是星期一
@elseif($weak=2)
    今天是星期二
@elseif($weak=3)
    今天是星期三
@elseif($weak=4)
    今天是星期四
@elseif($weak=5)
    今天是星期五
@elseif($weak=6)
    今天是星期六
@else
    今天是星期天
@endif

<HR/>

