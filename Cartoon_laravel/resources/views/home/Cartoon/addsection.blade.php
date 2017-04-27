@extends('layouts.author.index')

@section('title','添加章节')

@section('style')
    <link rel="stylesheet" href="{{url('css/home/cartoon/addsection.css')}}">
    <script src="{{'/js/common/jquery-1.8.3.min.js'}}"></script>
@endsection

@section('content')
    <div class="all">
        <h3 class="cartoon-h3-center h3_top">添加{{$name}}章节</h3>

        <div class="all_main">
            <div class="row row_top">
                {{-- 填写框开 --}}
                <form class="form-horizontal min-height" action="/home/cartoon/add" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    @if($errors->first('uperror'))
                        <div class="alert alert-danger" role="alert">{{$errors->first('uperror')}}</div>
                    @endif
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label color-green"><span class="color-red">*</span>章节名称</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" id="inputEmail3" placeholder="最多输入16个汉字">{!! $errors->first('name') !!}
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
                            <button type="submit" class="btn btn-default">全部完成并提交</button>
                        </div>
                    </div>
                </form> {{-- 填写框关 --}}
            </div>
        </div>
    </div>

@endsection