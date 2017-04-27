{{--继承 master--}}
@extends('layouts.UserH')

@section('title','注册')

{{--继承 自定义的css--}}
@section('my_style')
    <link rel="stylesheet" href="{{asset('css/home/css/style.css')}}">
@endsection
@section('content')
    <div id="conter" style="background-image:url('{{asset('css/home/img/boy_bg_summer.jpg')}}'); margin-top:-280px;background-repeat:no-repeat;" >
        <div class="container box_content">
            <div class="box_login">
                <form class="form-signin" method="post" action="/home/stoer">
                    <a class="btn btn-default" href="">手机注册</a><a class="btn btn-default" href="">邮箱注册</a>
                    <div class="box_mian">
                        {{csrf_field()}}
                        <label for="inputEmail" class="sr-only">用户名</label>
                        <input type="text" id="inputEmail" class="form-control" placeholder="用户名" name="name">
                        @if(count($errors))
                            {{$errors->first('name')}}
                        @endif
                        <label for="inputEmail" class="sr-only">邮箱</label>
                        <input type="email" id="inputEmail" class="form-control" placeholder="邮箱" name="email">
                        @if(count($errors))
                            {{$errors->first('email')}}
                        @endif
                        <br/>
                        <label for="inputPassword" class="sr-only">密码</label>
                        <input type="password" class="form-control" placeholder="请输入密码" name="password">
                        @if(count($errors))
                            {{$errors->first('password')}}
                        @endif
                        <br/>
                        <label for="inputPasswords" class="sr-only">确认密码</label>
                        <input type="password" class="form-control" placeholder="再次输入密码" name="password_confirmation">
                        @if(count($errors))
                            {{$errors->first('password_confirmation')}}
                        @endif
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value="remember-me"> 记住我
                            </label>
                        </div>
                        <button class="btn btn-lg btn-primary btn-block" type="submit">注册</button>
                    </div>
                </form>
            </div>
        </div> <!-- /container -->
    </div>
    @endsection