@extends('layouts.master')
@section('content')
            <div class="container" style="padding: 30px;">
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
                            <label for="exampleInputPassword1">邮箱</label>
                            <input type="text" class="form-control" name="age">
                        </div>
                        <button type="submit" class="btn btn-default">添加</button>
                    </form>
                </div>
            </div>
@endsection