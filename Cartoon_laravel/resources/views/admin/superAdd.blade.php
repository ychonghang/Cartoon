@extends('layouts.master')
@section('content')
<<<<<<< HEAD
    <div style="padding: 30px;">
=======
    <div id="page-wrapper">
        <div class="col-md-12 graphs">
>>>>>>> 2a495d62d85b26c7e884ed2b53912bb30be3cf57
            <!--结果集标题与导航组件 开始-->
            <div class="result_wrap">
                <div class="result_content">
                    <div class="short_wrap">
                        <a href="#" style="padding-right: 15px;"><i class="fa fa-plus"></i>新增文章</a>
                        <a href="#" style="padding-right: 15px;"><i class="fa fa-recycle"></i>批量删除</a>
                        <a href="#"><i class="fa fa-refresh"></i>更新排序</a>
                    </div>
                </div>
            </div>
            <!--结果集标题与导航组件 结束-->

            <div class="result_wrap">
                <form action="" method="post">
                    {{csrf_field()}}
                    <table class="table">
                        <tbody>
                        <tr>
                            <th><i class="require"></i>用户名：</th>
                            <td>
                                <input type="text" class="mg" name="name">{{ $errors ->first('name') }}
                            </td>
                        </tr>
                        <tr>
                            <th><i class="require"></i>邮箱：</th>
                            <td>
                                <input type="text" class="mg" name="email">{{ $errors ->first('email') }}
                            </td>
                        </tr>
                        <tr>
                            <th><i class="require"></i>密码：</th>
                            <td>
                                <input type="password" class="mg" name="password">{{ $errors ->first('password') }}
                            </td>
                        </tr>
                        <tr>
                            <th><i class="require"></i>确认密码：</th>
                            <td>
                                <input type="password" class="mg" name="password_confirmation">
                            </td>
                        </tr>
                        <tr>
                            <th></th>
                            <td>
                                <input type="submit" value="提交">
                                <input type="button" class="back" onclick="history.go(-1)" value="返回">
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </form>
            </div>
<<<<<<< HEAD
=======
        </div>
>>>>>>> 2a495d62d85b26c7e884ed2b53912bb30be3cf57
    </div>
@endsection