@extends('layouts.master')
@section('content')
    <div style="padding: 30px;">



        <div class="col-md-12 graphs">

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
        <form action='' method="post">
            {{csrf_field()}}
            <table class="table table-bordered">
                <tbody>
                <tr>
                    <th width="120"><i class="require"></i>分类：</th>
                    <td>
                        <select name="">
                            <option value="">==请选择==</option>
                            <option value="19">精品界面</option>
                            <option value="20">推荐界面</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <th><i class="require"></i>权限路由：</th>
                    <td>
                        <input type="text" class="mg" name="name">{{ $errors ->first('name') }}
                    </td>
                </tr>
                <tr>
                    <th><i class="require"></i>权限描述：</th>
                    <td>
                        <input type="text" class="mg" name="display_name">{{ $errors ->first('display_name') }}
                    </td>
                </tr>
                <tr>
                    <th>描述：</th>
                    <td>
                        <textarea name="description"></textarea>{{ $errors ->first('description') }}
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

</div>


@endsection