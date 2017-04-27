<!DOCTYPE HTML>
<html>
<head>
    <title>@yield('title')</title>
<<<<<<< HEAD
=======
    @yield('style')

>>>>>>> 2a495d62d85b26c7e884ed2b53912bb30be3cf57
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="Modern Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- Bootstrap Core CSS -->
    <link href="{{asset('css/admin/css/bootstrap.min.css')}}" rel='stylesheet' type='text/css' />
    <!-- Custom CSS -->
    <link href="{{asset('css/admin/css/style.css')}}" rel='stylesheet' type='text/css' />
    <link href="{{asset('css/admin/css/font-awesome.css')}}" rel="stylesheet">
<<<<<<< HEAD
=======
    <link rel="stylesheet" href="{{asset('css/admin/css/3D.css')}}" type="text/css">
>>>>>>> 2a495d62d85b26c7e884ed2b53912bb30be3cf57
    @yield('style')
    <!-- jQuery -->
    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('js/admin/jquery.min.js')}}"></script>
<<<<<<< HEAD
    <script src="{{asset('js/admin/bootstrap.min.js')}}"></script>


=======
    <script src="{{url('js/admin/metisMenu.min.js')}}"></script>
    <script src="{{asset('js/admin/bootstrap.min.js')}}"></script>



>>>>>>> 2a495d62d85b26c7e884ed2b53912bb30be3cf57
</head>
<body>
<div id="wrapper">
    <!-- Navigation -->
    <nav class="top1 navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0px;background-color: #30353B;">
        <div class="navbar-header">
<<<<<<< HEAD
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
=======
>>>>>>> 2a495d62d85b26c7e884ed2b53912bb30be3cf57
            <a class="navbar-brand" href="#" style="font-family:楷体;">&nbsp;&nbsp;&nbsp;漫迹</a>
        </div>
        <!-- /.navbar-header -->
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-comments-o"></i><span class="badge">4</span></a>
                <ul class="dropdown-menu">
                    <li class="dropdown-menu-header">
                        <strong>信息</strong>
                        <div class="progress thin">
                            <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%">
                                <span class="sr-only">40% Complete (success)</span>
                            </div>
                        </div>
                    </li>
                    <li class="avatar">
                        <a href="#">
<<<<<<< HEAD
                            <img src="" alt=""/>
=======
                            <img src="{{asset('image/121.jpg')}}">
>>>>>>> 2a495d62d85b26c7e884ed2b53912bb30be3cf57
                            <div>谁谁谁</div>
                            <small>一分钟前</small>
                            <span class="label label-info">NEW</span>
                        </a>
                    </li>
                    <li class="dropdown-menu-footer text-center">
                        <a href="#">查看所有的信息</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
<<<<<<< HEAD
                <a href="#" class="dropdown-toggle avatar" data-toggle="dropdown"><img src="" alt=""/><span class="badge">9</span></a>
=======
                <a href="#" class="dropdown-toggle avatar" data-toggle="dropdown">
                    @foreach($a as $v)
                    <img src="{{url($v->icon)}}">
                    @endforeach
                    <span class="badge">9</span>
                </a>
>>>>>>> 2a495d62d85b26c7e884ed2b53912bb30be3cf57
                <ul class="dropdown-menu">
                    <li class="dropdown-menu-header text-center">
                        <strong>Account</strong>
                    </li>
                    <li class="m_2"><a href="#"><i class="fa fa-bell-o"></i>更新材料
                            <span class="label label-info">42</span></a></li>
                    <li class="m_2"><a href="#"><i class="fa fa-envelope-o"></i>信息<span class="label label-success">42</span></a></li>
                    <li class="m_2"><a href="#"><i class="fa fa-tasks"></i>任务<span class="label label-danger">42</span></a></li>
                    <li><a href="#"><i class="fa fa-comments"></i>评论<span class="label label-warning">42</span></a></li>
                    <li class="dropdown-menu-header text-center">
                        <strong>环境</strong>
                    </li>
                    <li class="m_2"><a href="#"><i class="fa fa-user"></i>人物简介</a></li>
                    <li class="m_2"><a href="#"><i class="fa fa-wrench"></i>装置背景</a></li>
                    <li class="m_2"><a href="#"><i class="fa fa-usd"></i>付款<span class="label label-default">42</span></a></li>
                    <li class="m_2"><a href="#"><i class="fa fa-file"></i>计划<span class="label label-primary">42</span></a></li>
                    <li class="divider"></li>
                    <li class="m_2"><a href="#"><i class="fa fa-shield"></i> Lock Profile</a></li>
<<<<<<< HEAD
                    <li class="m_2"><a href="#"><i class="fa fa-lock"></i>退出</a></li>
=======
                    <li class="m_2"><a  href="/admin/login" id="out"><i class="fa fa-lock"></i>退出</a></li>
>>>>>>> 2a495d62d85b26c7e884ed2b53912bb30be3cf57
                </ul>
            </li>
        </ul>
        <form class="navbar-form navbar-right">
            <input type="text" class="form-control" value="搜索" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '搜索';}">
        </form>
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="user-index"><i class="fa fa-dashboard fa-fw nav_icon"></i>首页</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-laptop nav_icon"></i>权限管理<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="permission-list">权限管理</a>
                                <a href="role-list">角色管理</a>
                                <a href="super-list">管理员管理</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
<<<<<<< HEAD
                        <a href="#"><i class="fa fa-indent nav_icon"></i>图片管理<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="picture-list">轮播图</a>
                            </li>
                            <li>
                                <a href="advertisement-list">广告</a>
                            </li>
                            <li>
                                <a href="link-list">友情链接</a>
=======
                        <a href="#"><i class="fa fa-indent nav_icon"></i>轮播图管理<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#">轮播图</a>
                            </li>
                            <li>
                                <a href="#">广告</a>
>>>>>>> 2a495d62d85b26c7e884ed2b53912bb30be3cf57
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
<<<<<<< HEAD
                        <a href="#"><i class="fa fa-envelope nav_icon"></i>问题反馈<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="feedback">反馈回复</a>
                            </li>
                            <li>
                                <a href="#">...</a>
=======
                        <a href="#"><i class="fa fa-envelope nav_icon"></i>邮件<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#">收信信箱</a>
                            </li>
                            <li>
                                <a href="#">编写电子邮件</a>
>>>>>>> 2a495d62d85b26c7e884ed2b53912bb30be3cf57
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
<<<<<<< HEAD
                        <a href="#"><i class="fa fa-flask nav_icon"></i>收藏管理<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="">收藏信息</a>
                            </li>
                            <li>
                                <a href="">...</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="glyphicon glyphicon-star nav_icon"></i>积分管理<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="integral">用户积分</a>
                            </li>
                            <li>
                                <a href="">...</a>
                            </li>
                        </ul>
=======
                        <a href="#"><i class="fa fa-flask nav_icon"></i>窗口小部件</a>
>>>>>>> 2a495d62d85b26c7e884ed2b53912bb30be3cf57
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-check-square-o nav_icon"></i>用户管理<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="user-list">用户信息</a>
                            </li>
                            <li>
                                <a href="user-insert">新增用户</a>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
<<<<<<< HEAD
                        <a href="#"><i class="fa fa-table nav_icon"></i>表格<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="#">基本表格样式</a>
=======
                        <a href="#"><i class="fa fa-table nav_icon"></i>娱乐<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="Game">游戏添加</a>
                                <a href="Newpps">通告栏</a>
>>>>>>> 2a495d62d85b26c7e884ed2b53912bb30be3cf57
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                </ul>
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>
<<<<<<< HEAD
    <div id="page-wrapper" style="padding: 0px;">
        <div class="col-md-12 graphs" style="padding: 0px;">
            @yield('content')
        </div>
    </div>

</div>
=======
     @yield('content')
</div>
<script>
    $(function(){
        $('#out').click(function(){
            $.ajax({
                type:'get',
                url:"{{url('admin/OutLogin')}}",
                success:function(data){
                    alert("成功")
                },
                errorr:function(){
                    alert("失败")
                }
            })
        })
    })
</script>
>>>>>>> 2a495d62d85b26c7e884ed2b53912bb30be3cf57
<!-- /#wrapper -->
<!-- Nav CSS -->
<link href="{{asset('css/admin/css/custom.css')}}" rel="stylesheet">
{{--<!-- Metis Menu Plugin JavaScript -->--}}
<<<<<<< HEAD
<script src="{{asset('js/admin/metisMenu.min.js')}}"></script>
<script src="{{asset('js/admin/custom.js')}}"></script>
=======
<script src="{{asset('js/admin/custom.js')}}"></script>

{{--3djs--}}
<script src='http://cdnjs.cloudflare.com/ajax/libs/gsap/1.19.0/TweenMax.min.js'></script>
<script type="text/javascript" src="{{asset('js/admin/index.js')}}"></script>
>>>>>>> 2a495d62d85b26c7e884ed2b53912bb30be3cf57
</body>
</html>
