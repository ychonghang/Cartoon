@extends('layouts.master')
@section('content')
        <div class="col-md-12 graphs">
            <div class="container">
                <div class="page-header">
                    <h2>游戏列表</h2>
                </div>
                <div class="bs-example" data-example-id="hoverable-table">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>内容</th>
                            <th>路径</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($newp as $v)
                            <tr>
                                <th scope="row" style="vertical-align: middle;">{{$v->id}}</th>
                                <td style="vertical-align: middle;">{{$v->contents}}</td>
                                <td>{{url($v->path)}}"</td>
                                <td style="width: 230px;vertical-align: middle;">
                                    <a class="btn btn-danger" id="del">删除</a>
                                    <input type="hidden" value="{{$v->id}}" class="wdel">
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <a href="/admin/Newp" class="btn btn-info">添加</a>
                </div>
            </div>
        </div>

    <script>
        $(function(){
            $(this).on('click','#del',function(){
                $(this).parent().parent().empty()
                $id = $(this).siblings('.wdel').val();
                $.ajax({
                    type:'get',
                    url:"{{url('admin/Gamedel')}}",
                    data:'id='+$id,
                    success:function(data){
                        if (data==111){
                            alert('删除成功')
                        }else {
                            alert('删除失败')
                        }
                    },
                    error:function(){
                        alert('失败');
                    },
                    dataTpye:'json'
                })
            })
        })
    </script>
@endsection