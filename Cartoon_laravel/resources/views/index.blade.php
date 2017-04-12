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
    <title>漫迹</title>
</head>
<body>
        <!--   头部      -->
        <div class="container-fluid" style="padding: 0px;margin: 0px;">
            <!--   头部彩色条     -->
            <div class="row">
                <div class="col-md-4 navigation-1">

                </div>
                <div class="col-md-4 navigation-1">

                </div>
                <div class="col-md-4 navigation-1">

                </div>
            </div>
            <!--   头部导航栏     -->
            <div class="row">
                <div class="col-md-12 navigation-2">
                    <div class="col-xs-8 col-sm-6">
                        <div class="col-xs-8 col-sm-2"></div>
                        <div class="col-xs-8 col-sm-2 nav-left1"><a href="">&nbsp;首页</a></div>
                        <div class="col-xs-8 col-sm-2 nav-left2"><a href="">&nbsp;手机版</a></div>
                        <div class="col-xs-8 col-sm-2 nav-left3"><a href="">有熊</a></div>
                        <div class="col-xs-8 col-sm-2 nav-left4"><a href="">&nbsp;游戏</a></div>
                    </div>
                    <div class="col-xs-8 col-sm-6">
                        @if(Auth::check())
                            <div class="col-xs-8 col-sm-1 nav-right2">【{{Auth::user()->name}}】</div>
                            <div class="col-xs-8 col-sm-2 nav-right2 "><a href="{{url('home/loginout')}}">注销</a></div>
                        @else
                            <div class="col-xs-8 col-sm-1 nav-right1"><a href="{{url('home/login')}}">登录</a></div>
                            <div class="col-xs-8 col-sm-2 nav-right2 "><a href="{{url('home/register')}}">立即注册</a></div>
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
            <!--   头部图片       -->
            <div class="row">
                <div class="col-xs-12 navigation-3">
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
            <div class="row">
                <div class="col-xs-9 col-md-offset-1">
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
            <div class="row">
                <div class="col-xs-9 col-md-offset-1">
                    <div class="col-md-1 navigation-5">
                    </div>
                    <div class="col-md-9 navigation-list5">
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
            <!--    轮播图        -->
            <div class="row">
                <div class="col-xs-7  col-md-offset-1">
                    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                        <!-- Indicators -->
                        <ol class="carousel-indicators">
                            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                            <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        </ol>
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox" style="margin-top: 20px;">
                            <div class="item active">
                                <div class="col-md-4" style="padding:0px;width: 268px;">
                                    <a href=""><img src="{{asset('image/img/1.jpg')}}" alt=""></a>
                                </div>
                                 <div class="col-md-4" style="padding:0px;width: 338px;">
                                     <a href=""><img src="{{asset('image/img/2.jpg')}}" alt=""></a>
                                     <a href=""><img src="{{asset('image/img/3.jpg')}}" alt=""></a>
                                </div>
                                <div class="col-md-2" style="padding-left:25px;">
                                    <a href=""><img src="{{asset('image/img/4.jpg')}}" alt=""></a>
                                </div>
                            </div>
                            <div class="item">
                                <div class="col-md-4" style="padding:0px;width: 268px;">
                                    <a href=""></a><img src="{{asset('image/img/5.jpg')}}" alt="">
                                </div>
                                <div class="col-md-4" style="padding:0px;width: 338px;">
                                    <a href=""><img src="{{asset('image/img/6.jpg')}}" alt=""></a>
                                    <a href=""><img src="{{asset('image/img/7.jpg')}}" alt=""></a>
                                </div>
                                <div class="col-md-2" style="padding-left:25px;">
                                    <a href=""><img src="{{asset('image/img/8.jpg')}}" alt=""></a>
                                </div>
                            </div>
                            <div class="item">
                                <div class="col-md-4" style="padding:0px;width: 268px;">
                                    <a href=""><img src="{{asset('image/img/9.jpg')}}" alt=""></a>
                                </div>
                                <div class="col-md-4" style="padding:0px;width: 338px;">
                                    <a href=""><img src="{{asset('image/img/10.jpg')}}" alt=""></a>
                                    <a href=""><img src="{{asset('image/img/11.jpg')}}" alt=""></a>
                                </div>
                                <div class="col-md-2" style="padding-left:25px;">
                                    <a href=""><img src="{{asset('image/img/12.jpg')}}" alt=""></a>
                                </div>
                            </div>
                        </div>
                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
            <!--    漫画列表      -->
            <div class="row">
                <div class="col-xs-7 col-md-offset-1 navigation-6">
                    <span>
                        <a href="">全部</a>
                        <a href="">少年</a>
                        <a href="">少女</a>
                        <a href="">耽美</a>
                    </span>
                    <span style="margin-left: 492px;">
                        <a href="">></a>
                    </span>
                </div>
                <div class="col-xs-7 col-md-offset-1 navigation-list6">
                    <ul>
                        <li>
                            <a href="" class="nav-list6">
                                <img src="{{asset('image/list/1.jpg')}}" alt="">
                            </a>
                            <a href="" class="nav-font6">熊孩子</a>
                            <span>捡回了一只小熊</span>
                        </li>
                        <li><a href=""  class="nav-list6">
                                <img src="{{asset('image/list/2.jpg')}}" alt="">
                                <a href="" class="nav-font6">花样公公</a>
                                <span>一群花一样的公公</span>
                            </a></li>
                        <li><a href=""  class="nav-list6">
                                <img src="{{asset('image/list/3.jpg')}}" alt="">
                                <a href="" class="nav-font6">手机少年</a>
                                <span>小哲和MP手机</span>
                            </a></li>
                        <li><a href=""  class="nav-list6">
                                <img src="{{asset('image/list/4.jpg')}}" alt="">
                                <a href="" class="nav-font6">守护者传说</a>
                                <span>这不只是冒险故事</span>
                            </a></li>
                        <li><a href=""  class="nav-list6">
                                <img src="{{asset('image/list/5.jpg')}}" alt="">
                                <a href="" class="nav-font6">时间停止少女日常</a>
                                <span>没用的超能力</span>
                            </a></li>
                        <li><a href=""  class="nav-list6">
                                <img src="{{asset('image/list/7.jpg')}}" alt="">
                                <a href="" class="nav-font6">仙渊</a>
                                <span>重生回来的我</span>
                            </a></li>
                    </ul>
                </div>
                <div class="col-xs-7 col-md-offset-1 navigation-6-2">
                    <span>
                        <a href="">全部</a>
                        <a href="">少年</a>
                        <a href="">少女</a>
                        <a href="">耽美</a>
                    </span>
                    <span style="margin-left: 492px;">
                        <a href="">></a>
                    </span>
                </div>
                <div class="col-xs-7 col-md-offset-1 navigation-list6">
                    <ul>
                        <li>
                            <a href="" class="nav-list6">
                                <img src="{{asset('image/list/1.jpg')}}" alt="">
                            </a>
                            <a href="" class="nav-font6">熊孩子</a>
                            <span>捡回了一只小熊</span>
                        </li>
                        <li><a href=""  class="nav-list6">
                                <img src="{{asset('image/list/2.jpg')}}" alt="">
                                <a href="" class="nav-font6">花样公公</a>
                                <span>一群花一样的公公</span>
                            </a></li>
                        <li><a href=""  class="nav-list6">
                                <img src="{{asset('image/list/3.jpg')}}" alt="">
                                <a href="" class="nav-font6">手机少年</a>
                                <span>小哲和MP手机</span>
                            </a></li>
                        <li><a href=""  class="nav-list6">
                                <img src="{{asset('image/list/4.jpg')}}" alt="">
                                <a href="" class="nav-font6">守护者传说</a>
                                <span>这不只是冒险故事</span>
                            </a></li>
                        <li><a href=""  class="nav-list6">
                                <img src="{{asset('image/list/5.jpg')}}" alt="">
                                <a href="" class="nav-font6">时间停止少女日常</a>
                                <span>没用的超能力</span>
                            </a></li>
                        <li><a href=""  class="nav-list6">
                                <img src="{{asset('image/list/7.jpg')}}" alt="">
                                <a href="" class="nav-font6">仙渊</a>
                                <span>重生回来的我</span>
                            </a></li>
                    </ul>
                </div>
                <div class="col-xs-7 col-md-offset-1 navigation-6-3">
                    <span><a href="">></a></span>
                </div>
                <div class="col-xs-7 col-md-offset-1 navigation-list6">
                    <ul>
                        <li>
                            <a href="" class="nav-list6">
                                <img src="{{asset('image/list/1.jpg')}}" alt="">
                            </a>
                            <a href="" class="nav-font6">熊孩子</a>
                            <span>捡回了一只小熊</span>
                        </li>
                        <li><a href=""  class="nav-list6">
                                <img src="{{asset('image/list/2.jpg')}}" alt="">
                                <a href="" class="nav-font6">花样公公</a>
                                <span>一群花一样的公公</span>
                            </a></li>
                        <li><a href=""  class="nav-list6">
                                <img src="{{asset('image/list/3.jpg')}}" alt="">
                                <a href="" class="nav-font6">手机少年</a>
                                <span>小哲和MP手机</span>
                            </a></li>
                        <li><a href=""  class="nav-list6">
                                <img src="{{asset('image/list/4.jpg')}}" alt="">
                                <a href="" class="nav-font6">守护者传说</a>
                                <span>这不只是冒险故事</span>
                            </a></li>
                        <li><a href=""  class="nav-list6">
                                <img src="{{asset('image/list/5.jpg')}}" alt="">
                                <a href="" class="nav-font6">时间停止少女日常</a>
                                <span>没用的超能力</span>
                            </a></li>
                        <li><a href=""  class="nav-list6">
                                <img src="{{asset('image/list/7.jpg')}}" alt="">
                                <a href="" class="nav-font6">仙渊</a>
                                <span>重生回来的我</span>
                            </a></li>
                    </ul>
                </div>
            </div>
            <!--    小广告        -->
            <div class="row">
                <div class="col-xs-7 col-md-offset-1 navigation-7"style="padding: 0px;">
                    <ul>
                        <li>
                            <a href=""><img src="{{asset('image/advert/1.jpg')}}"></a>
                        </li>
                        <li>
                            <a href=""><img src="{{asset('image/advert/2.jpg')}}" alt=""></a>
                        </li>
                        <li>
                            <a href=""><img src="{{asset('image/advert/3.jpg')}}" alt=""></a>
                        </li>
                        <li>
                            <a href=""><img src="{{asset('image/advert/4.jpg')}}" alt=""></a>
                        </li>
                    </ul>
                </div>
            </div>
            <!--    少年列表      -->
            <div class="row">
                <div class="col-xs-7 col-md-offset-1 navigation-8">
                    <span>
                        <a href="">全部</a>
                        <a href="">周更</a>
                        <a href="">收藏2000+</a>
                        <a href="">收藏1000+</a>
                        <a href="">收藏500+</a>
                    </span>
                    <span style="font-size: 14px;">
                        <a href="">更多</a>
                    </span>
                    <span style="margin-left: 0px;font-size: 15px;">
                        [新增收藏周榜]
                    </span>
                </div>
                <div class="col-xs-6 col-md-offset-1 navigation-list6">
                    <ul>
                        <li>
                            <a href="" class="nav-list6">
                                <img src="{{asset('image/list/1.jpg')}}" alt="">
                            </a>
                            <a href="" class="nav-font6">熊孩子</a>
                            <span>捡回了一只小熊</span>
                        </li>
                        <li><a href=""  class="nav-list6">
                                <img src="{{asset('image/list/2.jpg')}}" alt="">
                                <a href="" class="nav-font6">花样公公</a>
                                <span>一群花一样的公公</span>
                            </a></li>
                        <li><a href=""  class="nav-list6">
                                <img src="{{asset('image/list/3.jpg')}}" alt="">
                                <a href="" class="nav-font6">手机少年</a>
                                <span>小哲和MP手机</span>
                            </a></li>
                        <li><a href=""  class="nav-list6">
                                <img src="{{asset('image/list/4.jpg')}}" alt="">
                                <a href="" class="nav-font6">守护者传说</a>
                                <span>这不只是冒险故事</span>
                            </a></li>
                        <li><a href=""  class="nav-list6">
                                <img src="{{asset('image/list/5.jpg')}}" alt="">
                                <a href="" class="nav-font6">时间停止少女日常</a>
                                <span>没用的超能力</span>
                            </a></li>
                    </ul>
                </div>
                <div class="col-xs-6 col-md-offset-1 navigation-list6">
                    <ul>
                        <li>
                            <a href="" class="nav-list6">
                                <img src="{{asset('image/list/1.jpg')}}" alt="">
                            </a>
                            <a href="" class="nav-font6">熊孩子</a>
                            <span>捡回了一只小熊</span>
                        </li>
                        <li><a href=""  class="nav-list6">
                                <img src="{{asset('image/list/2.jpg')}}" alt="">
                                <a href="" class="nav-font6">花样公公</a>
                                <span>一群花一样的公公</span>
                            </a></li>
                        <li><a href=""  class="nav-list6">
                                <img src="{{asset('image/list/3.jpg')}}" alt="">
                                <a href="" class="nav-font6">手机少年</a>
                                <span>小哲和MP手机</span>
                            </a></li>
                        <li><a href=""  class="nav-list6">
                                <img src="{{asset('image/list/4.jpg')}}" alt="">
                                <a href="" class="nav-font6">守护者传说</a>
                                <span>这不只是冒险故事</span>
                            </a></li>
                        <li><a href=""  class="nav-list6">
                                <img src="{{asset('image/list/5.jpg')}}" alt="">
                                <a href="" class="nav-font6">时间停止少女日常</a>
                                <span>没用的超能力</span>
                            </a></li>
                    </ul>
                </div>
            </div>
            <!--    少女列表      -->
            <div class="row">
                <div class="col-xs-7 col-md-offset-1 navigation-9">
                    <span>
                        <a href="">全部</a>
                        <a href="">周更</a>
                        <a href="">收藏2000+</a>
                        <a href="">收藏1000+</a>
                        <a href="">收藏500+</a>
                    </span>
                    <span style="font-size: 14px;">
                        <a href="">更多</a>
                    </span>
                    <span style="margin-left: 0px;font-size: 15px;">
                        [新增收藏周榜]
                    </span>
                </div>
                <div class="col-xs-6 col-md-offset-1 navigation-list6">
                    <ul>
                        <li>
                            <a href="" class="nav-list6">
                                <img src="{{asset('image/list/1.jpg')}}" alt="">
                            </a>
                            <a href="" class="nav-font6">熊孩子</a>
                            <span>捡回了一只小熊</span>
                        </li>
                        <li><a href=""  class="nav-list6">
                                <img src="{{asset('image/list/2.jpg')}}" alt="">
                                <a href="" class="nav-font6">花样公公</a>
                                <span>一群花一样的公公</span>
                            </a></li>
                        <li><a href=""  class="nav-list6">
                                <img src="{{asset('image/list/3.jpg')}}" alt="">
                                <a href="" class="nav-font6">手机少年</a>
                                <span>小哲和MP手机</span>
                            </a></li>
                        <li><a href=""  class="nav-list6">
                                <img src="{{asset('image/list/4.jpg')}}" alt="">
                                <a href="" class="nav-font6">守护者传说</a>
                                <span>这不只是冒险故事</span>
                            </a></li>
                        <li><a href=""  class="nav-list6">
                                <img src="{{asset('image/list/5.jpg')}}" alt="">
                                <a href="" class="nav-font6">时间停止少女日常</a>
                                <span>没用的超能力</span>
                            </a></li>
                    </ul>
                </div>
                <div class="col-xs-6 col-md-offset-1 navigation-list6">
                    <ul>
                        <li>
                            <a href="" class="nav-list6">
                                <img src="{{asset('image/list/1.jpg')}}" alt="">
                            </a>
                            <a href="" class="nav-font6">熊孩子</a>
                            <span>捡回了一只小熊</span>
                        </li>
                        <li><a href=""  class="nav-list6">
                                <img src="{{asset('image/list/2.jpg')}}" alt="">
                                <a href="" class="nav-font6">花样公公</a>
                                <span>一群花一样的公公</span>
                            </a></li>
                        <li><a href=""  class="nav-list6">
                                <img src="{{asset('image/list/3.jpg')}}" alt="">
                                <a href="" class="nav-font6">手机少年</a>
                                <span>小哲和MP手机</span>
                            </a></li>
                        <li><a href=""  class="nav-list6">
                                <img src="{{asset('image/list/4.jpg')}}" alt="">
                                <a href="" class="nav-font6">守护者传说</a>
                                <span>这不只是冒险故事</span>
                            </a></li>
                        <li><a href=""  class="nav-list6">
                                <img src="{{asset('image/list/5.jpg')}}" alt="">
                                <a href="" class="nav-font6">时间停止少女日常</a>
                                <span>没用的超能力</span>
                            </a></li>
                    </ul>
                </div>
            </div>
            <!--    小广告       -->
            <div class="row">
                <div class="col-xs-7 col-md-offset-1">
                    <a href=""><img src="{{asset('image/d.jpg')}}" alt=""></a>
                </div>
            </div>
            <!--    耽美列表        -->
            <div class="row">
                <div class="col-xs-7 col-md-offset-1 navigation-11">
                    <span>
                        <a href="">全部</a>
                        <a href="">周更</a>
                        <a href="">收藏2000+</a>
                        <a href="">收藏1000+</a>
                        <a href="">收藏500+</a>
                    </span>
                    <span style="font-size: 14px;">
                        <a href="">更多</a>
                    </span>
                    <span style="margin-left: 0px;font-size: 15px;">
                        [新增收藏周榜]
                    </span>
                </div>
                <div class="col-xs-6 col-md-offset-1 navigation-list6">
                    <ul>
                        <li>
                            <a href="" class="nav-list6">
                                <img src="{{asset('image/list/1.jpg')}}" alt="">
                            </a>
                            <a href="" class="nav-font6">熊孩子</a>
                            <span>捡回了一只小熊</span>
                        </li>
                        <li><a href=""  class="nav-list6">
                                <img src="{{asset('image/list/2.jpg')}}" alt="">
                                <a href="" class="nav-font6">花样公公</a>
                                <span>一群花一样的公公</span>
                            </a></li>
                        <li><a href=""  class="nav-list6">
                                <img src="{{asset('image/list/3.jpg')}}" alt="">
                                <a href="" class="nav-font6">手机少年</a>
                                <span>小哲和MP手机</span>
                            </a></li>
                        <li><a href=""  class="nav-list6">
                                <img src="{{asset('image/list/4.jpg')}}" alt="">
                                <a href="" class="nav-font6">守护者传说</a>
                                <span>这不只是冒险故事</span>
                            </a></li>
                        <li><a href=""  class="nav-list6">
                                <img src="{{asset('image/list/5.jpg')}}" alt="">
                                <a href="" class="nav-font6">时间停止少女日常</a>
                                <span>没用的超能力</span>
                            </a></li>
                    </ul>
                </div>
                <div class="col-xs-6 col-md-offset-1 navigation-list6">
                    <ul>
                        <li>
                            <a href="" class="nav-list6">
                                <img src="{{asset('image/list/1.jpg')}}" alt="">
                            </a>
                            <a href="" class="nav-font6">熊孩子</a>
                            <span>捡回了一只小熊</span>
                        </li>
                        <li><a href=""  class="nav-list6">
                                <img src="{{asset('image/list/2.jpg')}}" alt="">
                                <a href="" class="nav-font6">花样公公</a>
                                <span>一群花一样的公公</span>
                            </a></li>
                        <li><a href=""  class="nav-list6">
                                <img src="{{asset('image/list/3.jpg')}}" alt="">
                                <a href="" class="nav-font6">手机少年</a>
                                <span>小哲和MP手机</span>
                            </a></li>
                        <li><a href=""  class="nav-list6">
                                <img src="{{asset('image/list/4.jpg')}}" alt="">
                                <a href="" class="nav-font6">守护者传说</a>
                                <span>这不只是冒险故事</span>
                            </a></li>
                        <li><a href=""  class="nav-list6">
                                <img src="{{asset('image/list/5.jpg')}}" alt="">
                                <a href="" class="nav-font6">时间停止少女日常</a>
                                <span>没用的超能力</span>
                            </a></li>
                    </ul>
                </div>
            </div>
            <!--    绘本列表     -->
            <div class="row">
                <div class="col-xs-7 col-md-offset-1 navigation-10">
                    <span>
                        <a href="">全部</a>
                        <a href="">周更</a>
                        <a href="">收藏2000+</a>
                        <a href="">收藏1000+</a>
                        <a href="">收藏500+</a>
                    </span>
                    <span style="font-size: 14px;">
                        <a href="">更多</a>
                    </span>
                    <span style="margin-left: 0px;font-size: 15px;">
                        [新增收藏周榜]
                    </span>
                </div>
                <div class="col-xs-6 col-md-offset-1 navigation-list6">
                    <ul>
                        <li>
                            <a href="" class="nav-list6">
                                <img src="{{asset('image/list/1.jpg')}}" alt="">
                            </a>
                            <a href="" class="nav-font6">熊孩子</a>
                            <span>捡回了一只小熊</span>
                        </li>
                        <li><a href=""  class="nav-list6">
                                <img src="{{asset('image/list/2.jpg')}}" alt="">
                                <a href="" class="nav-font6">花样公公</a>
                                <span>一群花一样的公公</span>
                            </a></li>
                        <li><a href=""  class="nav-list6">
                                <img src="{{asset('image/list/3.jpg')}}" alt="">
                                <a href="" class="nav-font6">手机少年</a>
                                <span>小哲和MP手机</span>
                            </a></li>
                        <li><a href=""  class="nav-list6">
                                <img src="{{asset('image/list/4.jpg')}}" alt="">
                                <a href="" class="nav-font6">守护者传说</a>
                                <span>这不只是冒险故事</span>
                            </a></li>
                        <li><a href=""  class="nav-list6">
                                <img src="{{asset('image/list/5.jpg')}}" alt="">
                                <a href="" class="nav-font6">时间停止少女日常</a>
                                <span>没用的超能力</span>
                            </a></li>
                    </ul>
                </div>
                <div class="col-xs-6 col-md-offset-1 navigation-list6">
                    <ul>
                        <li>
                            <a href="" class="nav-list6">
                                <img src="{{asset('image/list/1.jpg')}}" alt="">
                            </a>
                            <a href="" class="nav-font6">熊孩子</a>
                            <span>捡回了一只小熊</span>
                        </li>
                        <li><a href=""  class="nav-list6">
                                <img src="{{asset('image/list/2.jpg')}}" alt="">
                                <a href="" class="nav-font6">花样公公</a>
                                <span>一群花一样的公公</span>
                            </a></li>
                        <li><a href=""  class="nav-list6">
                                <img src="{{asset('image/list/3.jpg')}}" alt="">
                                <a href="" class="nav-font6">手机少年</a>
                                <span>小哲和MP手机</span>
                            </a></li>
                        <li><a href=""  class="nav-list6">
                                <img src="{{asset('image/list/4.jpg')}}" alt="">
                                <a href="" class="nav-font6">守护者传说</a>
                                <span>这不只是冒险故事</span>
                            </a></li>
                        <li><a href=""  class="nav-list6">
                                <img src="{{asset('image/list/5.jpg')}}" alt="">
                                <a href="" class="nav-font6">时间停止少女日常</a>
                                <span>没用的超能力</span>
                            </a></li>
                    </ul>
                </div>
            </div>
            <!--    小广告       -->
            <div class="row">
                <div class="col-xs-7 col-md-offset-1">
                    <a href=""><img src="{{asset('image/b.jpg')}}" alt=""></a>
                </div>
            </div>
            <!--    完结漫画     -->
            <div class="row">
                <div class="col-xs-7 col-md-offset-1 navigation-12">
                    <span style="font-size: 14px;">
                        <a href="">更多</a>
                    </span>
                    <span style="margin-left: 25px;font-size: 15px;">
                        [最新完结作品]
                    </span>
                </div>
                <div class="col-xs-6 col-md-offset-1 navigation-list6">
                    <ul>
                        <li>
                            <a href="" class="nav-list6">
                                <img src="{{asset('image/list/1.jpg')}}" alt="">
                            </a>
                            <a href="" class="nav-font6">熊孩子</a>
                            <span>捡回了一只小熊</span>
                        </li>
                        <li><a href=""  class="nav-list6">
                                <img src="{{asset('image/list/2.jpg')}}" alt="">
                                <a href="" class="nav-font6">花样公公</a>
                                <span>一群花一样的公公</span>
                            </a></li>
                        <li><a href=""  class="nav-list6">
                                <img src="{{asset('image/list/3.jpg')}}" alt="">
                                <a href="" class="nav-font6">手机少年</a>
                                <span>小哲和MP手机</span>
                            </a></li>
                        <li><a href=""  class="nav-list6">
                                <img src="{{asset('image/list/4.jpg')}}" alt="">
                                <a href="" class="nav-font6">守护者传说</a>
                                <span>这不只是冒险故事</span>
                            </a></li>
                        <li><a href=""  class="nav-list6">
                                <img src="{{asset('image/list/5.jpg')}}" alt="">
                                <a href="" class="nav-font6">时间停止少女日常</a>
                                <span>没用的超能力</span>
                            </a></li>
                    </ul>
                </div>
            </div>
            <!--    出版漫画     -->
            <div class="row">
                <div class="col-xs-7 col-md-offset-1 navigation-13">
                    <span style="font-size: 14px;">
                        <a href="">更多</a>
                    </span>
                    <span style="margin-left: 25px;font-size: 15px;">
                        [出版专题]
                    </span>
                </div>
                <div class="col-xs-6 col-md-offset-1 navigation-list6">
                    <ul>
                        <li>
                            <a href="" class="nav-list6">
                                <img src="{{asset('image/list/1.jpg')}}" alt="">
                            </a>
                            <a href="" class="nav-font6">熊孩子</a>
                            <span>捡回了一只小熊</span>
                        </li>
                        <li><a href=""  class="nav-list6">
                                <img src="{{asset('image/list/2.jpg')}}" alt="">
                                <a href="" class="nav-font6">花样公公</a>
                                <span>一群花一样的公公</span>
                            </a></li>
                        <li><a href=""  class="nav-list6">
                                <img src="{{asset('image/list/3.jpg')}}" alt="">
                                <a href="" class="nav-font6">手机少年</a>
                                <span>小哲和MP手机</span>
                            </a></li>
                        <li><a href=""  class="nav-list6">
                                <img src="{{asset('image/list/4.jpg')}}" alt="">
                                <a href="" class="nav-font6">守护者传说</a>
                                <span>这不只是冒险故事</span>
                            </a></li>
                        <li><a href=""  class="nav-list6">
                                <img src="{{asset('image/list/5.jpg')}}" alt="">
                                <a href="" class="nav-font6">时间停止少女日常</a>
                                <span>没用的超能力</span>
                            </a></li>
                    </ul>
                </div>
            </div>
            <!--    杂烩         -->
            <div class="row">
                <div class="col-xs-7 col-md-offset-1 navigation-14">
                </div>
                <div class="col-xs-7 col-md-offset-1 navigation-14-list">
                    <ul>
                        <li>
                            <a href=""><img src="{{asset('image/1.jpg')}}" alt=""></a>
                        </li>
                        <li>
                            <a href=""><img src="{{asset('image/2.jpg')}}" alt=""></a>
                        </li>
                        <li>
                            <a href=""><img src="{{asset('image/3.jpg')}}" alt=""></a>
                        </li>
                        <li>
                            <a href=""><img src="{{asset('image/4.png')}}" alt=""></a>
                        </li>
                        <li>
                            <a href=""><img src="{{asset('image/5.jpg')}}" alt=""></a>
                        </li>
                    </ul>
                </div>
            </div>
            <!--   小广告        -->
            <div class="row">
                <div class="col-xs-7 col-md-offset-1" style="margin-top: 20px;">
                    <a href=""><img src="{{asset('image/a.jpg')}}" alt=""></a>
                </div>
            </div>
            <!--   排行榜        -->
            
        </div>
                                                                                                                                                              