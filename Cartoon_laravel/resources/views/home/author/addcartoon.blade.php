@extends('layouts.author.index')

@section('title','添加漫画')
@section('style')
@endsection

@section('content')

    <div class="all">
        <h3 class="h3_center h3_top">添加漫画</h3>

        <div class="all_main">
            <div class="row row_top">
                {{-- 填写框开 --}}
                <form class="form-horizontal" action="/home/author/add" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    @if($errors->first('uperror'))
                        <div class="alert alert-danger" role="alert">{{$errors->first('uperror')}}</div>
                    @endif
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label color-green"><span class="color-red">*</span>漫画名称</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" id="inputEmail3" placeholder="最多输入16个汉字">{!! $errors->first('name') !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label color-green">作品简介</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="desc" rows="6" placeholder="最大输入上限为200个汉字"></textarea> {!! $errors->first('desc') !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label color-green">作者公告</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="authornotice" rows="6" placeholder="最大输入上限为200个汉字"></textarea> {!! $errors->first('authornotice') !!}
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label color-green"><span class="color-red">*</span>作品类型</label>
                        <div class="col-sm-10">
                            <select class="form-control input-lg" name="cartoontype">
                                @forelse($category as $v)
                                    @if($v->rank == 0)
                                        <option value="{{$v->id}}">{{$v->name}}</option>
                                    @endif
                                @empty
                                    <option>请选择</option>
                                @endforelse
                            </select> {!! $errors->first('cartoontype') !!}
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label color-green"><span class="color-red">*</span>作品题材</label>
                        <div class="col-sm-10">
                            <select class="form-control input-lg" multiple name="theme[]">
                                @forelse($category as $v)
                                    @if($v->rank == 2)
                                        <option value="{{$v->id}}">{{$v->name}}</option>
                                    @endif
                                @empty
                                    <option>请选择</option>
                                @endforelse
                            </select>{!! $errors->first('theme') !!}
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label color-green"><span class="color-red">*</span>用户群</label>
                        <div class="col-sm-10 div_left">
                            @forelse($category as $k => $v)
                                @if($v->rank == 1 && $k == 0)
                                    <label class="radio-inline">
                                        <input type="radio" checked name="usergroup" id="inlineRadio1" value="{{$v->id}}"> {{$v->name}}
                                    </label>
                                    @elseif($v->rank == 1)
                                    <label class="radio-inline">
                                        <input type="radio" name="usergroup" id="inlineRadio1" value="{{$v->id}}"> {{$v->name}}
                                    </label>
                                @endif
                            @empty
                            @endforelse
                            {!! $errors->first('usergroup') !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label color-green"><span class="color-red">*</span>创作进程</label>
                        <div class="col-sm-10 div_left">
                            <label class="radio-inline">
                                <input type="radio" checked name="createschedule" id="inlineRadio1" value="0"> 连载中
                            </label>
                            <label class="radio-inline">
                                <input type="radio" name="createschedule" id="inlineRadio2" value="1"> 已完结
                            </label>
                            {!! $errors->first('createschedule') !!}
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label color-green"><span class="color-red">*</span>封面图片</label>
                        <div class="col-sm-10 div_left">
                            <label for="inputEmail3" class="col-sm-2 control-label color-green clear_padding_left clear_font_color">
                                <input type="file" id="exampleInputFile" name="imagepath">
                            </label>
                            {!! $errors->first('imagepath') !!}
                        </div>
                    </div>



                    <div class="form-group tag_top">
                        <div class="col-sm-offset-1 col-sm-10">
                            <button type="submit" class="btn btn-default">添加</button>
                        </div>
                    </div>
                </form> {{-- 填写框关 --}}
            </div>
        </div>
    </div>
@endsection