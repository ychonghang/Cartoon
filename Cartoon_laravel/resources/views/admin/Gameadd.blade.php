@extends('layouts.master')
@section('content')
        <div class="col-md-12 graphs">
            <div class="container">
                <div class="page-header">
                    <h2>游戏的添加</h2>
                </div>
                <div style="margin-left: 400px;">
                    <form action="/admin/Gameadd" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">游戏名:</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">存储路径:</label>
                            <input type="text" class="form-control" name="path">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">封面图:</label>
                            <input type="file" class="form-control" name="img" >
                        </div>
                        <button type="submit" class="btn btn-default">添加</button>
                        <a href="{{url('admin/Game')}}" class="btn btn-danger">返回</a>
                    </form>
                </div>
            </div>
        </div>

    @endsection