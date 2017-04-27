@extends('layouts.readpage')


@section('content')
        <div class="top-img">
            <dl class="title">
                <dt>
                    {{$chapter->name}}
                    &nbsp;&gt;&nbsp;
                    <b>{{$chapter->chapternum}}</b>
                </dt>
                <dd>
                    作者：
                    {{$userName->name}}
                    &nbsp;&nbsp;&nbsp;&nbsp;
                    更新日期：{{date('Y-m-d',time($chapter->updated_at))}}
                </dd>
            </dl>
        </div>
        <div class="all_main min-height">

            <div class="img-max-width">
                @forelse($chapterImg as $v)
                    <img src="{{url('uploads/'.$imgpath.$v->imgname)}}" alt="">
                @empty
                    <p align="center" class="img_p">未完待续，敬请期待更新</p>
                @endforelse
            </div>
        </div>
        <div class="bottom-img">
        </div>
@endsection