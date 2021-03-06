<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/home/index.css')}}">
    <link rel="stylesheet" href="{{asset('css/home/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/home/css/bootstrap-theme.css')}}">
    <script src="{{asset('js/home/jquery-2.1.4.min.js')}}"></script>
    <script src="{{asset('js/home/bootstrap.min.js')}}"></script>
    <title></title>
    <style>
        .wrapcenter{
            width:1505px;
            margin:0 auto;
        }

    </style>
</head>
<body>
<!--   头部      -->
<div class="container-fluid" style="padding: 0px;margin: 0px;  padding-top: 44px;background-color:#F4F0D0;">

    <!--   头部导航栏     -->
    <div class="row " style=" width: 100%;position: fixed; z-index: 102; top: 0px; left: 0px; height: 44px;">
        <div class="wrapcenter">
            <div class="row" >
                <div class="col-md-4 navigation-1">

                </div>
                <div class="col-md-4 navigation-1">

                </div>
                <div class="col-md-4 navigation-1">

                </div>
            </div>
            <!--   头部彩色条     -->
            <div class="col-md-12 navigation-2"  style="width: 1550px; margin: 0 auto;">
                <div class="col-xs-8 col-sm-6">
                    <div class="col-xs-8 col-sm-2"></div>

                    <div class="col-xs-8 col-sm-2 nav-left1"><a href="/">&nbsp;首页</a></div>

                    <div class="col-xs-8 col-sm-2 nav-left2"><a href="">&nbsp;手机版</a></div>
                    <div class="col-xs-8 col-sm-2 nav-left3"><a href="">有熊</a></div>
                    <div class="col-xs-8 col-sm-2 nav-left4"><a href="/home/Paladin">&nbsp;游戏</a></div>
                </div>
                <div class="col-xs-8 col-sm-6">
                    @if(Auth::check())
                        <div class="col-xs-8 col-sm-3 nav-right2"><span><a href="/home/personal">【{{Auth::user()->name}}】</a></span></div>

                        <div class="col-xs-8 col-sm-1 nav-right2 "><a href="/home/loginout">注销</a></div>
                    @else
                        <div class="col-xs-8 col-sm-1 nav-right1"><a href="home/login">登录</a></div>
                        <div class="col-xs-8 col-sm-2 nav-right2 "><a href="home/register">立即注册</a></div>
                    @endif
                    <div class="col-xs-8 col-sm-8">
                        <div class="col-xs-8 col-sm-2 nav-right3">通知</div>
                        <div class="col-xs-8 col-sm-2 nav-right3">书架</div>
                        <div class="col-xs-8 col-sm-2 nav-right3">充值</div>
                        <div class="col-xs-8 col-sm-3 nav-right3"><a href="/home/author/index" style="color:#fffde7;">上传漫画</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--   头部图片       -->
    <div class="row" style="width: 1550px; margin: 0 auto;">
        <div class="col-xs-12 navigation-3" >
            <div class="col-md-3 col-md-offset-8">
                <div class="input-group navnavigation-search">
                    <input class="form-control"type="text">
                    <span class="input-group-btn">
                                        <button class="btn glyphicon glyphicon-search navnavigation-button" type="button"></button>
                                    </span>
                </div>
            </div>
        </div>
    </div>

    {{--内容--}}
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
    <div class="col-md-6 col-md-offset-3" style="background-color:mintcream;margin-top:10px; border-radius: 4px;margin-left: 120px;">

        <hr style="border:2px solid">
        <div class="bs-example bs-example-tabs" data-example-id="togglable-tabs">
            <ul id="myTabs" class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                    <a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">个人详情</a>
                </li>
                <li role="presentation" class="">
                    <a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile" aria-expanded="false">修改信息</a>
                </li>
                <li role="presentation" class="">
                    <a href="#pwd" role="tab" id="pwd-tab" data-toggle="tab" aria-controls="pwd" aria-expanded="false">修改密码</a>
                </li>
                <li role="presentation" class="">
                    <a href="#book" role="tab" id="book-tab" data-toggle="tab" aria-controls="book" aria-expanded="false">书架</a>
                </li>
                <li role="presentation" class="">
                    <a href="#photo" role="tab" id="photo-tab" data-toggle="tab" aria-controls="photo" aria-expanded="false">相册</a>
                </li>
            </ul>
            {{--个人信息--}}
            <div id="myTabContent" class="tab-content" style="min-height: 500px;">
                <div role="tabpanel" class="tab-pane fade active in" id="home" aria-labelledby="home-tab">
                    @foreach($k as $v)
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">头像</label>
                            <div class="col-sm-10">
                                <img src="{{url($v->avatar)}}"  class="img-circle" width="180" height="180">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">昵称:</label>
                            <div class="col-sm-10">
                                <span class="form-control-static">{{$v->name}}</span>
                                @if($v->vip == 1)
                                    <span clss="form-control-static" style="color:red;cursor:pointer;" title="至尊会员">【VIP】</span><p></p>
                                @else
                                    <span class="form-control-static"><a href="#" style="color:#B6B8B7;" title="您还不是会员哦~">[马上成为VIP]</a></span>
                                    <p></p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">真实姓名:</label>
                            <div class="col-sm-10">
                                <p class="form-control-static">{{$v->realname}}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">性别:</label>
                            <div class="col-sm-10">
                                @if($v->sex==0)
                                    <p class="form-control-static">男</p>
                                @else
                                    <p class="form-control-static">女</p>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Email:</label>
                            <div class="col-sm-10">
                                <p class="form-control-static">{{$v->email}}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">地址:</label>
                            <div class="col-sm-10">
                                <p class="form-control-static">{{$v->address}}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">出生日期:</label>
                            <div class="col-sm-10">
                                <p class="form-control-static">{{$v->birthday}}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">所在城市:</label>
                            <div class="col-sm-10">
                                <p class="form-control-static">{{$v->citylocation}}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">联系电话:</label>
                            <div class="col-sm-10">
                                <p class="form-control-static">{{$v->tel}}</p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">注册时间:</label>
                            <div class="col-sm-10">
                                <p class="form-control-static">{{$v->created_at}}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
                {{--个人信息结束--}}

                {{--书架开始--}}
                <div role="tabpanel" class="tab-pane fade" id="book" aria-labelledby="book-tab">
                    空书架
                </div>
                {{--书架结束--}}

                {{--修改开始--}}
                <div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab">
                    <form class="form-horizontal" action="/home/DatumUpdate" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        @foreach($k as $v)
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">头像</label>
                                <div class="col-sm-10">
                                    <img src="{{url($v->avatar)}}"  class="img-circle" width="180" height="180">
                                    <input type="file" name="avatar" value="{{url($v->avatar)}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName3" class="col-sm-2 control-label">昵称</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputEmail3" value="{{$v->name}}" name="name" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="inputEmail3" value="{{$v->email}}" disabled>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">手机号码</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputPassword3" value="{{$v->tel}}" name="tel">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">真实姓名</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputPassword3" value="{{$v->realname}}" name="realname">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">地址</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputPassword3" value="{{$v->address}}" name="address">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">性别</label>
                                <div class="col-sm-10">
                                    <label><input type="radio" name="sex" id="optionsRadios1" value="0" {{$v->sex==0?'checked':''}}>男
                                    </label>
                                    <label><input type="radio" name="sex" id="optionsRadios1" value="1" {{$v->sex==1?'checked':''}}>女
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">生日</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="inputPassword3" value="{{$v->birthday}}" name="birthday">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputPassword3" class="col-sm-2 control-label">当前所在城市</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputPassword3" value="{{$v->citylocation}}" name="citylocation">
                                </div>
                                <div>
                                    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
                                    <html xmlns="http://www.w3.org/1999/xhtml">
                                    <head>
                                        <meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
                                        <meta name="keywords" content="百度地图,百度地图API，百度地图自定义工具，百度地图所见即所得工具" />
                                        <meta name="description" content="百度地图API自定义地图，帮助用户在可视化操作下生成百度地图" />
                                        <title>百度地图API自定义地图</title>
                                        <!--引用百度地图API-->
                                        <style type="text/css">
                                            html,body{margin:0;padding:0;}
                                            .iw_poi_title {color:#CC5522;font-size:14px;font-weight:bold;overflow:hidden;padding-right:13px;white-space:nowrap}
                                            .iw_poi_content {font:12px arial,sans-serif;overflow:visible;padding-top:4px;white-space:-moz-pre-wrap;word-wrap:break-word}
                                        </style>
                                        <script type="text/javascript" src="http://api.map.baidu.com/api?key=&v=1.1&services=true"></script>
                                    </head>

                                    <body>
                                    <!--百度地图容器-->
                                    <div style="width:450px;height:250px;border:#ccc solid 1px;" id="dituContent"></div>
                                    </body>
                                    <script type="text/javascript">
                                        //创建和初始化地图函数：
                                        function initMap(){
                                            createMap();//创建地图
                                            setMapEvent();//设置地图事件
                                            addMapControl();//向地图添加控件
                                        }

                                        //创建地图函数：
                                        function createMap(){
                                            var map = new BMap.Map("dituContent");//在百度地图容器中创建一个地图
                                            var myGeo = new BMap.Geocoder();
                                            // 将地址解析结果显示在地图上，并调整地图视野
                                            myGeo.getPoint("{{$v->citylocation}}", function(point){
                                                if (point) {
                                                    map.centerAndZoom(point, 16);
                                                    map.addOverlay(new BMap.Marker(point));
                                                }
                                            });

                                            var myGeo = new BMap.Point(121.448122,31.29858);//定义一个中心点坐标
                                            map.centerAndZoom(myGeo,17);//设定地图的中心点和坐标并将地图显示在地图容器中
                                            window.map = map;//将map变量存储在全局
                                        }

                                        //地图事件设置函数：
                                        function setMapEvent(){
                                            map.enableDragging();//启用地图拖拽事件，默认启用(可不写)
                                            map.enableScrollWheelZoom();//启用地图滚轮放大缩小
                                            map.enableDoubleClickZoom();//启用鼠标双击放大，默认启用(可不写)
                                            map.enableKeyboard();//启用键盘上下左右键移动地图
                                        }

                                        //地图控件添加函数：
                                        function addMapControl(){
                                            //向地图中添加缩放控件
                                            var ctrl_nav = new BMap.NavigationControl({anchor:BMAP_ANCHOR_TOP_LEFT,type:BMAP_NAVIGATION_CONTROL_LARGE});
                                            map.addControl(ctrl_nav);
                                            //向地图中添加比例尺控件
                                            var ctrl_sca = new BMap.ScaleControl({anchor:BMAP_ANCHOR_BOTTOM_LEFT});
                                            map.addControl(ctrl_sca);
                                        }


                                        initMap();//创建和初始化地图
                                    </script>
                                    </html>

                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-default">保存</button>
                                </div>
                            </div>
                        @endforeach
                    </form>
                </div>
                {{--修改结束--}}

                {{--密码修改--}}
                <div role="tabpanel" class="tab-pane fade" id="pwd" aria-labelledby="pwd-tab">
                    <form action="" id="form">
                        <div class="" style="width:650px;margin:0 auto;background-color:silver;margin-top:10px;border-radius: 5px;">
                            <span>请慎重修改您的密码。</span><br>
                            <p>密码中不应为空或包含逗号，单引号，双引号，左斜线。密码应由数字、字母组成；长度应为5-16 个字符。</p>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">旧密码</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="oldpwd" name="old_password">
                                <span class="cuo_wu">@if(count($errors))
                                        {{$errors->first('old_password')}}
                                    @endif</span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">新密码</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="newpwd" name="new_password">
                                <span class="cuo_wu">@if(count($errors))
                                        {{$errors->first('new_password')}}
                                    @endif
                               </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">确认密码</label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="pwdconf" name="new_password_confirmation">
                                <span class="cuo_wu">@if(count($errors))
                                        {{$errors->first('password_confirmation')}}
                                    @endif
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="button" class="btn btn-default" id="submit">保存</button>
                            </div>
                        </div>
                    </form>
                </div>
                {{--密码修改结束--}}
                {{--相册--}}
                <div role="tabpanel" class="tab-pane fade" id="photo" aria-labelledby="photo-tab">
                    <div class="bs-example bs-example-tabs" data-example-id="togglable-tabs">
                        <form action="/home/photo" method="post" enctype="multipart/form-data">
                            {{csrf_field()}}
                    <ul id="myTabs" class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="">
                        <a href="#add" id="add-tab" role="tab" data-toggle="tab" aria-controls="add" aria-expanded="false" class="glyphicon glyphicon-ok">新增照片</a>
                    </li>
                    </ul>
                    <div role="tabpanel" class="tab-pane fade" id="add" aria-labelledby="add-tab">
                        <input type="file" name="paths" style="margin-top: 3px;">
                        <input type="submit">
                    </div>
                     </form>
                    </div>
                        @foreach($phot as $v)
                            <div style="float:left;">
                                <img src="{{url($v->paths)}}" style="margin:15px;"width="190"height="250">
                                <p>
                                    <input type="button" class="btn btn-danger" value="删除" id="ss">
                                    <input type="hidden" value="{{$v->id}}" class="dii">
                                </p>
                            </div>
                            @endforeach
                </div>
                <script>
                    $(function(){
                        $(this).on('click','#ss',function(){
                            $(this).parent().parent().empty()
                            $id = $(this).siblings('.dii').val();
                            $.ajax({
                                type:'get',
                                url:"{{url('home/photodel')}}",
                                data:'id='+$id,
                                success:function(data){
                                    if (data==111){
                                        alert('删除成功')
                                    }else {
                                        alert('删除失败')
                                    }
                                },
                                error:function(){
                                    alert('失败');
                                },
                                dataTpye:'json'
                            })
                        })
                    })
                </script>
                {{--结束相册--}}
                <script>
                    $(function(){
                        $("#submit").click(function(){
                            $.ajax({
                                url:'/home/PwdUpdate',
                                type:'post',
                                data:$('#form').serialize(),
                                success:function(data){
                                    alert("密码修改成功！");
                                    // 密码修改成功跳转到登录页面
                                    window.location.href = '/home/login';
                                },
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                                },
                                error:function(){
                                    alert("修改失败！");
                                }
                            });
                        });
                    })
                </script>
                <meta name="_token" content="{!! csrf_token() !!}"/>
            </div>
        </div>
    </div>
    {{--内容结束--}}

    {{--footer底部--}}
    <div class="col-md-1" style="background-color:mintcream;margin-top:10px;margin-left:200px;width:1200px;border-radius: 5px;">
        <div class="box_ljie" style="float: left;padding:20px;">
            <a class="gray" href="#" target="blank">首页</a>
            | <a class="gray" href="#" target="blank">关于有妖气</a>
            | <a class="gray" href="#" target="blank">帮助中心</a>
            | <a class="gray" href="#" target="blank">意见反馈</a>
            | <a class="gray" href="#" target="blank">不良信息举报</a>
        </div>
        <div class="box_bquan" style="float: right;padding:20px;">
            <span class="gray">Copyright©2005-2017 有妖气 </span>
            <a class="blue unline" href="#" target="blank">版权所有</a>
            <br>京ICP证：120807号
        </div>
    </div>
</div>
</body>

</html>

</html>

