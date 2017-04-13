@extends('layouts.master')
@section('title','后台首页')
@section('content')
    <div class="container">
        <div class="page-header">
            <h2>用户列表</h2>
        </div>
        <div class="bs-example" data-example-id="hoverable-table">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>姓名</th>
                    <th>年龄</th>
                    <th>班级</th>
                    <th>操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->age}}</td>
                    <td>{{$user->class}}</td>
                    <td style="width: 230px">
                        <a href="{{url('admin/user-details'.'/'.$user->id)}}" class="btn btn-info">详情</a>
                        &nbsp;
                        <a href="{{url('admin/user-update'.'/'.$user->id)}}" class="btn btn-warning">修改</a>
                        &nbsp;
                        <a href="{{url('admin/user-delete'.'/'.$user->id)}}" class="btn btn-danger">删除</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            <div style="text-align: center">
                {{$users->links('admin.page')}}
            </div>
        </div>
    </div>
@endsection