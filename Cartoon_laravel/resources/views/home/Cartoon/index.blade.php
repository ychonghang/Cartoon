@extends('layouts.author.index')

@section('title','漫画 - 章节管理')

@section('style')
    <link rel="stylesheet" href="{{url('css/home/cartoon/common.css')}}">
    <script src="{{url('/js/common/jquery-1.8.3.min.js')}}"></script>
@endsection

@section('content')
    {{csrf_field()}}
    <div class="all">
        <h3 class="cartoon-h3-center">{{$opus->name}}-章节列表</h3>
        <input type="hidden" id="opus_id"  value="{{$opus->id}}">
        <div class="all_main">
            <div class=" min-height">
                <div class="detail-content clear">
                     <div class="detail-left">
                         <div class="img-bg">
                             <img class="detail-img-max" src="{{url($info->getCoverImg($user,$opus->id,$opus->imagepath))}}" alt="">
                         </div>
                     </div>


                     <div class="detail-right">
                           <div class="top">
                               <div class="top_line">
                                   类别：
                                   <span>
                                   @forelse($classify as $k => $v)
                                       @if($k == 0)
                                            {{$v}}
                                           @continue;
                                       @else
                                        /{{$v}}
                                       @endif
                                       @empty
                                       空
                                   @endforelse
                                   </span>

                               </div>
                               <div class="top_line">
                                   类型：
                                   <span>
                                   {{$type or ''}}
                                   </span>
                                   状态：
                                   <span>{{$opus->create_schedule?'已完结':'连载中'}}</span>
                               </div>
                           </div>

                           <div class="middle">
                                <p class="words">{{$opus->desc}}</p>
                           </div>

                           <div class="bottom">

                           </div>
                     </div>
                </div>

                <div class="detail-content-bottom">
                    <div class="section_title clear">
                        <strong>章节列表</strong>
                        <a class="ordera up" id="chapter">章节顺序</a>
                        <a href="/home/cartoon/add/{{$opus->id}}" class="addsection">添加章节</a>
                        <a href="/home/cartoon/upd/{{$opus->id}}" class="addsection">修改章节</a>
                    </div>
                    <div class="section">
                        <ul class="clear" id="ul_section">
                            @forelse($chapter as $v)
                            <li>
                                <a href="/home/cartoon/looksection/{{$v->id}}">{{$v->chapternum}}</a>
                            </li>
                                @empty
                                <p>当前无章节,请添加</p>
                            @endforelse



                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{url('/js/home/cartoon/index.js')}}"></script>
@endsection