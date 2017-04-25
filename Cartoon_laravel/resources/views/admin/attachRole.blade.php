@extends('layouts.master')
@section('content')
    <div style="padding: 30px;">
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
                    <table class="add_tab">
                        <tbody>
                        <tr>
                            <th>分配权限：</th>
                            <td>
                                @foreach($roles as $role)
                                <label><input type="checkbox" name="role_id[]" value="{{$role->id}}">{{$role->display_name}}</label>
                                @endforeach
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
    </div>
@endsection