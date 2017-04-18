@extends('layouts.master')
@section('content')
    <div id="page-wrapper">
        <div class="col-md-12 graphs">
            <!--搜索结果页面 列表 开始-->
            <form action="#" method="post">
                <div class="result_wrap">
                    <!--快捷导航 开始-->
                    <div class="result_content">
                        <div class="short_wrap">
                            <a href="role-add" style="padding-right: 15px;"><i class="fa fa-plus"></i>新增角色</a>
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
                                <th>权限路由</th>
                                <th>权限名称</th>
                                <th>权限描述</th>
                                <th>角色权限</th>
                                <th>操作</th>
                            </tr>
                            @foreach($roles as $role)
                            <tr>
                                <td class="tc">{{$role->id}}</td>
                                <td>{{$role->name}}</td>
                                <td>{{$role->display_name}}</td>
                                <td>{{$role->description}}</td>
                                <td>{{$role->perms}}</td>
                                <td>
                                    <a href="attach-permission/{{$role->id}}">分配权限</a>
                                    <a href="role-update/{{$role->id}}">修改</a>
                                    <a href="role-delete/{{$role->id}}">删除</a>
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
@endsection