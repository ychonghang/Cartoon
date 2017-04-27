@extends('layouts.master')
@section('title','后台首页')
<<<<<<< HEAD
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
=======
@section('content')
    <div id="page-wrapper">
        <div class="col-md-12 graphs"  style="background-color:black;">
            <div class="xs" >
                <div class="well1 white" style="background-color:black;">
                    <div id="trans3DDemo1">
                        <div id="trans3DBoxes1">
                            <div>Front</div>
                            <div>Left</div>
                            <div>Right</div>
                            <div>Top</div>
                            <div>Bottom</div>
                            <div>Back</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 @endsection
>>>>>>> 2a495d62d85b26c7e884ed2b53912bb30be3cf57
