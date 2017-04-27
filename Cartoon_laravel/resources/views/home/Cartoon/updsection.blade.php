@extends('layouts.author.index')

@section('title','修改章节')

@section('style')
    <link rel="stylesheet" href="{{url('css/home/cartoon/addsection.css')}}">
    <script src="{{'/js/common/jquery-1.8.3.min.js'}}"></script>
@endsection

@section('content')
    <div class="all">
        <h3 class="cartoon-h3-center h3_top">修改{{$name}}章节</h3>

        <div class="all_main">
            <div class="row row_top">
                {{-- 填写框开 --}}
                <form class="form-horizontal min-height" action="/home/cartoon/updsection" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    @if($errors->first('uperror'))
                        <div class="alert alert-danger" role="alert">{{$errors->first('uperror')}}</div>
                    @endif
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label color-green"><span class="color-red">*</span>章节列表</label>
                        <div class="col-sm-10">
                            <select class="form-control input-lg" name="chapter_id" id="chapter_id">
                                @forelse($chapter as $v)
                                 <option value="{{$v->id}}">{{$v->chapternum}}</option>
                                    @empty
                                    <option value="">请选择</option>
                                @endforelse

                            </select> {!! $errors->first('chapter_id') !!}
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label color-green"><span class="color-red">*</span>章节名称</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" value="{{$yi->chapternum}}" class="form-control" id="inputEmail3" placeholder="最多输入16个汉字">{!! $errors->first('name') !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label color-green"><span class="color-red">*</span>章节内容</label>
                        <div class="col-sm-10 div_left">
                            <label for="inputEmail3" class="col-sm-2 control-label color-green clear_padding_left clear_font_color">
                                <input type="file" name="imagepath[]" multiple>
                            </label>
                            {!! $errors->first('imagepath') !!}
                        </div>
                    </div>

                    <div class="form-group tag_top">
                        <div class="col-sm-offset-1 col-sm-10">
                            <input type="hidden" name="id" value="{{$id}}">
                            <button type="submit" class="btn btn-default">修改章节</button>
                            <button class="btn btn-default" id="del">删除章节</button>
                        </div>
                    </div>
                </form> {{-- 填写框关 --}}
            </div>
        </div>
    </div>
    <script src="{{url("js/home/cartoon/updsection.js")}}"></script>
@endsection