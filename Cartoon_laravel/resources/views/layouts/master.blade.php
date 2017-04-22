<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/admin/css/bootstrap.css')}}">
    <script src="{{asset('js/admin/jquery-2.1.4.min.js')}}"></script>
    <script src="{{asset('js/admin/bootstrap.min.js')}}"></script>
    <title>@yield('title')</title>
    <style>
        body {
            padding-top: 50px;
        }
        .starter-template {
            padding: 250px 15px;
            text-align: center;
        }
    </style>
    @yield('style')
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand " href="#">漫迹</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="{{url('admin/user-index')}}">首页</a></li>
                {{--<li><a href="#about">用户管理</a></li>--}}
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">用户管理 <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{url('admin/user-list')}}">用户信息</a></li>
                        <li><a href="{{url('admin/user-insert')}}">新增用户</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">管理员 <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">管理员信息</a></li>
                        <li><a href="#">新增管理员</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle " data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">书架管理 <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">.</a></li>
                        <li><a href="#">..</a></li>
                        <li><a href="#">...</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">空间管理 <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">.</a></li>
                        <li><a href="#">..</a></li>
                        <li><a href="#">...</a></li>
                    </ul>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="../navbar-static-top/">登录</a></li>
                <li><a href="../navbar-fixed-top/">注册</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>
@yield('content')
</body>
</html>