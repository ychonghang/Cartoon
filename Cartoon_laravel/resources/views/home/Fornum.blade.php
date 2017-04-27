@extends('layouts.index')
@section('title','论坛')
@section('content')
    <div>
        @if(Auth::check())
               <div class="col-md-1 col-md-offset-1" style="margin-top: 20px;background-color: #00aaf1;padding:15px;width:180px;border-radius: 10px;">
                   <img src="{{url(Auth::user()->avatar)}}" width="150" height="150" class="img-thumbnail">
                   <p>{{Auth::user()->name}}</p>
               </div>
        @else
            @foreach($qaz as $v)
            <div class="col-md-1 col-md-offset-1" style="margin-top: 20px;background-color: #E4F3FD;padding:15px;width:180px;border-radius: 10px;">
                <div style="border: 5px solid #FCFFFF;border-radius: 5px;">
                <span style="margin-left:30px;height: 80px;width: 150px;font-size: 18px;">通告栏>>></span>
                <p style="margin-top: 20px;"><a href="{{url($v->path)}}">{{$v->contents}}</a></p>
                </div>
            </div>
            @endforeach
       @endif
    <div class="col-md-6 col-md-offset-3" style="background-color:#F2FAFC;margin-top:10px; border-radius: 4px;margin-left:120px;">
        <div id="myTabContent" class="tab-content" style="min-height: 500px;">
            <ul>
                <li style="list-style: none;">
                    @if(Auth::check())
                    <textarea cols="80" rows="3" style="font-family: Tahoma, 宋体;resize: none;border:1px solid black;margin-top: 30px;"></textarea>
                        <input class="btn btn-info" type="button" value="发表说说" id="btn">
                    @endif
                        <div class="pull-left" style="width:540px;padding:20px 20px;border-top:1px solid #ccc;margin-top:20px">
                            <div class="panel-heading">
                                @foreach($use as $s)
                                <div style="width:50px;height:50px;float:left"><img src="{{url($s->avatar)}}" width="50" heifht="50"></div>
                                <div style="padding-left:10px;float:left">
                                    <p>{{$s->name}}的说说</p>
                                </div>
                                <div style="float:left;width:500px;margin-top:10px;vertical-align: middle;">{{$s->comment}}
                                <a id="cpin" class="btn btn-warning glyphicon glyphicon-thumbs-down" role="button" aria-expanded="false"style="float: right;">{{$s->nolike}}</a>
                                    <input type="hidden" value="{{$s->id}}" class="sdf">
                                <a id="dianz" class="btn btn-default glyphicon glyphicon-thumbs-up" role="button" aria-expanded="false" style="float: right;">{{$s->likenum}}</a>
                                <input type="hidden" value="{{$s->id}}" class="wsd">
                            </div>
                                @endforeach
                            </div>
                        </div>
                    </li>
                </ul>
        </div>
    </div>
    </div>

    {{--说说的发布--}}
    @if(Auth::check())
    <script>
        $("#btn").click(function(){
            $a=$('textarea').val();
            if($a==''){
                alert('发表内容不能为空');
            }else{
                $.ajax({
                    type:"get",
                    url:'/home/fornum',
                    data:"uid={{Auth::user()->id}}&comment="+$a,
                    success:function(data){
                        alert("发表成功");
                    },
                    error:function(){
                        alert('发表失败');
                    },
                    dataType:'json'
                });
            }
        });
    </script>
    @endif
    {{--点赞--}}
    <script>
        $(function(){
            $(this).on('click','#dianz',(function(){
                $id = $(this).siblings('.wsd').val();
                $.ajax({
                    type:"get",
                    url:"{{url('/home/Dianz')}}",
                    data:'id='+$id,
                    success:function(data){
                        if (data==111){
                            alert("成功点赞");
                        }else{
                           alert("点赞失败");
                        }

                    },
                    error:function(){
                        alert('点赞失败');
                    },
                    dataType:'json'
                })
            }))
        })
    </script>
    {{--差评点赞--}}
    <script>
        $(function(){
            $(this).on('click','#cpin',(function(){
                $id = $(this).siblings('.sdf').val();
                $.ajax({
                    type:"get",
                    url:"{{url('/home/cpin')}}",
                    data:'id='+$id,
                    success:function(data){
                        if (data==111){
                            alert("成功差评");
                        }else{
                            alert("差评失败");
                        }

                    },
                    error:function(){
                        alert('失败');
                    },
                    dataType:'json'
                })
            }))
        })
    </script>
    {{--点赞--}}
    {{--说说发布结束--}}
    @endsection