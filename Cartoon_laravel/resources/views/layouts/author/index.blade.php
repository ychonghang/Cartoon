<!doctype html>
<html lang="en">
<head><meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title','管理中心')</title>
    <link rel="stylesheet" href="{{url('/css/home/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{url('/css/home/author/author.css')}}">
    @yield('style')
</head>
<body>
{{--主--}}
<div id="author_reg">
    {{-- 顶部 --}}
    <div class="header">
        <div class="wrap">
            <div class="topbar">
                <div class="fl">
                    <a href="" target="_blank">首页</a>
                </div>
                <div class="fr">
                    欢迎您!
                    <a href="" class="fb">作家</a>|
                    <a href="/home/author/index">漫画管理</a>|
                    <a href="">个人中心</a>|
                    <a href="">退出</a>
                </div>
            </div>
        </div>
    </div> {{-- 顶部关 --}}

    @yield('content')


    {{-- 底部 --}}
    <div class="footer">
        <div class="wrap">
            <span class="fr">Copyright©2017-2017 漫迹 版权所有  浙ICP证：123456号</span>
            <a href="" target="_blank">首页</a>|
            <a href="" target="_blank">关于漫迹</a>|
            <a href="" target="_blank">意见反馈</a>
        </div>
    </div>  {{-- 底部关 --}}
</div>   {{-- 主关  --}}




</body>
</html>