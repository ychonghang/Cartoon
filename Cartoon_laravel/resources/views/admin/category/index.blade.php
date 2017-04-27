@extends('layouts.master')

@section('title','分类管理')

@section('style')
    <link rel="stylesheet" href="{{url('/css/admin/css/common.css')}}">
@endsection

@section('content')
    <div class="row" style="text-align: center">
        <div class="col-md-10 col-md-offset-1 main">

            <h2 class="sub-header">分类管理</h2>
            <div class="row div-relative ">
                <a href="/admin/category/add" class="btn btn-default category-absolute">添加分类</a>
                <form class="navbar-form" role="search">
                    <select class="form-control" name="rank">
                        <option value="">请选择</option>
                        @forelse($category_rank as $k => $v)
                            @if($rank == $v->rank && $rank != "")
                                <option selected value="{{$v->rank}}">{{$v->rank}}</option>
                             @continue
                            @endif
                            <option value="{{$v->rank}}">{{$v->rank}}</option>
                        @empty
                            <option value="0">0</option>
                        @endforelse
                    </select>
                    <div class="form-group">
                        <input type="text" name="search" class="form-control" value="{{$search or ''}}" style="width: 300px;" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-default">搜索</button>
                </form>
            </div>

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr class="tr-th-text-center">
                        <th>分类Id</th>
                        <th>分类名</th>
                        <th>分类级别</th>
                        <th>创建时间</th>
                        <th>修改时间</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($category as $v)
                        <tr>
                            <td>{{$v->id}}</td>
                            <td>{{$v->name}}</td>
                            <td>{{$v->rank}}</td>
                            <td>{{$v->created_at}}</td>
                            <td>{{$v->updated_at}}</td>
                            <td class="td-a-margin-both">
                                <a href="{{url('/admin/category/update/'.$v->id)}}" class="btn btn btn-primary">修改</a>
                                <a href="{{url('/admin/category/delete/'.$v->id)}}" class="btn btn-danger">删除</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{$category->appends(['search' => $search])->links()}}
    </div>

@endsection