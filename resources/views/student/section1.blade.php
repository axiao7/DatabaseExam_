@extends('layouts')

@section('header')
    @parent
    header
@stop

@section('sidebar')
    @parent
    sidebar
@stop

@section('content')
    content
    <!-- 1.模板中输出php变量 -->
{{--    <p>{{$name}}</p> --}}

    <!-- 2.模板中调用PhP代码 -->
{{--    <p>{{time()}}</p> --}}
{{--    <p>{{date('Y-m-d H:m:s', time())}}</p> --}}
{{--    <p>{{in_array($name, $arr) ? 'true' : 'false'}}</p> --}}
{{--    <p>{{var_dump($arr)}}</p> --}}
{{--    <p>{{isset($name) ? $name : 'default'}}</p> --}}
{{--    <p>{{$name1 or 'default'}}</p> --}}

    <!-- 3.原样输出 -->
{{--    <p>@{{$name}}</p> --}}

    {{-- 4.模板中的注释 --}}

    {{-- 5.引入子视图 include --}}
{{--    @include('student.common1', ['message' => '我是错误信息']) --}}

    <br>
    @if($name == 'lwx')
        I'm lwx
    @elseif($name == 'imooc')
        I'm imooc
    @else
        Who am I
    @endif

    <br>
    @if(in_array($name, $arr))
        true
    @else
        false
    @endif
    
    <br>
    @unless ($name != 'lwx')
        I'm lwx
    @endunless 
    
    <br>
    {{--@for($i=0; $i<10; $i++)--}}
        {{--<p>{{$i}}</p>--}}
    {{--@endfor--}}

    <br>
    {{--@foreach($students as $student)--}}
        {{--<p>{{$student->name}}</p>--}}
    {{--@endforeach--}}

    {{--@forelse($students as $student)--}}
        {{--<p>{{$student->name}}</p>--}}
    {{--@empty--}}
        {{--<p>null</p>--}}
    {{--@endforelse--}}

    <a href="{{ url('url') }}">url()</a>
    <br>
    <a href="{{ action('StudentController@urlTest') }}">action()</a>
    <br>
    <a href="{{route('url')}}">route()</a>















@stop