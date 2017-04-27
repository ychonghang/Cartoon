<<<<<<< HEAD
@extends('index')
=======
@extends('home.index')
>>>>>>> 2a495d62d85b26c7e884ed2b53912bb30be3cf57
@section('title','漫迹')
@section('style')
    <link rel="stylesheet" href="{{asset('css/home/book.css')}}">
@endsection
@section('content')
    <div class="row">
        <div class="col-md-9 col-md-offset-1 ">
            <div class="col-md-10 rank1" style="padding:0px;">
                <a href=""><img src="{{asset('image/rank/1.jpg')}}"></a>
            </div>
            <div class="col-md-1 rank1-1" style="margin-left: 156px;width: 30px;"></div>
        </div>
        <div class="col-md-9 col-md-offset-1">
            <div class="col-md-9 navtop" style="padding: 0px;">
                <a href="">首页</a>
                &nbsp;>&nbsp;
                <a href="">为何如此冷酷</a>
            </div>
        </div>
        <div class="col-md-9 col-md-offset-1">
            <div class="col-md-12 navtwo">
                <div class="col-md-9">
                    <div class="col-md-2 navfont" style="padding-right: 0px;">
                        <h2>[周更]</h2>
                    </div>
                    <div class="col-md-3 navfont2" style="padding-left: 0px;">
                        <p>为何如此冷酷</p>
                    </div>
                    <div class="col-md-2" style="padding: 0px;margin-top: 18px;">
                        <a href=""><img src="{{asset('image/details/ico_xingzhi_3.gif')}}" alt=""></a>
                        <a href=""><img src="{{asset('image/details/ico_xingzhi_4.gif')}}" alt=""></a>
                    </div>
                    <div class="col-md-12" style="padding: 0px;">
                        <div class="col-md-4 navthree" style="padding-right: 0px;">
                            <img src="{{asset('image/details/N.big.jpg')}}" alt="">
                            <div class="col-md-5 navlg" style="margin-top:25px; margin-left: 15px;">
                                <span style="padding-left: 15px;"><a href="">打赏月票</a></span>
                            </div>
                            <div class="col-md-5 navlg2" style="margin-top:25px; ">
                                <span style="padding-left: 15px;"><a href="">分享</a></span>
                            </div>
                        </div>
                        <div class="col-md-8 navfour" style="padding-left: 0px;">
                            <span>类别:</span>
                            <span class="fff" style="font-size: 13px;"> 少年 /搞笑 /魔幻 /生活</span>
                            <span>类型:</span>
                            <span class="fff" style="font-size: 13px;">故事漫画</span>
                            <span>状态:</span>
                            <span class="fff" style="font-size: 13px;">连载中</span>
                            <span>总点击量:</span>
                            <span style="font-size: 13px;color: #FF444F;">338万</span>
                            <p style="margin: 0px;">
                                <span>总月票:</span>
                                <span style="color: #FF444F;">3419</span>
                                <span>阅读顺序：从左至右→</span>
                                <span><a href="" style="font-size: 12px;color: #000;">更多+</a></span>
                            </p>
                            <span>```````````````````````````````````````````````````````````````````</span>
                            <p style="margin: 0px;">
                                <span style="font-size: 13px;"><a href="">漫画标签</a></span>
                                <span style="font-size: 13px;"><a href="">角色标签</a></span>
                                <span style="padding-left:330px;font-size: 11px; "><a href="">加标签</a></span>
                            </p>
                            <span style="font-size: 11px;">热血&nbsp;开挂&nbsp;装逼&nbsp;日天&nbsp;校园&nbsp;杀必死&nbsp;悬疑&nbsp;推理&nbsp;画质&nbsp;超神</span>
                            <span>```````````````````````````````````````````````````````````````````</span>
                            <span style="font-size: 11px;color: #cccccc;">人的一生只是为了装逼么？（勉强能达到两周3更，本漫画字少镜头多，各位客观看慢点……）</span>
                        </div>
                        <div class="col-md-3">
                            <div class="lok">
                                <div class="col-md-6 look">
                                </div>
                                <a href="">开始阅读</a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="lok2">
                                <a href="">加入收藏</a>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="lok3">
                                <a href="">投月票</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-1" style="padding-left: 25px;padding-top: 15px">
                    <a href=""><img src="{{asset('image/details/37749.jpg')}}" width="90px"></a>
                </div>
                <div class="col-md-2" style="margin-top: 15px;">
                    <div>
                            <span style="padding-left: 15px;"><a href="">笑而不语</a></span>
                    </div>
                    <div style="font-size: 12px;margin-left: 15px;">
                        脚本:
                    </div>
                    <div style="font-size: 12px;margin-left: 15px;">
                      作品：<a href="">4</a>部
                    </div>
                    <div class="autt">
                        书本作者
                    </div>
                </div>
                <div class="col-md-3" style="font-size: 12px;color: #8c8c8c;margin-top: 15px;padding-left:55px; ">
                    我敢打赌,没人能猜到最后的结局！
                </div>
                <div class="col-md-3" style="margin-top: 85px;">
                    <!-- 轮播  -->
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
                                    <a href=""><img src="{{asset('image/details/1490755982_t0rC6PImSsXc.jpg')}}" alt=""></a>
                                </div>
                            </div>
                            <div class="item">
                                <div class="col-md-4" style="padding:0px;width: 268px;">
                                    <a href=""></a><img src="{{asset('image/details/1491014689_y4y5Mh2YsyyP.jpg')}}" alt="">
                                </div>
                            </div>
                            <div class="item">
                                <div class="col-md-4" style="padding:0px;width: 268px;">
                                    <a href=""><img src="{{asset('image/details/1492050343_s39KK0gJmplG.jpg')}}" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end  -->
                </div>
            </div>
        </div>
        <div class="col-md-3 col-md-offset-1">
            <div class="col-md-9 gift-left">
            </div>
            <div class="col-md-9 gift-left2">
            </div>
        </div>
        <div class="col-md-6 col-md-offset-1" style="margin: 0px;padding: 0px;">
            <h3 style="margin: 0px;">章节列表</h3>
            <div class="col-md-11 auto" style="border: 5px solid #cccccc;padding-top: 10px;">
                <span><a href="">01 第一章</a></span>
                <span><a href="">02 第二章</a></span>
                <span><a href="">03 第三章</a></span>
                <span><a href="">04 第四章</a></span>
                <span><a href="">05 第五章</a></span>
                <div style="margin-top: 20px;">
                    <span><a href="">加入书架</a></span>
                </div>

            </div>
        </div>
    </div>
@endsection