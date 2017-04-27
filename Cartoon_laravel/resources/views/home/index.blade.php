@extends('layouts.index')
@section('title','漫迹')
@section('content')
    <!--   身体     -->
    <div class="col-xs-12">
        <!--   左身体     -->
        <div class="col-xs-8" style="padding-left: 30px;">
            <!--    轮播图        -->
            <div class="row">
                <div class="row" style="margin: 0 auto;">
                    <div class="col-xs-11 col-md-offset-1" >
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
                <div class="col-xs-11 col-md-offset-1 navigation-6">
                    <span>
                        <a href="">全部</a>
                        <a href="">少年</a>
                        <a href="">少女</a>
                        <a href="">耽美</a>
                    </span>
                    <span style="margin-left: 487px;">
                        <a href="">></a>
                    </span>

                </div>
                <div class="col-xs-11 col-md-offset-1 navigation-list6">
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
                <div class="col-xs-11 col-md-offset-1 navigation-6-2">
                    <span>
                        <a href="">全部</a>
                        <a href="">少年</a>
                        <a href="">少女</a>
                        <a href="">耽美</a>
                    </span>
                    <span style="margin-left: 487px;">
                        <a href="">></a>
                    </span>
                </div>
                <div class="col-xs-11 col-md-offset-1 navigation-list6">
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
                <div class="col-xs-11 col-md-offset-1 navigation-6-3">
                    <span><a href="">></a></span>
                </div>
                <div class="col-xs-11 col-md-offset-1 navigation-list6">
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
                <!--    小广告        -->
                <div class="col-xs-11 col-md-offset-1 navigation-7"style="padding: 0px;">
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
                <!--    少年列表      -->
                <div class="col-xs-11 col-md-offset-1 navigation-8">
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
                <div class="col-md-10">
                    <div class="col-xs-11 col-md-offset-1 navigation-list6" style="padding-left: 0px;">
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
                    <div class="col-xs-11 col-md-offset-1 navigation-list6" style="padding-left: 0px;">
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
                <div class="col-md-2">
                    <ul>
                        <li>这</li>
                        <li>里</li>
                        <li>是</li>
                        <li>排</li>
                        <li>行</li>
                        <li>榜</li>
                        <li>！</li>
                        <li>！</li>
                        <li>！</li>
                        <li>！</li>
                        <li>！</li>
                        <li>！</li>
                        <li>！</li>
                        <li></li>
                        <li></li>
                    </ul>
                </div>
                <!--    少女列表      -->
                <div class="col-xs-11 col-md-offset-1 navigation-9">
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
                <div class="col-md-10">
                    <div class="col-xs-11 col-md-offset-1 navigation-list6" style="padding-left: 0px;">
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
                    <div class="col-xs-11 col-md-offset-1 navigation-list6" style="padding-left: 0px;">
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
                <div class="col-md-2">
                    <ul>
                        <li>这</li>
                        <li>里</li>
                        <li>是</li>
                        <li>排</li>
                        <li>行</li>
                        <li>榜</li>
                        <li>！</li>
                        <li>！</li>
                        <li>！</li>
                        <li>！</li>
                        <li>！</li>
                        <li>！</li>
                        <li>！</li>
                        <li></li>
                        <li></li>
                    </ul>
                </div>
                <!--    小广告       -->
                <div class="col-xs-11 col-md-offset-1">
                    <a href=""><img src="{{asset('image/d.jpg')}}" style="width: 910px;"></a>
                </div>
                <!--    耽美列表     -->
                <div class="col-xs-11 col-md-offset-1 navigation-11">
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
                <div class="col-md-10">
                    <div class="col-xs-11 col-md-offset-1 navigation-list6" style="padding-left: 0px;">
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
                    <div class="col-xs-11 col-md-offset-1 navigation-list6" style="padding-left: 0px;">
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
                <div class="col-md-2">
                    <ul>
                        <li>这</li>
                        <li>里</li>
                        <li>是</li>
                        <li>排</li>
                        <li>行</li>
                        <li>榜</li>
                        <li>！</li>
                        <li>！</li>
                        <li>！</li>
                        <li>！</li>
                        <li>！</li>
                        <li>！</li>
                        <li>！</li>
                        <li></li>
                        <li></li>
                    </ul>
                </div>
                <!--    绘本列表     -->
                <div class="col-xs-11 col-md-offset-1 navigation-10">
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
                <div class="col-md-10">
                    <div class="col-xs-11 col-md-offset-1 navigation-list6" style="padding-left: 0px;">
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
                    <div class="col-xs-11 col-md-offset-1 navigation-list6" style="padding-left: 0px;">
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
                <div class="col-md-2">
                    <ul>
                        <li>这</li>
                        <li>里</li>
                        <li>是</li>
                        <li>排</li>
                        <li>行</li>
                        <li>榜</li>
                        <li>！</li>
                        <li>！</li>
                        <li>！</li>
                        <li>！</li>
                        <li>！</li>
                        <li>！</li>
                        <li>！</li>
                        <li></li>
                        <li></li>
                    </ul>
                </div>
                <!--    小广告       -->
                <div class="col-xs-11 col-md-offset-1">
                    <a href=""><img src="{{asset('image/b.jpg')}}" style="width: 910px;"></a>
                </div>
                <!--    完结漫画     -->
                <div class="col-xs-11 col-md-offset-1 navigation-12">
                    <span style="font-size: 14px;">
                        <a href="">更多</a>
                    </span>
                    <span style="margin-left: 25px;font-size: 15px;">
                        [最新完结作品]
                    </span>
                </div>
                <div class="col-xs-9 col-md-offset-1 navigation-list6">
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
                <div class="col-md-2">
                    <ul>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                </div>
                <!--    出版漫画     -->
                <div class="col-xs-11 col-md-offset-1 navigation-13">
                    <span style="font-size: 14px;">
                        <a href="">更多</a>
                    </span>
                    <span style="margin-left: 25px;font-size: 15px;">
                        [出版专题]
                    </span>
                </div>
                <div class="col-xs-9 col-md-offset-1 navigation-list6">
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
                <div class="col-md-2">
                    <ul>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                </div>
                <!--    杂烩         -->
                <div class="col-xs-11 col-md-offset-1 navigation-14">
                </div>
                <div class="col-xs-11 col-md-offset-1 navigation-14-list">
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
        </div>
        <!--   右身体         -->
        <div class="col-xs-3">
            <!--    右边        -->
            <div class="col-md-12 col-md-offset-3" style="margin-left: 0px;padding: 0px;margin-top: 20px;" >
                <div class="col-md-8 ">
                    <img src="{{asset('image/123.gif')}}" alt="" style="padding-bottom:10px;">
                    <img src="{{asset('image/We7.jpg')}}" alt="">
                </div>
                <div class="col-md-8 right1"></div>
                <div class="col-md-9 right2" style="padding-left: 0px;">
                    <span style="padding-right: 15px;padding-left: 5px;"><a href="">月票折现</a></span>
                    <span style="padding-right: 15px"><a href="">月票排行榜</a></span>
                    <span><a href="">梦想激励</a></span>
                </div>
                <div class="col-md-12" style="margin-top: 10px;">
                    <img src="{{asset('image/14913.jpg')}}" alt="">
                </div>
                <div class="col-md-12 right4" style="padding-left: 75px;">
                    榜上有名
                </div>
                <div class="col-md-12 right5" style="width: 220px;margin-left: 15px;">
                    <span>订阅漫画</span>
                    <span>VIP漫画</span>
                    <ul>
                        <li>1111</li>
                        <li>2</li>
                        <li>3</li>
                        <li>4</li>
                        <li>5</li>
                        <li>6</li>
                        <li>7</li>
                        <li>8</li>
                        <li>9</li>
                        <li>10</li>
                    </ul>
                </div>
                <div class="col-md-12" style="margin-top: 10px;">
                    <a href=""><img src="{{asset('image/1482394646_WztVjJl9W5J1.jpg')}}" alt=""></a>
                </div>
                <div class="col-md-12 right6"style="padding-left: 75px;">
                    签约作品
                </div>
                <div class="col-md-12 right7"style="width: 220px;margin-left: 15px;">
                    <ul>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                </div>
                <div class="col-md-12" style="margin-top: 10px;">
                    <img src="{{asset('image/14913.jpg')}}" alt="">
                </div>
                <div class="col-md-12 right4" style="padding-left: 75px;">
                    榜上有名
                </div>
                <div class="col-md-12 right5" style="width: 220px;margin-left: 15px;">
                    <span>订阅漫画</span>
                    <span>VIP漫画</span>
                    <ul>
                        <li>1111</li>
                        <li>2</li>
                        <li>3</li>
                        <li>4</li>
                        <li>5</li>
                        <li>6</li>
                        <li>7</li>
                        <li>8</li>
                        <li>9</li>
                        <li>10</li>
                    </ul>
                </div>
                <div class="col-md-12" style="margin-top: 10px;">
                    <a href=""><img src="{{asset('image/1482394646_WztVjJl9W5J1.jpg')}}" alt=""></a>
                </div>
                <div class="col-md-12 right6"style="padding-left: 75px;">
                    签约作品
                </div>
                <div class="col-md-12 right7"style="width: 220px;margin-left: 15px;">
                    <ul>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                </div>
                <div class="col-md-12" style="margin-top: 10px;">
                    <img src="{{asset('image/14913.jpg')}}" alt="">
                </div>
                <div class="col-md-12 right4" style="padding-left: 75px;">
                    榜上有名
                </div>
                <div class="col-md-12 right5" style="width: 220px;margin-left: 15px;">
                    <span>订阅漫画</span>
                    <span>VIP漫画</span>
                    <ul>
                        <li>1111</li>
                        <li>2</li>
                        <li>3</li>
                        <li>4</li>
                        <li>5</li>
                        <li>6</li>
                        <li>7</li>
                        <li>8</li>
                        <li>9</li>
                        <li>10</li>
                    </ul>
                </div>
                <div class="col-md-12" style="margin-top: 10px;">
                    <a href=""><img src="{{asset('image/1482394646_WztVjJl9W5J1.jpg')}}" alt=""></a>
                </div>
                <div class="col-md-12 right6"style="padding-left: 75px;">
                    签约作品
                </div>
                <div class="col-md-12 right7"style="width: 220px;margin-left: 15px;">
                    <ul>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                        <li></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--   小广告        -->
    <div class="row">
        <div class="col-xs-7 col-md-offset-1" style="margin-top: 20px;">
            <a href=""><img src="{{asset('image/a.jpg')}}" alt=""></a>
        </div>
    </div>
    <!--   排行榜        -->
    <div class="row">
        <div class="col-md-12">
            <div class="col-xs-2 col-md-offset-1 " style="padding: 0px;">
                <div><a href=""><img src="{{asset('image/p1.bmp')}}" style="margin-left: 20px"></a></div>
                <div class="navigation-15">
                    <ul>
                        <li>1</li>
                        <li>2</li>
                        <li>3</li>
                        <li>4</li>
                        <li>5</li>
                        <li>6</li>
                        <li>7</li>
                        <li>8</li>
                        <li>9</li>
                        <li>10</li>
                        <li>11</li>
                        <li>12</li>
                        <li>13</li>
                        <li>14</li>
                        <li>15</li>
                    </ul>
                </div>

            </div>
            <div class="col-xs-2 col-md-offset-1" style="padding: 0px;margin: 0px;">
                <div><a href=""><img src="{{asset('image/p2.bmp')}}" style="margin-left: 20px"></a></div>
                <div class="navigation-16">
                    <ul>
                        <li>1</li>
                        <li>2</li>
                        <li>3</li>
                        <li>4</li>
                        <li>5</li>
                        <li>6</li>
                        <li>7</li>
                        <li>8</li>
                        <li>9</li>
                        <li>10</li>
                        <li>11</li>
                        <li>12</li>
                        <li>13</li>
                        <li>14</li>
                        <li>15</li>
                    </ul>
                </div>
            </div>
            <div class="col-xs-2 col-md-offset-1" style="padding: 0px;margin: 0px;">
                <div><a href=""><img src="{{asset('image/p3.bmp')}}" style="margin-left: 20px"></a></div>
                <div class="navigation-17">
                    <ul>
                        <li>1</li>
                        <li>2</li>
                        <li>3</li>
                        <li>4</li>
                        <li>5</li>
                        <li>6</li>
                        <li>7</li>
                        <li>8</li>
                        <li>9</li>
                        <li>10</li>
                        <li>11</li>
                        <li>12</li>
                        <li>13</li>
                        <li>14</li>
                        <li>15</li>
                    </ul>
                </div>
            </div>
            <div class="col-xs-2 col-md-offset-1" style="padding: 0px;margin: 0px;">
                <div><a href=""><img src="{{asset('image/p4.bmp')}}" style="margin-left: 20px;"></a></div>
                <div class="navigation-18">
                    <ul>
                        <li>1</li>
                        <li>2</li>
                        <li>3</li>
                        <li>4</li>
                        <li>5</li>
                        <li>6</li>
                        <li>7</li>
                        <li>8</li>
                        <li>9</li>
                        <li>10</li>
                        <li>11</li>
                        <li>12</li>
                        <li>13</li>
                        <li>14</li>
                        <li>15</li>
                    </ul>
                </div>
            </div>
            <div class="col-xs-2 col-md-offset-1" style="padding: 0px;margin: 0px;">
                <div><a href=""><img src="{{asset('image/p5.bmp')}}" style="margin-left: 20px"></a></div>
                <div class="navigation-19">
                    <ul>
                        <li>1</li>
                        <li>2</li>
                        <li>3</li>
                        <li>4</li>
                        <li>5</li>
                        <li>6</li>
                        <li>7</li>
                        <li>8</li>
                        <li>9</li>
                        <li>10</li>
                        <li>11</li>
                        <li>12</li>
                        <li>13</li>
                        <li>14</li>
                        <li>15</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection