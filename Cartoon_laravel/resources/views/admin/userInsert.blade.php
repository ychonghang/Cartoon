@extends('layouts.master')
@section('content')
<<<<<<< HEAD
            <div class="container" style="padding: 30px;">
=======
    <div id="page-wrapper">
        <div class="col-md-12 graphs">
            <div class="container">
>>>>>>> 2a495d62d85b26c7e884ed2b53912bb30be3cf57
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
<<<<<<< HEAD
                            <label for="exampleInputPassword1">邮箱</label>
                            <input type="text" class="form-control" name="age">
                        </div>
=======
                            <label for="exampleInputPassword1">年龄</label>
                            <input type="text" class="form-control" name="age">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">班级</label>
                            <input type="text" class="form-control" name="class">
                        </div>
>>>>>>> 2a495d62d85b26c7e884ed2b53912bb30be3cf57
                        <button type="submit" class="btn btn-default">添加</button>
                    </form>
                </div>
            </div>
<<<<<<< HEAD
=======
        </div>
    </div>
>>>>>>> 2a495d62d85b26c7e884ed2b53912bb30be3cf57
@endsection