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
    @yield('style')
    <script src="{{asset('js/home/jquery-2.1.4.min.js')}}"></script>
    <script src="{{asset('js/home/bootstrap.min.js')}}"></script>
    <title>@yield('title')</title>
    <style>
        .wrapcenter{
            width:1505px;
            margin:0 auto;
        }

    </style>
</head>
<body>
        <!--   头部      -->
        <div class="container-fluid" style="padding: 0px;margin: 0px;  padding-top: 44px;">

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
                            <div class="col-xs-8 col-sm-2 nav-left1"><a href="">&nbsp;首页</a></div>
                            <div class="col-xs-8 col-sm-2 nav-left2"><a href="">&nbsp;手机版</a></div>
                            <div class="col-xs-8 col-sm-2 nav-left3"><a href="">有熊</a></div>
                            <div class="col-xs-8 col-sm-2 nav-left4"><a href="/home/Paladin">&nbsp;游戏</a></div>
                        </div>
                        <div class="col-xs-8 col-sm-6">
                            @if(Auth::check())
                                <div class="col-xs-8 col-sm-3 nav-right2">【{{Auth::user()->name}}】<span><a href="/home/personal">个人中心</a></span></div>
                                <div class="col-xs-8 col-sm-1 nav-right2 "><a href="/home/loginout">注销</a></div>
                            @else
                                <div class="col-xs-8 col-sm-1 nav-right1"><a href="/home/login">登录</a></div>
                                <div class="col-xs-8 col-sm-2 nav-right2 "><a href="/home/register">立即注册</a></div>
                            @endif
                            <div class="col-xs-8 col-sm-8">
                                <div class="col-xs-8 col-sm-2 nav-right3">通知</div>
                                <div class="col-xs-8 col-sm-2 nav-right3">书架</div>
                                <div class="col-xs-8 col-sm-2 nav-right3">充值</div>
                                <div class="col-xs-8 col-sm-3 nav-right3">上传漫画</div>
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
            <!--   分类导航栏     -->
            <div class="row wrapcenter">
                <div class="col-xs-9 col-md-offset-1" style="padding:0px">
                    <div class="col-xs-8 col-sm-1 navigation-4" >
                        漫画分类
                    </div>
                    <div class="col-md-1 navigation-list" >
                        <a href="">首页</a>
                    </div>
                    <div class="col-md-1 navigation-list" >
                        <a href="">排行榜</a>
                    </div>
                    <div class="col-md-1 navigation-list" >
                        <a href="">更新</a>
                    </div>
                    <div class="col-md-1 navigation-list" >
                        <a href="">VIP漫画</a>
                    </div>
                    <div class="col-md-1 navigation-list" >
                        <a href="">S/A级</a>
                    </div>
                    <div class="col-md-1 navigation-list" >
                        <a href="">少年</a>
                    </div>
                    <div class="col-md-1 navigation-list" >
                        <a href="">少女</a>
                    </div>
                    <div class="col-md-1 navigation-list" >
                        <a href="">绘本</a>
                    </div>
                    <div class="col-md-1 navigation-list" >
                        <a href="">完美</a>
                    </div>
                    <div class="col-md-1 navigation-list" >
                        <a href="">订阅</a>
                    </div>
                    <div class="col-md-1 navigation-list" >
                        <a href="">论坛</a>
                    </div>
                </div>
            </div>
            <!--   读者推荐榜     -->
            <div class="row wrapcenter">
                <div class="col-xs-9 col-md-offset-1" style="padding:0px">
                    <div class="col-md-1 navigation-5">
                    </div>
                    <div class="col-md-10 navigation-list5">
                        <a href="">动画:</a>&nbsp;
                        <span><a href="">神明之胄</a> &nbsp;|&nbsp;</span>
                        <span><a href="">镇魂街</a> &nbsp;|&nbsp;</span>
                        <span><a href="">雏蜂</a> &nbsp;|&nbsp;</span>
                        <span><a href="">十万个冷笑话</a> &nbsp;|&nbsp;</span>
                        <span><a href="">端脑</a>   &nbsp;|&nbsp;</span>
                        <span><a href="">馒头日记</a>&nbsp;|&nbsp;</span>
                        <span><a href="">死灵编码</a>&nbsp;|&nbsp;</span>
                        <span><a href="">熊猫手札</a> &nbsp;|&nbsp;</span>
                        <span><a href="">撸时代</a>&nbsp;|&nbsp;</span>
                        <span><a href="">沃土</a> &nbsp;|&nbsp;</span>
                        <span><a href="">刷兵男的搞笑剧场</a></span>
                    </div>
                    <div class="col-md-1 navigation-right5" style="padding-right: 0px;">
                        <a href="">读者推荐榜</a>
                    </div>

                </div>
            </div>

            <div class="wrapcenter">
                <!--     继承       -->
                @yield('content')
            </div>
            <!--   尾部          -->
            <div class="row">
                <div class="col-xs-9 col-md-offset-1 navigation-20">
                    <h3>合作小伙伴</h3>
                    <ul>
                        <li>
                            <a href="">
                                <img src="{{asset('image/z1.jpg')}}" alt="">
                            </a>
                        </li>
                        <li> <a href="">
                                <img src="{{asset('image/z2.jpg')}}" alt="">
                            </a></li>
                        <li> <a href="">
                                <img src="{{asset('image/z3.jpg')}}" alt="">
                            </a></li>
                        <li> <a href="">
                                <img src="{{asset('image/z4.png')}}" alt="">
                            </a></li>
                        <li> <a href="">
                                <img src="{{asset('image/nyule.png')}}" alt="">
                            </a></li>
                    </ul>
                </div>
            </div>
            <!--   尾部版权      -->
            <div class="row">
                <div class=" col-xs-9 col-md-offset-1" style="background-color:#79C90E;height: 5px;margin-top: 20px;">
                    <div class="col-md-2 navigation-21">
                        <span>关于我们</span>
                        <ul style="margin-top: 15px;padding-left: 0px;">
                            <li><a href="">关于漫迹</a></li>
                            <li><a href="">法律声明</a></li>
                            <li><a href="">招聘启事</a></li>
                            <li><a href="">APP下载</a></li>
                        </ul>
                    </div>
                    <div class="col-md-2 navigation-22">
                        <span>商务合作</span>
                        <ul style="margin-top: 15px;padding-left: 0px;">
                            <li><a href="">市场合作</a></li>
                            <li><a href="">商务合作</a></li>
                            <li><a href="">友情链接</a></li>
                            <li><a href="">十万个冷笑话合作</a></li>
                        </ul>
                    </div>
                    <div class="col-md-2 navigation-23">
                        <span>联系我们</span>
                        <ul style="margin-top: 15px;padding-left: 0px;">
                            <li><a href="">在线客服</a></li>
                            <li><a href="">官方微博</a></li>
                            <li><a href="">意见反馈</a></li>
                            <li><a href="">关于微信</a></li>
                        </ul>
                    </div>
                    <div class="col-md-2 navigation-24">
                        <span>问题帮助</span>
                        <ul style="margin-top: 15px;padding-left: 0px;">
                            <li><a href="">漫迹百科</a></li>
                            <li><a href="">如何上传</a></li>
                            <li><a href="">作者答疑</a></li>
                            <li><a href="">会员答疑</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3 navigation-25">
                        © 2017 漫迹
                        <a href="">***网络技术有限公司 版权所有</a>
                        <br>
                        京ICP证：1581019号
                        <br>
                        网络文化经营许可证: <a href="">京网文[2017]0010-027号</a>
                        <br>
                    </div>
                </div>


            </div>
        </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     </body>
</html>