@extends('layouts.author.index')


@section('title',$chapter->name.'-'.$chapter->chapternum)

@section('style')
    <link rel="stylesheet" href="{{url('/css/home/cartoon/sectionpage.css')}}">
@endsection

@section('content')
    <div class="all">
        <h3 class="cartoon-h3-center h3_top">{{$chapter->name.'-'.$chapter->chapternum}}</h3>

        <div class="all_main min-height">

                <div class="img-max-width">
                    @forelse($chapterImg as $v)
                    <img src="{{url('uploads/'.$imgpath.$v->imgname)}}" alt="">
                        @empty
                        <p align="center" class="img_p">未完待续，敬请期待更新</p>
                    @endforelse
                </div>
            @if(!empty($chapterImg))
                <div class="text_a">
                    <a href="/home/cartoon/index/{{$chapter->opus_id}}">返回作品</a>
                    @if(!empty($pre))
                    <a href="/home/cartoon/looksection/{{$pre}}"><上一章</a>
                    @endif
                    @if(!empty($next))
                    <a href="/home/cartoon/looksection/{{$next}}">下一章></a>
                    @endif
                </div>
            @endif
        </div>

    </div>
@endsection