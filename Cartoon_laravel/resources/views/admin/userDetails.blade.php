@extends('layouts.master')
@section('content')
    <div id="page-wrapper">
        <div class="col-md-12 graphs">
            <div class="container">
                <div class="page-header">
                    <h2>用户详情</h2>
                </div>
                <div style="margin-left: 400px;">
                    <label for="exampleInputEmail1">名字</label>
                    <input class="form-control" type="text" placeholder="{{$user->name}}" readonly style="width: 300px;">
                    <label for="exampleInputEmail1">年龄</label>
                    <input class="form-control" type="text" placeholder="{{$user->age}}" readonly style="width: 300px;">
                    <label for="exampleInputEmail1">班级</label>
                    <input class="form-control" type="text" placeholder="{{$user->class}}" readonly style="width: 300px;">
                    <a href="{{url('admin/user-list')}}" class="btn btn-danger" style="margin-top: 10px;">返回</a>
                </div>
            </div>
        </div>
    </div>
@endsection()