@extends('layouts.master')

@section('title','漫画管理中心')

@section('style')
    <link rel="stylesheet" href="{{url('/css/admin/css/common.css')}}">
    <script src="{{url('/js/common/jquery-1.8.3.min.js')}}" ></script>
@endsection

@section('content')
    <div class="row min-height padding-top" style="text-align: center">
        @if($errors->first('uperror'))
            <div class="alert alert-danger" role="alert">{{$errors->first('uperror')}}</div>
        @endif
        <div class="col-md-10 col-md-offset-1 main">
            {{csrf_field()}}
            <h2 class="sub-header">漫画管理</h2>
            <form class="navbar-form" role="search">
                <select class="form-control" name="rank">
                    <option value="">请选择</option>
                    <option {{$rank==1?"selected":''}} value="1">上架</option>
                    <option {{$rank==2?"selected":''}} value="2">下架</option>
                    <option {{$rank==3?"selected":''}} value="3">通过</option>
                    <option {{$rank==4?"selected":''}} value="4">未通过</option>
                    <option {{$rank==5?"selected":''}} value="5">待审核</option>
                </select>

                <div class="form-group">
                    <input type="text" name="search" class="form-control" value="{{$search or ''}}" style="width: 300px;" placeholder="Search">
                </div>
                <button type="submit" class="btn btn-default">搜索</button>
            </form>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr class="tr-th-text-center">
                        <th>作品封面</th>
                        <th>漫画名</th>
                        <th>作者名称</th>
                        <th>审核</th>
                        <th>创作进度</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($opus as $v)
                        <tr class="tr-text-middle">
                            <td>
                                <input type="hidden" value="{{$v->opus_id}}">
                                <a href="/home/cartoon/index/{{$v->opus_id}}" target="_blank">
                                    <img src="{{url($info->getCoverImg($v->user_id,$v->opus_id,$v->imagepath))}}" alt="" class="cover-img-width">
                                </a>

                            </td>
                            <td>{{$v->opuses_name}}</td>
                            <td>{{$v->users_name}}</td>
                            <td class="adopt">
                                @if($v->adopt == 1)
                                    通过
                                @elseif($v->adopt == 2)
                                    不通过
                                @else
                                    <button adopt="yes" class="btn btn-success">通过</button>
                                    <button adopt="no" class="btn btn-danger">不通过</button>
                                @endif
                            </td>
                            <td>{{$v->create_schedule == 1?'已完结':'连载中'}}</td>
                            <td class="td-a-margin-both handle">
                                <button class="btn btn btn-primary rack" value="{{$v->display?'1':'0'}}">{{$v->display?'上架':'下架'}}</button>
                                <a href="/admin/cartoon/del/{{$v->opus_id}}" class="btn btn-danger">删除</a>
                            </td>
                        </tr>
                        @empty
                            <tr><td colspan="6">当前无数据</td></tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        {{$opus->appends(['search' => $search,'rank' => $rank])->links()}}
    </div>

    <script src="{{url('/js/admin/cartoon/index.js')}}"></script>
@endsection