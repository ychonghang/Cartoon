@extends('layouts.master')
@section('content')
            <!--搜索结果页面 列表 开始-->
            <form action="#" method="post" style="padding: 30px;">
                <div class="result_wrap">
                    <!--快捷导航 开始-->
                    <div class="result_content">
                        <div class="short_wrap">
                            <a href="picture-add" style="padding-right: 15px;"><i class="fa fa-plus"></i>添加图片</a>
                            <a href="#" style="padding-right: 15px;"><i class="fa fa-recycle"></i>批量删除</a>
                            <a href="#"><i class="fa fa-refresh"></i>更新排序</a>
                        </div>
                    </div>
                    <!--快捷导航 结束-->
                </div>

                <div class="result_wrap">
                    <div class="result_content">
                        <table class="table table-hover">
                            <tr>
                                <th>ID</th>
                                <th>图片名</th>
                                <th>图片</th>
                                <th>状态</th>
                                <th>操作</th>
                            </tr>
                            @foreach($pic as $pi)
                                <tr>
                                    <td class="tc">{{$pi->id}}</td>
                                    <td>{{$pi->name}}</td>
                                    <td>
                                        <a href="{{url('/admin/uploads/'.$pi->pic)}}">
                                            <img src={{url('/admin/uploads/'.$pi->pic)}} alt="" width=80px height=50px>
                                        </a>
                                    </td>

                                   <td class="onin">
                                        <label id="label_one"><input type="checkbox" id="che" name="che" {!! $pi->status==1? 'checked':'' !!} >显示</label>
                                        <input type="hidden" id="va" value="{{$pi->id}}">
                                    </td>

                                    <td>
                                        <a href="picture-delete/{{$pi->id}}">删除</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </form>
            <!--搜索结果页面 列表 结束-->
        <script>
            $(function(){
                $(this).on('click','#label_one',function () {
                    $id=$(this).siblings('#va').val();
                    $_this = $(this);
                   $.ajax({
                       url:"{{url('admin/picture-box')}}",
                       data:'id='+$id,
                       type:'get',
                       success:function(data){
                            //alert(data);
                       },
                       error:function () {
                           alert('错误')
                       },
                       datatype:'text'
                   })
                })
            })
        </script>
@endsection