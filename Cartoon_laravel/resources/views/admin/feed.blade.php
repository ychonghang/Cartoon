@extends('layouts.master')
@section('content')
            <form action="" method="post" style="padding: 30px;">
                {{csrf_field()}}
                <div>
                    <h3>问题反馈</h3>
                    <hr>

                    <textarea name="" id="" cols="80" rows="7" class="form-control" id="disabledInput" type="text"disabled style="resize:none;width: 660px;">
                    {{$back->back}}
                    </textarea>
                    <h3>回复</h3>
                    <textarea name="reply" id="" cols="80" rows="7" style="resize: none;"></textarea>
                    <p></p>
                    <input type="submit" value="提交" class="btn btn-default">
                </div>
            </form>
@endsection