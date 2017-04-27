@extends('layouts.master')
@section('content')

            <div class="container" style="padding: 30px;">

        <div class="col-md-12 graphs">
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
                            <th>邮箱</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $ur)
                            <tr>
                                <th scope="row">{{$ur->id}}</th>
                                <td>{{$ur->name}}</td>
                                <td>{{$ur->email}}</td>
                                <td style="width: 230px">
                                    <a href="{{url('admin/user-details'.'/'.$ur->id)}}" class="btn btn-info">详情</a>
                                    &nbsp;
                                    <a href="{{url('admin/user-update'.'/'.$ur->id)}}" class="btn btn-warning">修改</a>
                                    &nbsp;
                                    <a href="{{url('admin/user-delete'.'/'.$ur->id)}}" class="btn btn-danger">删除</a>
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

        </div>
    </div>
@endsection