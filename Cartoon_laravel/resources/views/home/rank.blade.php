@extends('index')
@section('title','漫迹')
@section('style')
    <link rel="stylesheet" href="{{asset('css/home/rank.css')}}">
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
            <div class="col-md-2" style="padding: 0px;">
                <div class="col-md-2 rank2-left" style="width: 162px;">
                    <p>总榜单</p>
                    <p><a href="">新签约榜</a></p>
                    <p><a href="">圣殿榜</a></p>
                    <p><a href="">订阅上升榜</a></p>
                    <p><a href="">少年上升榜</a></p>
                    <p><a href="">少年新作榜</a></p>
                    <p><a href="">少女上升榜</a></p>
                    <p><a href="">少女新作榜</a></p>
                    <p><a href="">耽美上升榜</a></p>
                    <p><a href="">耽美新作榜</a></p>
                    <p><a href="">绘本上升榜</a></p>
                </div>
                <div class="col-md-2 rank3-left" style="width: 162px;">
                    <p>分类榜单</p>
                    <p><a href="">搞笑榜</a></p>
                    <p><a href="">恐怖榜</a></p>
                    <p><a href="">魔幻榜</a></p>
                    <p><a href="">科幻榜</a></p>
                    <p><a href="">恋爱榜</a></p>
                    <p><a href="">动作榜</a></p>
                    <p><a href="">生活榜</a></p>
                    <p><a href="">同人榜</a></p>
                </div>
            </div>
            <div class="col-md-10" style="padding: 0px;">
                <div class="col-md-4 rank1-right" style="padding: 2px 2px 2px 2px;">
                    <div class="col-md-4 rank-right">
                        <p>新签约榜</p>
                    </div>
                    <div class="col-md-1" style="padding-left: 0px;">
                        <span>
                            <p>1</p>
                            <p>2</p>
                            <p>3</p>
                            <p>4</p>
                            <p>5</p>
                            <p>6</p>
                            <p>7</p>
                            <p>8</p>
                            <p>9</p>
                            <p>10</p>
                            <p>11</p>
                            <p>12</p>
                            <p>13</p>
                            <p>14</p>
                            <p>15</p>
                        </span>
                    </div>
                    <div class="col-md-8">
                        <span>
                        <p>
                        <a href="">镇魂街</a>
                    </p>
                        <p>
                            <a href="">为何如此冷酷</a>
                        </p>
                        <p>
                            <a href="">遗失的冥河</a>
                        </p>
                        <p>
                            <a href="">请神误用</a>
                        </p>
                        <p><a href="">七度轮回</a>
                        </p>
                        <p>
                            <a href="">迷失在世界尽头</a>
                        </p>
                        <p>
                            <a href="">我死的样子不太优雅</a>
                         </p>
                        <p>
                            <a href="">讨厌你喜欢你</a>
                        </p>
                        <p>
                            <a href="">邪君宠-貂蝉</a>
                        </p>
                        <p>
                            <a href="">正负联盟</a>
                        </p>
                        <p>
                            <a href="">雪国</a>
                        </p>
                        <p>
                            <a href="">妙手仙丹</a>
                        </p>
                        <p>
                            <a href="">觉醒纪元</a>
                        </p>
                        <p>
                            <a href="">妖神记</a>
                        </p>
                        <p>
                            <a href="">驭灵师</a>
                        </p>
                    </span>
                    </div>
                    <div class="col-md-3">
                        <span>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                    </span>
                    </div>

                </div>
                <div class="col-md-4 rank1-right" style="padding: 2px 2px 2px 2px;">
                    <div class="col-md-4 rank-right2">
                        <p>圣殿榜</p>
                    </div>
                    <div class="col-md-1" style="padding-left: 0px;">
                        <span>
                            <p>1</p>
                            <p>2</p>
                            <p>3</p>
                            <p>4</p>
                            <p>5</p>
                            <p>6</p>
                            <p>7</p>
                            <p>8</p>
                            <p>9</p>
                            <p>10</p>
                            <p>11</p>
                            <p>12</p>
                            <p>13</p>
                            <p>14</p>
                            <p>15</p>
                        </span>
                    </div>
                    <div class="col-md-8">
                        <span>
                        <p>
                        <a href="">镇魂街</a>
                    </p>
                        <p>
                            <a href="">为何如此冷酷</a>
                        </p>
                        <p>
                            <a href="">遗失的冥河</a>
                        </p>
                        <p>
                            <a href="">请神误用</a>
                        </p>
                        <p><a href="">七度轮回</a>
                        </p>
                        <p>
                            <a href="">迷失在世界尽头</a>
                        </p>
                        <p>
                            <a href="">我死的样子不太优雅</a>
                         </p>
                        <p>
                            <a href="">讨厌你喜欢你</a>
                        </p>
                        <p>
                            <a href="">邪君宠-貂蝉</a>
                        </p>
                        <p>
                            <a href="">正负联盟</a>
                        </p>
                        <p>
                            <a href="">雪国</a>
                        </p>
                        <p>
                            <a href="">妙手仙丹</a>
                        </p>
                        <p>
                            <a href="">觉醒纪元</a>
                        </p>
                        <p>
                            <a href="">妖神记</a>
                        </p>
                        <p>
                            <a href="">驭灵师</a>
                        </p>
                    </span>
                    </div>
                    <div class="col-md-3">
                        <span>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                    </span>
                    </div>

                </div>
                <div class="col-md-4 rank1-right" style="padding: 2px 2px 2px 2px;">
                    <div class="col-md-4 rank-right3">
                        <p>订阅上升榜</p>
                    </div>
                    <div class="col-md-1" style="padding-left: 0px;">
                        <span>
                            <p>1</p>
                            <p>2</p>
                            <p>3</p>
                            <p>4</p>
                            <p>5</p>
                            <p>6</p>
                            <p>7</p>
                            <p>8</p>
                            <p>9</p>
                            <p>10</p>
                            <p>11</p>
                            <p>12</p>
                            <p>13</p>
                            <p>14</p>
                            <p>15</p>
                        </span>
                    </div>
                    <div class="col-md-8">
                        <span>
                        <p>
                        <a href="">镇魂街</a>
                    </p>
                        <p>
                            <a href="">为何如此冷酷</a>
                        </p>
                        <p>
                            <a href="">遗失的冥河</a>
                        </p>
                        <p>
                            <a href="">请神误用</a>
                        </p>
                        <p><a href="">七度轮回</a>
                        </p>
                        <p>
                            <a href="">迷失在世界尽头</a>
                        </p>
                        <p>
                            <a href="">我死的样子不太优雅</a>
                         </p>
                        <p>
                            <a href="">讨厌你喜欢你</a>
                        </p>
                        <p>
                            <a href="">邪君宠-貂蝉</a>
                        </p>
                        <p>
                            <a href="">正负联盟</a>
                        </p>
                        <p>
                            <a href="">雪国</a>
                        </p>
                        <p>
                            <a href="">妙手仙丹</a>
                        </p>
                        <p>
                            <a href="">觉醒纪元</a>
                        </p>
                        <p>
                            <a href="">妖神记</a>
                        </p>
                        <p>
                            <a href="">驭灵师</a>
                        </p>
                    </span>
                    </div>
                    <div class="col-md-3">
                        <span>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                    </span>
                    </div>
                </div>
                <div class="col-md-4 rank1-right" style="padding: 2px 2px 2px 2px;">
                    <div class="col-md-4 rank-right4">
                        <p>少年上升榜</p>
                    </div>
                    <div class="col-md-1" style="padding-left: 0px;">
                        <span>
                            <p>1</p>
                            <p>2</p>
                            <p>3</p>
                            <p>4</p>
                            <p>5</p>
                            <p>6</p>
                            <p>7</p>
                            <p>8</p>
                            <p>9</p>
                            <p>10</p>
                            <p>11</p>
                            <p>12</p>
                            <p>13</p>
                            <p>14</p>
                            <p>15</p>
                        </span>
                    </div>
                    <div class="col-md-8">
                        <span>
                        <p>
                        <a href="">镇魂街</a>
                    </p>
                        <p>
                            <a href="">为何如此冷酷</a>
                        </p>
                        <p>
                            <a href="">遗失的冥河</a>
                        </p>
                        <p>
                            <a href="">请神误用</a>
                        </p>
                        <p><a href="">七度轮回</a>
                        </p>
                        <p>
                            <a href="">迷失在世界尽头</a>
                        </p>
                        <p>
                            <a href="">我死的样子不太优雅</a>
                         </p>
                        <p>
                            <a href="">讨厌你喜欢你</a>
                        </p>
                        <p>
                            <a href="">邪君宠-貂蝉</a>
                        </p>
                        <p>
                            <a href="">正负联盟</a>
                        </p>
                        <p>
                            <a href="">雪国</a>
                        </p>
                        <p>
                            <a href="">妙手仙丹</a>
                        </p>
                        <p>
                            <a href="">觉醒纪元</a>
                        </p>
                        <p>
                            <a href="">妖神记</a>
                        </p>
                        <p>
                            <a href="">驭灵师</a>
                        </p>
                    </span>
                    </div>
                    <div class="col-md-3">
                        <span>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                    </span>
                    </div>
                </div>
                <div class="col-md-4 rank1-right" style="padding: 2px 2px 2px 2px;">
                    <div class="col-md-4 rank-right5">
                        <p>少年新作榜</p>
                    </div>
                    <div class="col-md-1" style="padding-left: 0px;">
                        <span>
                            <p>1</p>
                            <p>2</p>
                            <p>3</p>
                            <p>4</p>
                            <p>5</p>
                            <p>6</p>
                            <p>7</p>
                            <p>8</p>
                            <p>9</p>
                            <p>10</p>
                            <p>11</p>
                            <p>12</p>
                            <p>13</p>
                            <p>14</p>
                            <p>15</p>
                        </span>
                    </div>
                    <div class="col-md-8">
                        <span>
                        <p>
                        <a href="">镇魂街</a>
                    </p>
                        <p>
                            <a href="">为何如此冷酷</a>
                        </p>
                        <p>
                            <a href="">遗失的冥河</a>
                        </p>
                        <p>
                            <a href="">请神误用</a>
                        </p>
                        <p><a href="">七度轮回</a>
                        </p>
                        <p>
                            <a href="">迷失在世界尽头</a>
                        </p>
                        <p>
                            <a href="">我死的样子不太优雅</a>
                         </p>
                        <p>
                            <a href="">讨厌你喜欢你</a>
                        </p>
                        <p>
                            <a href="">邪君宠-貂蝉</a>
                        </p>
                        <p>
                            <a href="">正负联盟</a>
                        </p>
                        <p>
                            <a href="">雪国</a>
                        </p>
                        <p>
                            <a href="">妙手仙丹</a>
                        </p>
                        <p>
                            <a href="">觉醒纪元</a>
                        </p>
                        <p>
                            <a href="">妖神记</a>
                        </p>
                        <p>
                            <a href="">驭灵师</a>
                        </p>
                    </span>
                    </div>
                    <div class="col-md-3">
                        <span>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                    </span>
                    </div>
                </div>
                <div class="col-md-4 rank1-right" style="padding: 2px 2px 2px 2px;">
                    <div class="col-md-4 rank-right6">
                        <p>少女上升榜</p>
                    </div>
                    <div class="col-md-1" style="padding-left: 0px;">
                        <span>
                            <p>1</p>
                            <p>2</p>
                            <p>3</p>
                            <p>4</p>
                            <p>5</p>
                            <p>6</p>
                            <p>7</p>
                            <p>8</p>
                            <p>9</p>
                            <p>10</p>
                            <p>11</p>
                            <p>12</p>
                            <p>13</p>
                            <p>14</p>
                            <p>15</p>
                        </span>
                    </div>
                    <div class="col-md-8">
                        <span>
                        <p>
                        <a href="">镇魂街</a>
                    </p>
                        <p>
                            <a href="">为何如此冷酷</a>
                        </p>
                        <p>
                            <a href="">遗失的冥河</a>
                        </p>
                        <p>
                            <a href="">请神误用</a>
                        </p>
                        <p><a href="">七度轮回</a>
                        </p>
                        <p>
                            <a href="">迷失在世界尽头</a>
                        </p>
                        <p>
                            <a href="">我死的样子不太优雅</a>
                         </p>
                        <p>
                            <a href="">讨厌你喜欢你</a>
                        </p>
                        <p>
                            <a href="">邪君宠-貂蝉</a>
                        </p>
                        <p>
                            <a href="">正负联盟</a>
                        </p>
                        <p>
                            <a href="">雪国</a>
                        </p>
                        <p>
                            <a href="">妙手仙丹</a>
                        </p>
                        <p>
                            <a href="">觉醒纪元</a>
                        </p>
                        <p>
                            <a href="">妖神记</a>
                        </p>
                        <p>
                            <a href="">驭灵师</a>
                        </p>
                    </span>
                    </div>
                    <div class="col-md-3">
                        <span>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                    </span>
                    </div>
                </div>
                <div class="col-md-4 rank1-right" style="padding: 2px 2px 2px 2px;">
                    <div class="col-md-4 rank-right7">
                        <p>少女新作榜</p>
                    </div>
                    <div class="col-md-1" style="padding-left: 0px;">
                        <span>
                            <p>1</p>
                            <p>2</p>
                            <p>3</p>
                            <p>4</p>
                            <p>5</p>
                            <p>6</p>
                            <p>7</p>
                            <p>8</p>
                            <p>9</p>
                            <p>10</p>
                            <p>11</p>
                            <p>12</p>
                            <p>13</p>
                            <p>14</p>
                            <p>15</p>
                        </span>
                    </div>
                    <div class="col-md-8">
                        <span>
                        <p>
                        <a href="">镇魂街</a>
                    </p>
                        <p>
                            <a href="">为何如此冷酷</a>
                        </p>
                        <p>
                            <a href="">遗失的冥河</a>
                        </p>
                        <p>
                            <a href="">请神误用</a>
                        </p>
                        <p><a href="">七度轮回</a>
                        </p>
                        <p>
                            <a href="">迷失在世界尽头</a>
                        </p>
                        <p>
                            <a href="">我死的样子不太优雅</a>
                         </p>
                        <p>
                            <a href="">讨厌你喜欢你</a>
                        </p>
                        <p>
                            <a href="">邪君宠-貂蝉</a>
                        </p>
                        <p>
                            <a href="">正负联盟</a>
                        </p>
                        <p>
                            <a href="">雪国</a>
                        </p>
                        <p>
                            <a href="">妙手仙丹</a>
                        </p>
                        <p>
                            <a href="">觉醒纪元</a>
                        </p>
                        <p>
                            <a href="">妖神记</a>
                        </p>
                        <p>
                            <a href="">驭灵师</a>
                        </p>
                    </span>
                    </div>
                    <div class="col-md-3">
                        <span>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                    </span>
                    </div>
                </div>
                <div class="col-md-4 rank1-right" style="padding: 2px 2px 2px 2px;">
                    <div class="col-md-4 rank-right8">
                        <p>耽美上升榜</p>
                    </div>
                    <div class="col-md-1" style="padding-left: 0px;">
                        <span>
                            <p>1</p>
                            <p>2</p>
                            <p>3</p>
                            <p>4</p>
                            <p>5</p>
                            <p>6</p>
                            <p>7</p>
                            <p>8</p>
                            <p>9</p>
                            <p>10</p>
                            <p>11</p>
                            <p>12</p>
                            <p>13</p>
                            <p>14</p>
                            <p>15</p>
                        </span>
                    </div>
                    <div class="col-md-8">
                        <span>
                        <p>
                        <a href="">镇魂街</a>
                    </p>
                        <p>
                            <a href="">为何如此冷酷</a>
                        </p>
                        <p>
                            <a href="">遗失的冥河</a>
                        </p>
                        <p>
                            <a href="">请神误用</a>
                        </p>
                        <p><a href="">七度轮回</a>
                        </p>
                        <p>
                            <a href="">迷失在世界尽头</a>
                        </p>
                        <p>
                            <a href="">我死的样子不太优雅</a>
                         </p>
                        <p>
                            <a href="">讨厌你喜欢你</a>
                        </p>
                        <p>
                            <a href="">邪君宠-貂蝉</a>
                        </p>
                        <p>
                            <a href="">正负联盟</a>
                        </p>
                        <p>
                            <a href="">雪国</a>
                        </p>
                        <p>
                            <a href="">妙手仙丹</a>
                        </p>
                        <p>
                            <a href="">觉醒纪元</a>
                        </p>
                        <p>
                            <a href="">妖神记</a>
                        </p>
                        <p>
                            <a href="">驭灵师</a>
                        </p>
                    </span>
                    </div>
                    <div class="col-md-3">
                        <span>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                    </span>
                    </div>
                </div>
                <div class="col-md-4 rank1-right" style="padding: 2px 2px 2px 2px;">
                    <div class="col-md-4 rank-right9">
                        <p>耽美新作榜</p>
                    </div>
                    <div class="col-md-1" style="padding-left: 0px;">
                        <span>
                            <p>1</p>
                            <p>2</p>
                            <p>3</p>
                            <p>4</p>
                            <p>5</p>
                            <p>6</p>
                            <p>7</p>
                            <p>8</p>
                            <p>9</p>
                            <p>10</p>
                            <p>11</p>
                            <p>12</p>
                            <p>13</p>
                            <p>14</p>
                            <p>15</p>
                        </span>
                    </div>
                    <div class="col-md-8">
                        <span>
                        <p>
                        <a href="">镇魂街</a>
                    </p>
                        <p>
                            <a href="">为何如此冷酷</a>
                        </p>
                        <p>
                            <a href="">遗失的冥河</a>
                        </p>
                        <p>
                            <a href="">请神误用</a>
                        </p>
                        <p><a href="">七度轮回</a>
                        </p>
                        <p>
                            <a href="">迷失在世界尽头</a>
                        </p>
                        <p>
                            <a href="">我死的样子不太优雅</a>
                         </p>
                        <p>
                            <a href="">讨厌你喜欢你</a>
                        </p>
                        <p>
                            <a href="">邪君宠-貂蝉</a>
                        </p>
                        <p>
                            <a href="">正负联盟</a>
                        </p>
                        <p>
                            <a href="">雪国</a>
                        </p>
                        <p>
                            <a href="">妙手仙丹</a>
                        </p>
                        <p>
                            <a href="">觉醒纪元</a>
                        </p>
                        <p>
                            <a href="">妖神记</a>
                        </p>
                        <p>
                            <a href="">驭灵师</a>
                        </p>
                    </span>
                    </div>
                    <div class="col-md-3">
                        <span>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                    </span>
                    </div>
                </div>
                <div class="col-md-4 rank1-right" style="padding: 2px 2px 2px 2px;">
                    <div class="col-md-4 rank-right10">
                        <p>绘本上升榜</p>
                    </div>
                    <div class="col-md-1" style="padding-left: 0px;">
                        <span>
                            <p>1</p>
                            <p>2</p>
                            <p>3</p>
                            <p>4</p>
                            <p>5</p>
                            <p>6</p>
                            <p>7</p>
                            <p>8</p>
                            <p>9</p>
                            <p>10</p>
                            <p>11</p>
                            <p>12</p>
                            <p>13</p>
                            <p>14</p>
                            <p>15</p>
                        </span>
                    </div>
                    <div class="col-md-8">
                        <span>
                        <p>
                        <a href="">镇魂街</a>
                    </p>
                        <p>
                            <a href="">为何如此冷酷</a>
                        </p>
                        <p>
                            <a href="">遗失的冥河</a>
                        </p>
                        <p>
                            <a href="">请神误用</a>
                        </p>
                        <p><a href="">七度轮回</a>
                        </p>
                        <p>
                            <a href="">迷失在世界尽头</a>
                        </p>
                        <p>
                            <a href="">我死的样子不太优雅</a>
                         </p>
                        <p>
                            <a href="">讨厌你喜欢你</a>
                        </p>
                        <p>
                            <a href="">邪君宠-貂蝉</a>
                        </p>
                        <p>
                            <a href="">正负联盟</a>
                        </p>
                        <p>
                            <a href="">雪国</a>
                        </p>
                        <p>
                            <a href="">妙手仙丹</a>
                        </p>
                        <p>
                            <a href="">觉醒纪元</a>
                        </p>
                        <p>
                            <a href="">妖神记</a>
                        </p>
                        <p>
                            <a href="">驭灵师</a>
                        </p>
                    </span>
                    </div>
                    <div class="col-md-3">
                        <span>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                        <p>少年</p>
                    </span>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection