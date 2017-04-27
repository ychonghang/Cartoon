@extends('layouts.index')
@section('title','游戏')
@section('content')
    <div>
        @foreach($pp as $v)
                <div class="col-md-1 col-md-offset-1" style="margin-top: 20px;background-color: #E4F3FD;padding:15px;width:180px;border-radius: 10px;">
                    <div style="border: 5px solid #FCFFFF;border-radius: 5px;">
                        <span style="margin-left:30px;height: 80px;width: 150px;font-size: 18px;">通告栏>>></span>
                        <p style="margin-top: 20px;"><a href="{{url($v->path)}}">{{$v->contents}}</a></p>
                    </div>
                </div>
            @endforeach
        <div class="col-md-6 col-md-offset-3" style="background-color:#C3E3FE;margin-top:10px; border-radius: 4px;margin-left:120px;">
            <div id="myTabContent" class="tab-content" style="min-height: 500px;">
                <ul>
                    @foreach($users as $v)
                        <li style="list-style: none;margin: 20px;float: left;">
                            <a href="{{asset($v->path)}}"><img src="{{url($v->img)}}" class="img-thumbnail" width="200" hieght="200"></a>
                            <p style="padding-left: 20px;">{{($v->name)}}</p>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    @endsection