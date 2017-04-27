<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title','阅读中心')</title>
    <link rel="stylesheet" href="{{url('/css/home/showpage/readpage.css')}}">
    @yield('style')
</head>
<body>
    <div id="mainarea">
        <div id="crvip_top" class="top-fixed">
            <dl class="crvip_tb clear">
                <dd class="lf">
                    <a class="white" href="/">首页</a>
                    <span>|</span>
                    <a class="white" href="/home/book/{{$chapter->opus_id}}">返回作品</a>
                </dd>
                <dd class="rt">
                    @if(!empty($chapterImg))
                            @if(!empty($pre))
                                <a href="/home/showpage/showsection/{{$pre}}"></a>
                            @endif
                            @if(!empty($next))
                                <a href="/home/showpage/showsection/{{$next}}" class="a-next"></a>
                            @endif
                    @endif


                </dd>
            </dl>
        </div>

        <div id="middle">
                @yield('content')
        </div>

        <div id="crvip_bot" class="bottom-fixed">
            <dl class="crvip_tb">
                <dd class="lf pd_lf_15">
                    <a class="white" href="/">首页</a>
                    <span>|</span>
                    <a class="white" href="/home/book/{{$chapter->opus_id}}">返回作品</a>
                </dd>
                <dd class="rt">
                    @if(!empty($chapterImg))
                        @if(!empty($pre))
                            <a href="/home/showpage/showsection/{{$pre}}"></a>
                        @endif
                        @if(!empty($next))
                            <a href="/home/showpage/showsection/{{$next}}" class="a-next"></a>
                        @endif
                    @endif
                </dd>
            </dl>
        </div>
    </div>

</body>
</html>