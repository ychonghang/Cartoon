@extends('layouts.author.index')

@section('title','漫画管理中心')

@section('style')
    <script src="{{url('js/home/jquery-1.8.3.min.js')}}"></script>
@endsection

@section('content')
    <div class="all">
        <h3 class="h3_center h3_top">漫画管理</h3>

        {{-- 漫画内容 --}}
        <div class="all_main min_height">
            <div style="text-align: center" class="clear">
                <div class="col-md-10 col-md-offset-1 main clear_both_padding rewritetb">
                    @if($errors->first('error'))
                        <div class="alert alert-danger clear-margin-bottom" role="alert">{{$errors->first('error')}}</div>
                    @endif
                    <div class="row div-relative line-height-mh">
                        <a href="/home/author/add" class="btn btn-default add-cartoon-left">添加漫画</a>
                        <span class="update">

                            <a href="/home/author/index/publish" class="{{$type=='updated_at'?'':'a-color'}}">按创建时间排序</a>
                            |
                            <a href="/home/author/index/upd" class="{{$type=='created_at'?'':'a-color'}}">按更新时间排序</a>
                        </span>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr class="tr-th-text-center">
                                <th>图片封面</th>
                                <th>漫画名</th>
                                <th>创作进度</th>
                                <th>作品状态</th>
                                <th>审核</th>
                                <th>更新时间</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            {{csrf_field()}}
                            @forelse($opus as $v)
                                <tr class="tr-td-vertical-align tr-td-size">
                                    <td>
                                        <img class="img-max-width" src="{{url($info->getCoverImg($user,$v->id,$v->imagepath))}}" alt="">
                                    </td>
                                    <td class="td-max-width ellipsis">{{$v->name}}</td>
                                    <td>{{$v->create_schedule?'已完结':'连载中'}}</td>
                                    <td>{{$v->display?'已被下架':'正常'}}</td>
                                    <td>{{$v->adopt?'已通过':'未通过'}}</td>
                                    <td>{{$v->updated_at}}</td>
                                    <td class="td-a-margin-both">
                                        <a href="/home/author/upd/{{$v->id}}" class="btn btn btn-primary">修改</a>
                                        <button name="publish" class="btn btn-warning" publish="{{$v->id}}">{{$v->publish?"取消发表":"发表"}}</button>
                                        <a href="/home/cartoon/index/{{$v->id}}" class="btn btn-info">详情</a>
                                        <a href="{{url('/home/author/del/'.$v->id)}}" class="btn btn-danger">删除</a>
                                    </td>
                                </tr>

                                @empty
                                <tr>
                                    <td colspan="6">无漫画信息</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>  {{-- 漫画内容 --}}
    </div>

    <script src="{{url('js/home/author/index.js')}}"></script>
@endsection