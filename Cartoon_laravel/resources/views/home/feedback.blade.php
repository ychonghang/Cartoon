@extends('index')
@section('title','漫迹')
@section('content')
    <div class="row">
        <form action="" method="post">
            {{csrf_field()}}
            <div class="col-md-9 col-md-offset-1 " style="border: 1px solid #ccc;">
                <h3>请填写反馈意见</h3>
                <hr>
                <p>
                    请填写简短的问题说明（限500字以内）
                </p>
                <p style="color: #c0c0c0;">
                    为了提高帮您解决问题的效率，建议您尽量写明问题细节，而不是只写过于笼统的词句。
                    例如，只写「登录不了」太笼统，但如果写「登录时显示帐号密码错误」就很好理解，更容易帮助我们解决问题。
                </p>
                <textarea name="back" id="" cols="153" rows="10" style="resize:none;"></textarea>
                <br>
                <input type="submit" value="填写完毕，提交" class="btn btn-default">
                <h3>官方回复</h3>
                @foreach($a as $k)
                <textarea name="" id="" cols="30" rows="10" class="form-control" id="disabledInput" type="text"disabled style="resize:none;">
                    问题：
                    {{$k->back}}
                    答复：
                    {{$k->reply}}
                </textarea>
                @endforeach
                <p></p>
            </div>
        </form>
    </div>
@endsection