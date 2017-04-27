@extends('layouts.master')
@section('content')
    <div id="page-wrapper">
        <div class="col-md-12 graphs">
            <div class="container">
                <div class="page-header">
                    <h2>通告的添加</h2>
                </div>
                <div style="margin-left: 400px;">
                    <form action="/admin/Newpadd" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">内容:</label>
                            <textarea name="contents" cols="50" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">存储路径:</label>
                            <input type="text" class="form-control" name="path">
                        </div>
                        <button type="submit" class="btn btn-default">添加</button>
                        <a href="{{url('admin/Newpps')}}" class="btn btn-danger">返回</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection