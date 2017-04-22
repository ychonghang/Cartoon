@extends('layouts.master')

@section('title','修改页面')

@section('style')
    <link rel="stylesheet" href="{{url('/css/admin/css/common.css')}}">
@endsection



@section('content')
    <div class="container category-div-margin-top col-sm-offset-3">
        <form class="col-sm-6" action="/admin/category/update" method="post">
            {{csrf_field()}}
            <div class="row">
                <div class="col-md-offset-3">{!! $errors->get('handle')[0] or '' !!}</div>
            </div>
            <div class="form-group">
                <label class="control-label" for="inputSuccess1">分类名</label>{!! $errors->get('name')[0] or '' !!}
                <input type="text" name="name" value="{{$verify->name}}" class="form-control" id="inputSuccess1" autocomplete="off">
            </div>

            <div class="form-group">
                <label class="control-label" for="inputSuccess1">分类级别</label> {!! $errors->get('rank')[0] or '' !!}
                <select class="form-control" name="rank">
                    @forelse($category as $k => $v)
                        @if($v->rank == $verify->rank)
                            <option selected value="{{$v->rank}}">{{$v->rank}}</option>
                            @continue
                        @endif
                        <option value="{{$v->rank}}">{{$v->rank}}</option>
                        @if(count($category)-1 == $v->rank)
                            <option value="{{$v->rank+1}}">{{$v->rank+1}}</option>
                        @endif
                    @empty
                        <option value="0">0</option>
                    @endforelse
                </select>
            </div>

            <div class="form-group">
                <input type="hidden" name="id" value="{{$verify->id}}">
                <button type="submit" class="btn btn-primary col-md-offset-4">修改</button>
                <button type="reset" class="btn btn-primary col-md-offset-1">重置</button>
            </div>
        </form>
    </div>
@endsection

