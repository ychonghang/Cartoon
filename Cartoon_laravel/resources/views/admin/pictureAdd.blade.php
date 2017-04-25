@extends('layouts.master')
@section('content')
            <div class="result_wrap" style="padding: 30px;">
                <form action='' method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <table class="table table-bordered">
                        <tbody>
                        <tr>
                            <th><i class="require"></i>图片名称：</th>
                            <td>
                                <input type="text" class="mg" name="name">{{ $errors ->first('name') }}
                            </td>
                        </tr>
                        <tr>
                            <th><i class="require"></i>上传图片：</th>
                            <td>
                                <input type="file" class="mg" name="pic">{{ $errors ->first('pic') }}
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
@endsection