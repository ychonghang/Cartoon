@extends("layouts.author.index")

@section('title','成为作者')
@section('style')
    <link rel="stylesheet" href="{{url('/css/home/author/become.css')}}">

    <script src="{{url("/js/common/jquery-1.8.3.min.js")}}"></script>
@endsection



@section('content')

    <div class="all ">
        <h3 class="h3_center h3_top clear-position">申请成为漫画作者</h3>

        <div class="all_main min-height">
            <div class="row row_top">
                {{-- 填写框开 --}}
                <form class="form-horizontal" action="/home/author/become" method="post" enctype="multipart/form-data">
                    {{csrf_field()}}
                    @if($errors->first('uperror'))
                        <div class="alert alert-danger" role="alert">{{$errors->first('uperror')}}</div>
                    @endif
                    <input type="hidden" name="id" value="11">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label color-green"><span class="color-red"></span>手机号码</label>
                        <div class="col-sm-10">
                            <input type="number" name="phone" class="form-control" id="inputEmail3" placeholder="手机号码" maxlength=11>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label color-green"><span class="color-red"></span>验证码</label>
                        <div class="col-sm-10">
                            <input type="text" name="code" class="form-control" id="inputEmail3" placeholder="验证码">
                        </div>
                    </div>








                    <div class="form-group tag_top">
                        <div class="col-sm-offset-1 col-sm-10">
                            <button type="submit" class="btn btn-default">成为作者</button>
                            <button id="getCode" class="btn btn-default">获取验证码</button>
                        </div>
                    </div>
                </form> {{-- 填写框关 --}}
            </div>
        </div>
    </div>

    <script src="{{url("/js/home/author/becomeauthor.js")}}"></script>
@endsection