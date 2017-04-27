<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>后台登陆</title>
    <meta name="author" content="DeathGhost" />
    <link rel="stylesheet" type="text/css" href="{{asset('css/admin/css/login.css')}}" tppabs="" />
    <style>
        body{height:100%;background:#42BAEF;overflow:hidden;}
        canvas{z-index:-1;position:absolute;}
    </style>
    <script src="{{asset('js/admin/jquery.js')}}"></script>
    <script src="{{asset('js/admin/verificationNumbers.js')}}" tppabs="js/verificationNumbers.js"></script>
    <script src="{{asset('js/admin/Particleground.js')}}" tppabs="js/Particleground.js"></script>
    <script>
        $(document).ready(function() {
            //粒子背景特效
            $('body').particleground({
                dotColor: '#8AD7F8',
                lineColor: '#8AD7F8'
            });
            //验证码
            createCode();
            //测试提交，对接程序删除即可
            $(".submit_btn").click(function(){
                location.href="javascrpt:;"/*tpa=http://***index.html*/;
            });
        });
    </script>
</head>
<body>
<form action="/admin/Setlogin" method="post">
    {{csrf_field()}}
<dl class="admin_login">
    <dt>
        <strong>漫迹后台管理系统</strong>
        <em>MJ System</em>
    </dt>
    <dd class="user_icon">
        <input type="text" placeholder="账号" class="login_txtbx" name="name"/>
        @if(count($errors))
            {{$errors->first('name')}}
        @endif
    </dd>
    <dd class="pwd_icon">
        <input type="password" placeholder="密码" class="login_txtbx" name="password"/>
        @if(count($errors))
            {{$errors->first('password')}}
        @endif
    </dd>
    <dd>
        <input type="submit" value="立即登陆" class="submit_btn"/>
    </dd>
</dl>
</form>
</body>
</html>
