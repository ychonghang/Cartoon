@extends('layouts.master')
@section('content')
            <!--搜索结果页面 列表 开始-->
            <form action="#" method="post" style="padding: 30px;">

        <div class="col-md-12 graphs">
            <!--搜索结果页面 列表 开始-->
            <form action="#" method="post">

                <div class="result_wrap">
                    <!--快捷导航 开始-->
                    <div class="result_content">
                        <div class="short_wrap">
                            <a href="super-add" style="padding-right: 15px;"><i class="fa fa-plus"></i>新增管理员</a>
                            <a href="#" style="padding-right: 15px;"><i class="fa fa-recycle"></i>批量删除</a>
                            <a href="#"><i class="fa fa-refresh"></i>更新排序</a>
                        </div>
                    </div>
                    <!--快捷导航 结束-->
                </div>

                <div class="result_wrap">
                    <div class="result_content">
                        <table class="table table-hover">
                            <tr>
                                <th>ID</th>
                                <th>用户名</th>
                                <th>邮箱</th>
                                <th>角色名称</th>
                                <th>操作</th>
                            </tr>
                            @foreach($users as $user)

                            <tr>
                                <td class="tc">{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->roles}}</td>
                                <td>
                                    <a href="super-role/{{$user->id}}">分配角色</a>
                                    <a href="super-update/{{$user->id}}">修改</a>
                                    <a href="super-delete/{{$user->id}}">删除</a>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </form>
            <!--搜索结果页面 列表 结束-->

        </div>
    </div>
            </form>
@endsection