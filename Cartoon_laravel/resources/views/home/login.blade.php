{{--继承 master--}}
@extends('layouts.UserH')
@section('title','登录')
{{--继承 自定义的css--}}
@section('my_style')
    <link rel="stylesheet" href="{{asset('css/home/css/logins.css')}}">
@endsection
@section('content')
    <div id="conter" style="background-image:url('{{asset('css/home/img/login_bg.jpg')}}'); margin-top:-280px;background-repeat:no-repeat;" >
        <div class="container box_content"  >
            <div class="box_login">
                <form class="form-signin" method="post" action="/home/setLogin">
                    <div class="box_mian">
                        {{csrf_field()}}
                        <label for="inputEmail" class="sr-only">用户名/</label>
                        <input type="email"  class="form-control" placeholder="邮箱" name="email">
                        <span class="cuo_wu">@if(count($errors))
                            {{$errors->first('email')}}
                        @endif
                        </span>
                        <br>
                        <label for="inputPassword" class="sr-only">密码</label>
                        <input type="password" class="form-control" placeholder="请输入密码" name="password">
                        <span class="cuo_wu">@if(count($errors))
                            {{$errors->first('password')}}
                        @endif
                        </span>
                        <br/>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value="remember-me"> 记住我
                            </label>
                        </div>
                        <button class="btn btn-lg btn-warning btn-block " type="submit">登录</button>
                        <div class="span_shan">
                            <a href="" title="忘记了吗？">忘记密码?</a>
                            <span>|</span>
                            <a href="" title="欢迎加入哟！">新用户注册</a>
                        </div>
                        <div class="span_shan">
                            <a href=""><p class="glyphicon glyphicon-tree-deciduous"></p>qq登录</a>
                            <span>|</span>
                            <a href=""><p class="glyphicon glyphicon-cd">微博登录</a>
                        </div>
                    </div>
                </form>
            </div>
            <div class="box_btn">
                <span></span>
            </div>
        </div> <!-- /container -->
    </div>
@endsection