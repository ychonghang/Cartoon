@extends('layouts.master')

@section('title','作者管理')

@section('style')
    <link rel="stylesheet" href="{{url('/css/admin/css/common.css')}}">
    <script src="{{url('/js/common/jquery-1.8.3.min.js')}}"></script>
@endsection

@section('content')
    <div class="row min-height padding-top" style="text-align: center">
        <div class="col-md-10 col-md-offset-1 main">

            <h2 class="sub-header">作者管理</h2>
            <form class="navbar-form" role="search">
                <div class="form-group">
                    <input type="text" name="search" class="form-control" value="{{$search}}" style="width: 300px;" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">搜索</button>
            </form>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr class="tr-th-text-center">
                        <th>作者Id</th>
                        <th>姓名</th>
                        <th>是否通过</th>
                        <th>申请时间</th>
                        <th>修改时间</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($author as $v)
                    <tr>
                        <td>{{$v->user_id}}</td>
                        <td>{{$v->name}}</td>
                        <td>
                            @if($v->is_author)
                                已通过
                                @else
                                未通过
                            @endif
                        </td>
                        <td>{{$v->created_at}}</td>
                        <td>{{$v->updated_at}}</td>
                        <td class="td-a-margin-both">
                            <a href="" class="btn btn btn-primary">作者详情</a>
                            <a href="" class="btn btn-info">作品详情</a>
                            @if($v->is_author)
                            <a href="" class="btn btn-warning">修改</a>
                                @else
                            <a href="/admin/author/via/{{$v->id.'?search='.$search.'&page='.$author->currentPage()}}" class="btn btn-warning">确认通过</a>
                            @endif
                            <a href="{{url('/admin/author/del/'.$v->id)}}" class="btn btn-danger">删除</a>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{$author->appends(['search' => $search])->links()}}
    </div>


    <script src="{{url('/js/admin/author/index.js')}}"></script>
@endsection