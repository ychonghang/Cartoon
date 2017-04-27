@extends('layouts.master')
@section('content')

            <div class="container" style="padding: 30px;">
        <div class="col-md-12 graphs">
            <div class="container">

                <div class="page-header">
                    <h2>用户详情</h2>
                </div>
                <div style="margin-left: 400px;">
                    <label for="exampleInputEmail1">名字</label>
                    <input class="form-control" type="text" placeholder="{{$user->name}}" readonly style="width: 300px;">

                    <label for="exampleInputEmail1">邮箱</label>
                    <input class="form-control" type="text" placeholder="{{$user->email}}" readonly style="width: 300px;">
                    <label for="exampleInputEmail1">头像</label>
                    <input class="form-control" type="text" placeholder="{{$user->avatar}}" readonly style="width: 300px;">
                    <a href="{{url('admin/user-list')}}" class="btn btn-danger" style="margin-top: 10px;">返回</a>
                </div>
            </div>
                </div>
            </div>

@endsection()