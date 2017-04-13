@extends('layouts.index')
@section('title','个人中心')
@section('style')
    <link rel="stylesheet" href="{{asset('css/home/personal.css')}}">
    @endsection
@section('script')
    <script>
        $(function(){
            $('#menu').click(function(){
                $(this).next('.box_ul').slideToggle('slow');
            })
        })
    </script>
    @endsection
@section('content')
    {{--个人的中心内容--}}
    <div class="col-md-6 col-md-offset-2 box_yon">
        <div class="we">
        <div class="col-md-9 col-md-push-3 box_gl"><a href="">前往漫画管理中心>></a></div>
        <div class="col-md-3 col-md-pull-9 box_yy" id="menu" title="点我设置信息">我的应用和设置  </div></div>
        {{--设置的ul列表--}}
            <ul class="box_ul col-md-4">
            <li>
                <a href=""><i class="left-arrow"></i>书架<i class="right-arrow"></i></a>
            </li>
            <li>
                <a href=""><i class="left-arrow"></i>吐槽<i class="right-arrow"></i></a>
            </li>
            <li>
                <a href=""><i class="left-arrow"></i>封印图<i class="right-arrow"></i></a>
            </li>
            <li>
                <a href="" target="_blank"><i class="left-arrow"></i>游戏中心<i class="right-arrow"></i></a>
            </li>
            <li>
                <a href="" target="_blank"><i class="left-arrow"></i>VIP服务<i class="right-arrow"></i></a>
            </li>
            <li>
                <a href=""><i class="left-arrow"></i>评论管理<i class="right-arrow"></i></a>
            </li>
            <li>
                <a href=""><i class="left-arrow"></i>月票<i class="right-arrow"></i></a>
            </li>
            <li>
                <a href=""><i class="left-arrow"></i>我的订阅<i class="right-arrow"></i></a>
            </li>
            <li>
                <a href=""><i class="left-arrow"></i>阅读券<i class="right-arrow"></i></a>
            </li>
            <li>
                <a href=""><i class="left-arrow"></i>短信<i class="right-arrow"></i></a>
            </li>
            <li>
                <a href=""><i class="left-arrow"></i>声优管理<i class="right-arrow"></i></a>
            </li>
            <li>
                <a href=""><i class="left-arrow"></i>礼物道具<i class="right-arrow"></i></a>
            </li>
            <li>
                <a href=""><i class="left-arrow"></i>称号<i class="right-arrow"></i></a>
            </li>
            <li>
                <a style="width:144px;" href=""><i class="left-arrow"></i>日志&amp;相册下载<i class="right-arrow"></i></a>
            </li>
            </ul>
        {{--内容--}}
         <div class="col-md-6 col-md-offset-3 box_sub">
          <div class="col-md-6 box_sub_one">
              <span><a href="">我的书架</a></span>
              <span><a href="">最近订阅</a></span>
              <span class="box_span"><a href="">不知道还有哪些好作品？去看看排行榜吧</a></span>
          </div>
         </div>
    </div>
    @endsection