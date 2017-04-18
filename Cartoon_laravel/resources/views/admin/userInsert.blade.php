@extends('layouts.master')
@section('content')
    <div id="page-wrapper">
        <div class="col-md-12 graphs">
            <div class="container">
                <div class="page-header">
                    <h2>新增用户</h2>
                </div>
                <div style="margin-left: 400px;">
                    <form action="" method="post" style="width: 300px;">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="exampleInputEmail1">名字</label>
                            <input type="text" class="form-control" name="name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">年龄</label>
                            <input type="text" class="form-control" name="age">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">班级</label>
                            <input type="text" class="form-control" name="class">
                        </div>
                        <button type="submit" class="btn btn-default">添加</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection