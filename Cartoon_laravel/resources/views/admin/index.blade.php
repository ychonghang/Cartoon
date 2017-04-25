@extends('layouts.master')
@section('title','后台首页')
@section('style')
    <link rel="stylesheet" href="{{asset('css/popup.css')}}">
    @endsection
@section('content')
        <div class="popup-container">
            <div class="img-flex"></div>
        </div>
        {{--<script src="http://www.jq22.com/jquery/jquery-1.10.2.js"></script>--}}
        <script type="text/javascript" src="{{url('js/fragment.js')}}"></script>
        <script type="text/javascript">
            $(function() {
                var fragmentConfig = {
                    container : '.img-flex',//显示容器
                    line : 10,//多少行
                    column : 24,//多少列
                    width : 1550,//显示容器的宽度
                    animeTime : 10000,//最长动画时间,图片的取值将在 animeTime*0.33 + animeTime*0.66之前取值
                    img : '{{url('image/details/zhenhunjie.jpg')}}'//图片路径
                };
                fragmentImg(fragmentConfig);
            });
        </script>
@endsection