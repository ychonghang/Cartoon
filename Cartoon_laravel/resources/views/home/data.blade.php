<html xmlns="http://www.w3.org/1999/xhtml"><head><script type="text/javascript" async="" charset="utf-8" src="http://c.cnzz.com/core.php?web_id=30031742&amp;t=q"></script>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta content="IE=EmulateIE7" http-equiv="X-UA-Compatible">
    <title>修改基本资料 - af没妖气的个人管理中心 - 有妖气</title>
    <link href="http://static.u17i.com/v2/common/css/common.css?t1476981256" rel="stylesheet" type="text/css">
    <link href="http://static.u17i.com/v2/common/css/datepicker.css" rel="stylesheet" type="text/css">


    <script src="http://static.u17i.com/v2/js/all-min.js" type="text/javascript"></script>
    <script src="http://static.u17i.com/v2/js/u17.js?t1478592074" type="text/javascript"></script>
    <script src="http://static.u17i.com/v2/js/project/user.js?t1477047507" type="text/javascript"></script>
    <script src="http://static.u17i.com/common/js/jquery.validate.js" type="text/javascript"></script>
    <script src="http://static.u17i.com/v2/js/jquery-datepicker.js" type="text/javascript"></script>
    <script src="http://static.u17i.com/v2/js/module/city.js" type="text/javascript"></script>
    <script type="text/javascript">
        var v1 = "25";
        var v2 = "1";
        var sending = false;
        $(function() {
            $("#profile_form").validate({
                rules: {
                    qq: { qq:true},
                    mobile:{ isMobile:true},
                    realname: { rangelength: [0, 10]},
                    address: { rangelength: [0, 150]},
                    zipcode: { isZipCode: true},
                    email: { email: true}
                },
                submitHandler: function(form) {form.submit();},
                success: function(label) {
                    label.html("&amp;nbsp;").addClass("lf ico_check");
                },
                errorElement:'dd',errorClass:'ico_error',
                errorPlacement: function(error, element) {
                    p=element;
                    if(p.parent().find('dd.ico_error').length==0) p.after(error);
                }
            });
        });
        function check_email_bind(){
            $.ajax({
                url:'/passport/ajax.php?mod=member&amp;act=send_email_check',
                type:'get',
                dataType:'json',
                success:function(o){
                    showMsg(o.message);
                    if(o.code&gt;0){
                        $('#email_check_bind').html('等待验证&amp;nbsp;&amp;nbsp;&lt;a href="javascript:void(0);" onclick="check_email_bind()"&gt;重新验证&lt;/a&gt;');
                    }
                }
            })
        }

        function update_email_show(){
            $('#email_show').remove();
            var email_show_dialog = $('&lt;div id="email_show"&gt;&lt;/div&gt;');
            $('body').append(email_show_dialog);
            var html ='&lt;div style="width:340px;" class="pd_20 clearfix"&gt;&lt;form id="form_email_update"&gt;'
                //         +'&lt;div class="height_23 pd_b_20 txt_lf"&gt;&lt;span style="width:60px;" class="ve_m in_blo"&gt;用户密码：&lt;/span&gt;&lt;input type="password" id="password" name="password" class="input_txt_160 ve_m" value=""&gt;'
                //         +'&lt;/div&gt;'
                +'&lt;div class="height_23 pd_b_20"&gt;'
                +'&lt;span style="width:60px;" class="ve_m in_blo"&gt;新email：&lt;/span&gt;&lt;input type="text" id="new_email" name="new_email" class="input_txt_160 ve_m" value=""&gt;&lt;/div&gt;'
                +'&lt;div class="txt_lf pd_lf_60 pd_b_10"&gt;&lt;input type="submit" id="dialog_submit" class="btn submit" value="确定"&gt;&amp;nbsp;&lt;input type="button" id="dialog_reset" class="btn reset" value="取消" //onclick="email_edit_close()"&gt;&lt;/div&gt;&lt;/form&gt;&lt;/div&gt;';
            email_show_dialog.html(html);
            $('#form_email_update').validate({
                rules: {
                    //    password:{required:true,rangelength:[5,16]},
                    new_email: { email: true,required: true}
                },
                messages: {
                    //    password: {required:"密码不能为空",rangelength: "密码长度5-16"},
                    new_email: {required:"邮箱不能为空",email:"邮箱格式错误"}
                },
                submitHandler: function() {
                    //    var password = $('#password').val();
                    var new_email = $('#new_email').val();


                    if (sending)
                    {
                        showMsg('邮件发送中,请不要重复点击');
                        return;
                    }
                    $.ajax({
                        url:'/passport/ajax.php?mod=member&amp;act=update_member_email',
                        type:'post',
                        dataType:'json',
                        data:{new_email:new_email},
                        success:function(o){
                            email_edit_close();
                            showMsg(o.message);
                        },
                        beforeSend:function(){
                            sending = true;
                        },
                        complete:function(){
                            sending = false;
                        }
                    })
                },
                success: function(label) {
                    label.html("&amp;nbsp;").addClass("ico_check");
                },
                errorElement:'span',errorClass:'ico_error',
                errorPlacement: function(error, element) {
                    if(element.find('span.ico_error').length==0) element.after(error);
                }
            });
            $('#email_show').dialog({width:380,modal:true,title:'更改邮箱'}).dialog('autoHeight').dialog('open');
        }
        function email_edit_close(){
            $('#email_show').dialog('close');
        }

        $(function(){
            var len_num = 300;
            var txt = $('#introduce').val().replace(/\n/g,"\r\n");
            var len = txt.length;
            $('.red_e5').html(len_num-len);
            $('#introduce').keyup(function(){
                var txt = $('#introduce').val();
                var len = txt.length;
                if (len &gt; len_num) {
                    len = len_num;
                    $('#introduce').val(txt.substring(0, len_num));
                }
                $('.red_e5').html(len_num-len);
            });
        });
        //填写生日
        $(function(){ $('#birthday').datepicker({ changeMonth: true, changeYear: true, dateFormat: 'yy-mm-dd',defaultDate:'1997-04-19',minDate:'1900-01-01',maxDate:'2017-04-14'});});


        //修改用户昵称
        function vip_update_nickname()
        {
            var user = get_user();

            if (!user || user['group_user'] != 1)
            {

                var msg = "成为VIP会员，可以获得一次修改昵称机会&lt;br/&gt;&lt;a href='http://pay.u17.com/vip_member/?consume=new_vip' target='_blank' style='color:#1f7abc;'&gt;立即成为VIP&lt;/a&gt;";
                showMsg(msg);
                return false;
            }
            $("#vip_update_nickname").show().dialog({width:380,modal:true,title:'修改昵称',
                buttons : {
                    '保存' : function() {
                        vip_update_nickname_submit();
                    }
                }}).dialog('autoHeight').dialog('open').parent().find('button:contains(保存)').addClass('left');
        }

        function vip_update_nickname_submit()
        {
            var user = get_user();

            if (!user) return false;

            var o_err = $("#vip_update_nickname .ico_error");
            var nickname = $.trim($("#dialog_vip_nickname").val());

            if (!nickname) {
                o_err.show().html('昵称不能为空');
                return false;
            }

            if (/^漫友/.test(nickname)) {
                o_err.show().html('昵称不能以漫友为开头');
                return false;
            }

            if (nickname.length &gt; 12) {
                o_err.show().html('昵称的长度不能超过12个字符');
                return false;
            }

            $.getJSON('/vip/ajax.php?mod=member&amp;act=rename', {nickname : nickname}, function(res) {
                if (res.code &lt; 0) {
                    o_err.show().html(res.message);
                } else {
                    o_err.hide();
                    $("#vip_update_nickname").hide();
                    $(".ui-dialog-titlebar-close").trigger('click');
                    $("#hd_float").find("a[class='gray_66']").html(nickname);
                    $("#pos_mobile .gray_80").html(nickname);
                    $("#edit_nickname_tag").hide();
                    showMsg('昵称修改成功');
                }
            });
        }
    </script>
    <style>
        #bd i{padding:0 3px}
    </style>
</head>
<body><div id="cboxOverlay" style="display: none;"></div><div id="colorbox" style="padding-bottom: 0px; padding-right: 0px; display: none;"><div id="cboxWrapper"><div><div id="cboxTopLeft" style="float: left;"></div><div id="cboxTopCenter" style="float: left;"></div><div id="cboxTopRight" style="float: left;"></div></div><div><div id="cboxMiddleLeft" style="float: left;"></div><div id="cboxContent" style="float: left;"><div id="cboxLoadedContent" style="width: 0px; height: 0px;" class=""></div><div id="cboxLoadingOverlay" class=""></div><div id="cboxLoadingGraphic" class=""></div><div id="cboxTitle" class=""></div><div id="cboxCurrent" class=""></div><div id="cboxSlideshow" class=""></div><div id="cboxNext" class=""></div><div id="cboxPrevious" class=""></div><div id="cboxClose" class=""></div></div><div id="cboxMiddleRight" style="float: left;"></div></div><div><div id="cboxBottomLeft" style="float: left;"></div><div id="cboxBottomCenter" style="float: left;"></div><div id="cboxBottomRight" style="float: left;"></div></div></div><div style="position:absolute; top:0; left:0; width:9999px; height:0;"></div></div>
<!--header开始-->
<link rel="stylesheet" type="text/css" href="http://static.u17i.com/v4/common/css/basic.css?t1489988972">
<link rel="stylesheet" type="text/css" href="http://static.u17i.com/v4/www/css/bookrack.css?t1484292686">
<script type="text/javascript" src="http://static.u17i.com/v4/js/bookrack_common.js?t1480917689"></script>
<style type="text/css">
    body {
        padding-top: 47px;
    }
</style>
<script type="text/javascript">

    $(function(){

        var $btt =  $(".bri-tools-title");

        $(".bri-tools").delayed(function(){
            $(".bri-tools-detail").show();
            $btt.addClass('open');
        },function(){
            $(".bri-tools-detail").hide();
            $btt.removeClass('open');
        });

    });

    //领工资
    function get_salary(){
        $.ajax({
            url:'/user/ajax.php?mod=salary&amp;act=receive',
            cache:false,
            type:'get',
            dataType:'json',
            success:function(o){
                if(o.code&gt;0){
                    $('#salary_dialog').html(o.html);
                    if(typeof(o.now_score)!='undefined'){
                        $('#this_member_score').text(parseInt($('#this_member_score').text())+o.now_score);
                    }
                    if (o.message == '领取成功') {
                        $('.bri-salary').html('已领工资');
                    }
                    $('#salary_dialog').dialog({width:422,modal:true,title:'领工资'}).dialog('autoHeight').dialog('open');
                }else if(o.code==-2){
                    freezeVipShowMsg(o.message);
                }else{
                    showMsg(o.message);
                }
            }
        });
    }

</script>

<script type="text/javascript">
    var this_user_id = 19175602;
    var user = get_user();
    $(function(){
        $('a.float_menu').each(function(){
            bind_float_menu($(this),$(this).next(),null,null,function(btn,panel,is_show){ if(is_show) {btn.addClass('hd_exchange_hover') }else{  btn.removeClass('hd_exchange_hover') }},'show');
        });
        if(user){
            if(parseInt(user.username)==user.username &amp;&amp; (user.username.length)==11 &amp;&amp; user.username.substring(0,1)==1 &amp;&amp; user.reg_time&lt;=1338969600)
            {
                window.location.href=_cfg_host_passport+'\/member\/reset_username.php';
            }
            get_notify_count();
            setInterval(get_notify_count,125000);
        }
        bind_float_menu('#btn_member_set','#hd_menu_rt_submenu',null,null)
    });
    if ($.xcookie("sessioneditor")!==null) {
        $.cookie("super_login", true, {expires: 900,path:'/',domain:'u17.com'});
    };
</script>
<!-- 头部 -->
<script src="http://static.u17i.com/v4/js/project/www.js?t1484287092&amp;11245121" type="text/javascript"></script> <script src="http://static.u17i.com/v4/js/project/login_sdo.js" type="text/javascript"></script> <!--[if IE 6]> <script src="http://static.u17i.com/v4/js/DD_belatedPNG_0.0.8a.js" type="text/javascript"></script> <script> DD_belatedPNG.fix(".png24"); </script> <![endif]--> <!--黄色提示框--> <!-- <div id="tip_topfixed" style="display:none;"> <a href="javascript:;" class="ico close" title="关闭" onClick="$(this).parent().hide()"></a> <div id="msgview"></div> </div> --> <!--黄色提示框 end--> <style type="text/css"> #topbar .nav1{background: url(http://static.u17i.com/v4/common/images/cs_topbar.png) no-repeat; padding: 0 16px 0 25px; float: left; height: 44px; font: 14px/44px "Microsoft Yahei";} #topbar .pop_on .nav1{text-decoration:none; color:#fff!important; background-color:#5c5c5c} .pd_b_20 { padding-bottom: 20px; } .pd_b_8 { padding-bottom: 8px; } .pd_lf_23 { padding-left: 23px; } .red_e5 { color: #e50000; } .font_30 { font-size: 30px; } .pd_t_8 { padding-top: 8px; } .pd_t_15 { padding-top: 15px; } .reset { width: 68px; height: 25px; height: 23px\9; color: #fff; font-size: 12px; line-height: 25px; line-height: 24px\9; text-align: center; cursor: pointer; overflow: hidden; } .reset{background-position: -250px 2px;background-position: -250px 0\9; color:#444} .reset:hover{color:#444;text-decoration:none} .pd_rt_23 { padding-right: 23px; } .green { color: #6b9812; } </style> <div id="topbar"> <div class="topbar_con"> <div class="wrap"> <!--左侧--> <div class="left" id="top_nav"> <!-- 首页 --> <div class="pop_wrap"> <a href="http://www.u17.com/" class="nav1 nav_index" target="_blank">首页</a> </div> <!-- 首页 end --> <!--手机版--> <div class="pop_wrap"> <a href="javascript:;" class="nav nav_app" tindex="0" tab="1">手机版<em></em></a> <div class="pop_box" style="display:none;" tab="1"></div> </div> <!--手机版 end--> <!--小说--> <div class="pop_wrap" style="display:none;"> <a href="javascript:void(0);" class="nav nav_novel" tindex="1" tab="2">小说<em></em></a> <div class="pop_box" style="display:none;" tab="2"></div> </div> <!--小说end--> <!--有熊--> <div class="pop_wrap"> <a href="javascript:;" class="nav nav_uxiong" tindex="2" tab="3">有熊<em></em></a> <div class="pop_box" style="display:none;" tab="3"></div> </div> <!--有熊 end--> <!--游戏--> <div class="pop_wrap"> <a href="http://game.u17.com/" class="nav nav_game" target="_blank" tindex="3" tab="4">游戏<em></em></a> <div class="pop_box" style="display:none;" tab="4"></div> </div> <!--游戏 end--> </div> <!--左侧 end--> <!--右侧--> <div class="fr" id="top_nav_right"> <!--已登录--> <div id="userbar"><div class="pop_wrap username" id="username"><div class="u_nav"><a href="http://user.u17.com" target="_blank">af没妖气</a></div><div class="pop_box" id="pop_user"></div></div><div class="pop_wrap userlevel" id="usertype"><div class="u_nav"><a href="http://vip.u17.com" target="_blank" class="ico_viplev viplev_1n"></a></div><div class="pop_box" id="pop_topvip"></div></div><div class="pop_wrap ticket_box"><div class="u_nav"><a href="http://user.u17.com/ticket/" target="_blank">月票</a><i class="num_ticket" id="ticket_num">0</i></div><div class="pop_box"><div class="pop_box_con">月票是用来投给自己喜欢的作品，表示了对作品的支持和鼓励。<a href="http://user.u17.com/ticket/" target="_blank" class="blue">[详情]</a></div></div></div><div class="pop_wrap user_i"><div class="u_nav"><a href="http://user.u17.com" target="_blank">个人中心</a></div></div><q>|</q><a href="javascript:void(0);" onclick="logout_ajax();" class="logout">退出</a></div> <!--已登录 end--> <!--通知--> <div class="pop_wrap"> <a href="javascript:void(0);" class="nav">通知<em id="tip_topem"></em><span class="clock" id="tip_topclock" style="display:none;"></span><q>|</q></a> <div class="pop_box"> <ul class="pop_box_con notice_pop cf"> <li><a href="http://user.u17.com/favorite/list.php" target="_blank"><span><i>漫画更新</i><em id="notify_count_favorite_comic_v4" class="f99">0</em></span></a></li> <li><a href="http://user.u17.com/message/system_message_list.php" target="_blank"><span><i>系统消息</i><em id="notify_count_system_message" class="f99 red_e5 b">1</em></span></a></li> <li id="author_message_li" style="display:none;"><a href="http://comic.user.u17.com/message/message_list.php" target="_blank"><span><i>作者消息</i><em id="notify_count_author_message" class="f99">0</em></span></a></li> <li><a href="http://user.u17.com/message/message_list.php" target="_blank"><span><i>短消息</i><em id="notify_count_user_message" class="f99">0</em></span></a></li> <li><a href="http://user.u17.com/message/message_at_list.php" target="_blank"><span><i>@我的消息</i><em id="notify_count_user_message_at" class="f99">0</em></span></a></li> </ul> </div> </div> <!--通知end--> <!--书架--> <div class="pop_wrap" id="index_v4_1_favorite_history"> <a href="http://user.u17.com/favorite/list.php" target="_blank" class="nav">书架<em></em><q>|</q></a> <div class="pop_box"> <div class="pop_box_con book_pop cf"> <div class="tab"> <a href="javascript:;" rel="recent_read" id="tab_recent_read"><i>最近看的漫画</i></a><q></q> <a href="javascript:;" rel="recent_store" id="tab_recent_store" class="curr"><i class="bor_green">我收藏的漫画</i></a> </div> <div class="tab_con"> <!--最近看的漫画--> <div id="recent_read" style="display:none;"><ul style="display:block"><li><div><a href="http://www.u17.com/comic/76305.html" target="_blank" class="fl" title=""><img src="http://cover.u17i.com/2014/07/4486442_1405511198_9Xe1E5F91f9S.small.jpg"></a><p><a href="http://www.u17.com/comic/76305.html" title="无限恐怖" class="comic_name" target="_blank">无限恐怖</a><span>12小时前</span><a href="http://www.u17.com/chapter/602751.html" title="第五话 主神空间（…" class="chapter_name" target="_blank">第五话 主神空间（…</a></p></div></li><li><div><a href="http://www.u17.com/comic/140038.html" target="_blank" class="fl" title=""><img src="http://cover.u17i.com/2017/04/313950_1492077537_0BQZKidqgt40.small.jpg"></a><p><a href="http://www.u17.com/comic/140038.html" title="手游风波" class="comic_name" target="_blank">手游风波</a><span>12小时前</span><a href="http://www.u17.com/chapter/602361.html" title="16、体术操作" class="chapter_name" target="_blank">16、体术操作</a></p></div></li><li><div><a href="http://www.u17.com/comic/121836.html" target="_blank" class="fl" title=""><img src="http://cover.u17i.com/2017/02/4486442_1487736135_m8e3S65P031Z.small.jpg"></a><p><a href="http://www.u17.com/comic/121836.html" title="驭灵师" class="comic_name" target="_blank">驭灵师</a><span>14小时前</span><a href="http://www.u17.com/chapter/602256.html" title="第八话 血魔（11）" class="chapter_name" target="_blank">第八话 血魔（11）</a></p></div></li><li><div><a href="http://www.u17.com/comic/89778.html" target="_blank" class="fl" title=""><img src="http://cover.u17i.com/2015/02/5592117_1423042309_LzHQL64hQQGL.small.jpg"></a><p><a href="http://www.u17.com/comic/89778.html" title="活着就是个乐事" class="comic_name" target="_blank">活着就是个乐事</a><span>1周前</span><a href="http://www.u17.com/chapter/600380.html" title="植物杀" class="chapter_name" target="_blank">植物杀</a></p></div></li></ul><p class="bot" style="display:block"><a href="http://user.u17.com/favorite/read_list.php" target="_blank">更多浏览记录</a></p></div> <!--最近看的漫画 end--> <!--我收藏的漫画--> <div id="recent_store"><p class="nostore"><a href="http://passport.u17.com/member_v2/login.php?url=http://www.u17.com">点击登录</a></p></div> <!--我收藏的漫画 end--> </div> </div> </div> </div> <!--书架end--> <!--充值--> <div class="pop_wrap"> <a href="http://pay.u17.com" class="nav nav_pay" target="_blank"><span></span>充值<em></em><q>|</q></a> <div class="pop_box right_pop_box" style="display:none;"> <ul class="pop_box_con usercenter_pop cf"> <li><a href="http://pay.u17.com/vip_member" target="_blank"><span><i>VIP充值</i></span></a></li> <li><a href="http://pay.u17.com" target="_blank"><span><i>妖气币充值</i></span></a></li> </ul> </div> </div> <!--充值 end--> <!--上传漫画--> <div class="pop_wrap"> <a href="http://comic.user.u17.com/comic/comic_add.php" class="nav nav_upload" target="_blank">上传漫画</a> </div> <!--上传漫画 end--> </div> <!--右侧end--> </div> </div> </div> <script> set_client_width_class(); flush_login(); $.xtab({ tab: '#top_nav .nav', body: '#top_nav .pop_box', tab_show_class: 'cur', tab_hide_class: '', event: 'mouseover', lazy_time: 200, default_tab: 6, callback: function(tab, body, flag) { if (body.html() == '' &amp;&amp; flag != 7) { $.ajax({ url: '/z/fp/index_inc_v4_1/index_nav_' + flag + '.html', dataType: 'text', type: 'get', success: function(html) { body.html(html); }, error: function() { showMsg('通讯错误'); } }); } } }); $.xtab({ tab: '#top_nav_right .right_nav', body: '#top_nav_right .right_pop_box', tab_show_class: 'cur', tab_hide_class: '', event: 'mouseover', lazy_time: 200, default_tab: 3, callback: function(tab, body, flag) { if (body.html() == '' &amp;&amp; flag != 7) { $.ajax({ url: '/z/fp/index_inc_v4_1/index_nav_right_' + flag + '.html', dataType: 'text', type: 'get', success: function(html) { body.html(html); }, error: function() { showMsg('通讯错误'); } }); } } }); $(document).ready(function(){ /* *为书架绑定鼠标事件(ajax触发,只调取一次) */ $("#index_v4_1_favorite_history").bind('mouseenter',get_favorite_comic_list); /*获取我收藏的漫画*/ get_favorite_comic_list(); /*导航下拉*/ index_pop_wrap(); /*书架背景变色*/ index_bookList(); /*tab切换*/ $("#index_v4_1_favorite_history .tab a").mouseover(index_tab); /*传送门展开收缩*/ index_portal(); }); </script><div class="br-header">
    <a target="_blank" href="http://www.u17.com/click/1_99_33272.html" class="ad-img" style="background: url(http://image.mylife.u17t.com/2017/04/07/1491532893_nfWt1Xfnn9kW.jpg) center top no-repeat;">
        <span></span>
    </a>
</div>
<!-- 工具条 -->
<div class="bri-tools-content">
    <div class="bri-tools">
        <div class="bri-tools-title">
            我的应用和设置<span></span>
        </div>
        <div class="bri-tools-detail">
            <ul class="bri-tools-list">
                <li>
                    <a href="http://user.u17.com/favorite/favorite_list_new.php"><i class="left-arrow"></i>书架<i class="right-arrow"></i></a>
                </li>
                <li>
                    <a href="http://user.u17.com/tucao/my_tucao.php"><i class="left-arrow"></i>吐槽<i class="right-arrow"></i></a>
                </li>
                <li>
                    <a href="http://user.u17.com/seal/my_seal.php"><i class="left-arrow"></i>封印图<i class="right-arrow"></i></a>
                </li>
                <li>
                    <a href="http://wan.u17i.com" target="_blank"><i class="left-arrow"></i>游戏中心<i class="right-arrow"></i></a>
                </li>
                <li>
                    <a href="http://vip.u17.com/new_grow.php" target="_blank"><i class="left-arrow"></i>VIP服务<i class="right-arrow"></i></a>
                </li>
                <li>
                    <a href="http://user.u17.com/comment/comment.php"><i class="left-arrow"></i>评论管理<i class="right-arrow"></i></a>
                </li>
                <li>
                    <a href="http://user.u17.com/ticket/index.php"><i class="left-arrow"></i>月票<i class="right-arrow"></i></a>
                </li>
                <li>
                    <a href="http://user.u17.com/subscribe/list.php"><i class="left-arrow"></i>我的订阅<i class="right-arrow"></i></a>
                </li>
                <li>
                    <a href="http://user.u17.com/read_voucher/index.php"><i class="left-arrow"></i>阅读券<i class="right-arrow"></i></a>
                </li>
                <li>
                    <a href="http://user.u17.com/message/message_list.php"><i class="left-arrow"></i>短信<i class="right-arrow"></i></a>
                </li>
                <li>
                    <a href="http://user.u17.com/audio/my_audio.php"><i class="left-arrow"></i>声优管理<i class="right-arrow"></i></a>
                </li>
                <li>
                    <a href="http://user.u17.com/gift/index.php"><i class="left-arrow"></i>礼物道具<i class="right-arrow"></i></a>
                </li>
                <li>
                    <a href="http://user.u17.com/title/title.php"><i class="left-arrow"></i>称号<i class="right-arrow"></i></a>
                </li>
                <li>
                    <a style="width:144px;" href="http://user.u17.com/album/downUserInfoZip.php"><i class="left-arrow"></i>日志&amp;相册下载<i class="right-arrow"></i></a>
                </li>
            </ul>
            <div class="bri-tools-list">
                <li>
                    <a href="http://user.u17.com/about/edit_base.php"><i class="left-arrow"></i>个人设置<i class="right-arrow"></i></a>
                </li>
                <li>
                    <a href="http://user.u17.com/coin/coin.php"><i class="left-arrow"></i>消费记录<i class="right-arrow"></i></a>
                </li>
                <li>
                    <a href="http://user.u17.com/recharge/recharge.php"><i class="left-arrow"></i>充值记录<i class="right-arrow"></i></a>
                </li>
                <li>
                    <a href="http://i.u17.com/19175602" target="_blank"><i class="left-arrow"></i>个人空间<i class="right-arrow"></i></a>
                </li>
            </div>
        </div>
    </div>
    <a href="http://comic.user.u17.com" target="_blank" class="bri-center">前往漫画管理中心&gt;&gt;</a>
</div>
<!-- 工具条 end -->
<!-- 头部 end -->
<!--领工资-->
<!-- <div id="salary_dialog" style="display:none;">
</div> -->
<!--领工资end-->
<!--header结束-->
<!--contenter开始-->
<div class="area bri-main-content">


    <script type="text/javascript" src="http://static.u17i.com/v4/js/left_menu_new.js?t1481256783"></script>
    <div class="bri-sidebar">
        <div class="bri-sidebar-title">
            <a href="javascript:void(0)" class="change-btn"><i id="rotate" class=""></i></a>
        </div>
        <div class="zp-empty" id="left_empty" style="display: none">
            <img src="http://static.u17i.com/v4/www/images/bookrack/empty_yaoqiniang.png">
            <span>哎呀~妖气娘的藏书都被你看光了<br>等妖气娘带新的好作品回来吧!</span>
        </div>
        <div class="zp-empty" id="left_empty_load" style="display: none;">
            <img src="http://static.u17i.com/v4/www/images/bookrack/empty_yaoqiniang.png">
            <span>加载中···</span>
        </div>
        <div id="con-recommend-list"><ul class="recommend-list"><li><a href="http://www.u17.com/comic/101106.html" target="_blank"></a><img src="http://cover.u17i.com/2016/08/9850985_1471834309_Ij83k482Kdao.small.jpg"><span title="我的同学神烦">我的同学神烦</span></li><li><a href="http://www.u17.com/comic/134860.html" target="_blank"></a><img src="http://cover.u17i.com/2017/03/88485_1489537489_9padp38ts1j2.small.jpg"><span title="遗失的冥河">遗失的冥河</span></li><li><a href="http://www.u17.com/comic/38368.html" target="_blank"></a><img src="http://cover.u17i.com/2015/03/1594_1426841669_83yyd3hZ3h2Z.small.jpg"><span title="超能领域">超能领域</span></li><li><a href="http://www.u17.com/comic/108320.html" target="_blank"></a><img src="http://cover.u17i.com/2017/02/12068600_1487058291_Wq5sH222ctHq.small.jpg"><span title="叫姐姐">叫姐姐</span></li></ul></div>
        <a href="javascript:void(0)" class="change-btn cb2">换一批</a>
    </div>    <div class="bri-main">
        <div id="bd">
            <div class="bd bg_gray auto">
                <!--content_left开始-->

                <!--content_left结束-->
                <!--content_right开始-->
                <div class="bd_rt bg_white bor_l_1">
                    <div class="sp_title mg_2">
                        <a class="exchange exchange_current" href="http://user.u17.com/about/edit_base.php">个人资料</a>
                        <a class="exchange" href="http://user.u17.com/about/edit_face.php">修改头像</a>
                        <a class="exchange" href="http://user.u17.com/about/edit_password.php">修改密码</a>
                        <a class="exchange" href="http://user.u17.com/about/account_safe.php">帐号安全<i class="new"></i></a>
                    </div>
                    <div class="mg_2 pd_t_20">
                        <div class="gray_9c">&nbsp;<a href="http://user.u17.com/about/edit_base.php">基本资料</a> | <a class="blue_88" href="http://user.u17.com/about/edit_info.php">个人信息</a> </div>
                        <div class="pd_t_10">
                            <h2 class="txt_ct">资料完成度<font class="font_16 orange b">16%</font></h2>
                            <div class="mg_auto mg_t_1 progress_bg">
                                <div class="progressbar">
                                    <div class="progressbar-completed" style="width:16%;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="pd_t_10 pd_b_6 bor_b_2_ed">
                            <span class="pd_rt_23" style="font-family:微软雅黑;font-size:16px;font-weight:bold;font-style:normal;text-decoration:none;color:#333333;">账 号 信 息</span>
                        </div>
                        <div class="pd_t_10">
                            <!-- 登录帐号 -->
                            <div class="pd_tb_8 bg_bottom auto zoom" id="pos_username">
                                <span class="rt">
                                    <select class="select_1" name="sex" disabled="disabled">
                                        <option>公开</option>
                                    </select>
                                </span>
                                <span class="lf line_18_22 pd_rt_23">等&#12288;&#12288;&#12288;级:</span><img src="http://static.u17i.com/v2/common/images/member/online.gif" title="在线，累计在线 23.8 小时" class="user_symbol"><img src="http://static.u17i.com/v2/common/images/member/lev1.png" title="经验值：37.00" class="user_symbol">                                                                <a href="http://pay.u17.com/vip_member/" class="yellow" target="_blank">[马上成为VIP]</a>
                            </div>
                            <div class="pd_tb_8 bg_bottom auto zoom">
                                <span class="rt">
                                    <select class="select_1" name="nickname" disabled="disabled">
                                        <option>私密</option>
                                    </select>
                                </span>
                                <span class="lf line_18_22 pd_rt_23">登 录 帐 号:</span>24******4@qq.com                            </div>
                            <div class="pd_t_10 pd_b_6 bor_b_2_ed" style="padding-top:40px">
                                <span class="pd_rt_23" style="font-family:微软雅黑;font-size:16px;font-weight:bold;font-style:normal;text-decoration:none;color:#333333">会 员 资 料</span>
                            </div>
                            <form method="POST" name="profile_form" id="profile_form">
                                <!-- 昵称 -->
                                <dl class="pd_tb_8 auto zoom" id="pos_mobile">
                                    <dt class="rt">
                                        <select class="select_1" disabled="disabled">
                                            <option value="Y">公开</option>
                                        </select>
                                    </dt>
                                    <dd class="lf line_18_22 pd_rt_23">昵&#12288;&#12288;&#12288;称:</dd>
                                    <dd class="lf">
                                        <span class="lf"></span>
                                        <span class="gray_80 lf line_18_22">af没妖气</span>
                                    </dd>
                                    <dd class="lf check_lnk_txt" id="edit_nickname_tag" style="margin:-2px 0 0 20px">
                                        <a href="javascript:void(0);" onclick="vip_update_nickname();">修改昵称</a>
                                    </dd>

                                </dl>
                                <div id="vip_update_nickname" style="display:none;">
                                    <div class="clearfix" style="padding:10px 30px;">
                                        <div style="padding:0 0 10px 0;color:#F00" class="line">
                                            VIP会员可以获得一次修改昵称的机会！<br>提示：只有一次机会,要珍惜哟！
                                        </div>
                                        <div class="line">
                                            <span class="name">新昵称：</span>
                                            <input value="" class="input_txt_210 ve_m" name="new_nickname" id="dialog_vip_nickname" type="text">
                                            <p class="tip" style="color: #666666;padding: 6px 0 0 37px;">昵称的长度为6个汉字或12个字符。
                                                <span class="ico_error" style="display:none;"></span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <!-- 真实姓名 -->
                                <div class="pd_tb_8 bg_bottom auto zoom"><span class="rt"><select class="select_1" name="realname_secret"><option value="Y">私密</option><option value="N">公开</option></select></span><span class="lf line_18_22 pd_rt_23">真<i>实</i><i>姓</i>名:</span><input class="input_txt_210 lf" id="realname" name="realname" value="" type="text"></div>

                                <!-- 性别 -->
                                <div class="pd_tb_8 bg_bottom auto zoom"><span class="rt"><select class="select_1" name="sex_secret"><option value="N">公开</option><option value="Y">私密</option></select></span><span class="lf pd_rt_23">性&#12288;&#12288;&#12288;别:</span><input class="radio" name="sex" value="男" type="radio"><span class="lf pd_rt_23">男</span><input class="radio" name="sex" value="女" type="radio"><span class="lf">女</span></div>

                                <!-- 生日 -->
                                <div class="pd_tb_8 bg_bottom auto zoom"><span class="rt"><select class="select_1" name="birthday_secret"><option value="N">公开</option><option value="Y">私密</option></select></span><span class="lf line_18_22 pd_rt_23">生&#12288;&#12288;&#12288;日:</span>
                                    <input class="input_txt_210 lf hasDatepicker" id="birthday" name="birthday" value="" type="text">
                                    <span class="gray_80">(生日每个月只能修改2次)</span></div>

                                <!-- 手机 -->
                                <dl class="pd_tb_8 auto zoom" id="pos_mobile"><dt class="rt"><select class="select_1" disabled="disabled"><option value="Y">私密</option></select></dt><dd class="lf line_18_22 pd_rt_23">手<i>机</i><i>号</i>码:</dd>
                                    <dd class="lf">
                                        <input class="input_txt_210 lf" id="mobile" name="mobile" value="" type="text">
                                        <span class="lf"></span>
                                        <input class="lf" name="hiddenField" id="hiddenField" value="60" type="hidden">
                                    </dd>
                                    <dd id="phone_check_bind" class="lf check_lnk_txt" style="display:inline-block;"><a href="javascript:;" onclick="update_phone_show(1)">立即绑定</a></dd><dd id="phone_check_bind1" class="lf check_lnk_txt" style="display:none;">已绑定 <a href="javascript:;" onclick="update_newphone_show()">更换手机号</a></dd>
                                </dl>
                                <div class="pd_b_8 bg_bottom  auto zoom"><span class="in_blo pd_rt_23  width_56"> </span><font class="gray_9c">· 手机绑定后，您将获得200经验值和一张阅读券。</font></div>

                                <!-- 邮箱 -->
                                <dl class="pd_tb_8 auto zoom" id="pos_email">
                                    <dt class="rt">
                                        <select class="select_1" disabled="disabled">
                                            <option value="Y">私密</option>
                                        </select>
                                    </dt>
                                    <dd class="lf line_18_22 pd_rt_23 ">收<i>信</i><i>邮</i>箱:</dd>
                                    <dd class="lf">
                                        <input class="input_txt_210 lf" id="email" name="email" value="243764564@qq.com" type="text">
                                    </dd>
                                    <dd class="lf check_lnk_txt" id="email_check_bind"><a href="javascript:void(0);" onclick="check_email_bind()">去验证</a></dd></dl>
                                <div class="pd_b_8 bg_bottom  auto zoom"><span class="in_blo pd_rt_23  width_56"> </span><font class="gray_9c">· 为了您方便找回密码以及统计获奖信息，请填写正确邮箱并及时验证。</font></div>

                                <!-- QQ -->
                                <dl class="pd_tb_8 bg_bottom auto zoom"><dt class="rt"><select class="select_1" disabled="disabled"><option value="Y">私密</option></select></dt><dd class="lf line_18_22 pd_rt_23">&#12288;&#12288;&#12288; QQ:</dd><dd class="lf"><input class="input_txt_210 lf" id="qq" name="qq" value="" type="text"><span></span></dd></dl>

                                <!-- 所在地区 -->
                                <div class="pd_tb_8 bg_bottom auto zoom"><span class="rt"><select class="select_1" name="province_secret"><option value="N">公开</option><option value="Y">私密</option></select></span><span class="lf line_18_22 pd_rt_23">所<i>在</i><i>城</i>市:</span><select class="select_80" name="province" id="select_province"><option value="">省/直辖市</option><option value="2">北京</option><option value="3">安徽</option><option value="4">福建</option><option value="5">甘肃</option><option value="6">广东</option><option value="7">广西</option><option value="8">贵州</option><option value="9"> 海南</option><option value="10">河北</option><option value="11">河南</option><option value="12">黑龙江</option><option value="13">湖北</option><option value="14">湖南</option><option value="15">吉林</option><option value="16">江苏</option><option value="17">江西</option><option value="18">辽宁</option><option value="19">内蒙古</option><option value="20">宁夏</option><option value="21">青海</option><option value="22">山东</option><option value="23">山西</option><option value="24">陕西</option><option value="25">上海</option><option value="26">四川</option><option value="27">天津</option><option value="28">西藏</option><option value="29">新疆</option><option value="30">云南</option><option value="31">浙江</option><option value="32">重庆</option><option value="33">香港</option><option value="34">澳门</option><option value="35">台湾</option><option value="1">海外</option></select>&nbsp;<select name="city" class="select_80" id="select_city"><option value="">城市/地区</option><option value="2703">长宁区</option><option value="2704">闸北区</option><option value="2705">闵行区</option><option value="2706">徐汇区</option><option value="2707">浦东新区</option><option value="2708">杨浦区</option><option value="2709">普陀区</option><option value="2710">静安区</option><option value="2711">卢湾区</option><option value="2712">虹口区</option><option value="2713">黄浦区</option><option value="2714">南汇区</option><option value="2715">松江区</option><option value="2716">嘉定区</option><option value="2717">宝山区</option><option value="2718">青浦区</option><option value="2719">金山区</option><option value="2720">奉贤区</option><option value="2721">崇明县</option></select></div>

                                <!-- 邮编 -->
                                <dl class="pd_tb_8 bg_bottom auto zoom"><dd class="rt"><select class="select_1" disabled="disabled"><option value="Y">私密</option></select></dd><dt></dt><dd class="lf line_18_22 pd_rt_23">邮&#12288;&#12288;&#12288;编:</dd><dd class="lf"><input class="input_txt_210 lf" id="zipcode" name="zipcode" value="" type="text"><span></span></dd></dl>

                                <!-- 地址 -->
                                <dl class="pd_tb_8 auto zoom"><dt class="rt"><select class="select_1" disabled="disabled"><option value="Y">私密</option></select></dt><dd class="lf line_18_22 pd_rt_23">地&#12288;&#12288;&#12288;址:</dd><dd class="lf"><input class="input_txt_210 lf" id="address" name="address" value="" type="text"></dd></dl>
                                <div class="pd_b_8 bg_bottom  auto zoom"><span class="in_blo pd_rt_23  width_56"> </span><font class="gray_9c">· 为了您参加活动获奖后方便邮寄奖品，请填写真实地址。</font></div>

                                <!--性格特点开始-->
                                <div class="pd_tb_8 over_hidden zoom"><span class="rt"><select class="select_1" name="introduce_secret"><option value="N">公开</option><option value="Y">私密</option></select></span>
                                    <div class="lf pd_t_4 line_18_22 pd_rt_23">自<i>我</i><i>介</i>绍:</div>
                                    <div class=" width_520 auto zoom">
                                        <div class="width_1"><textarea class="texteare_1_90" name="introduce" id="introduce"></textarea></div>
                                    </div>
                                </div>


                                <div class="mg_lf_90 width_520 auto zoom"><span class="rt gray_9c">你还可以输入<font class="red_e5">300</font>字</span><span class="lf mg_t_1"><input class="btn submit" value="保存" type="submit">&nbsp;<input class="btn reset" value="重置" type="reset"></span></div>
                            </form>

                        </div>
                    </div>

                </div>
                <!--content_right结束-->
            </div>
        </div>
    </div>
    <div class="clear"></div>
</div>
<!--contenter结束-->
<!--footer开始-->
<!--footer开始-->
<div id="ft" class="UT_space_footer">
    <div class="ft bg_white">
        <div class="ft_rt rt txt_rt"><span class="gray">Copyright&copy;2005-2017 有妖气 </span><a class="blue unline" href="http://www.u17.com" target="blank">版权所有</a><br>京ICP证：120807号</div>
        <div class="ft_lf"><a class="gray" href="http://www.u17.com" target="blank">首页</a> | <a class="gray" href="http://www.u17.com/z/help/about_intro.html" target="blank">关于有妖气</a> | <a class="gray" href="http://www.u17.com/z/help/sitemap.html" target="blank">网站地图</a> | <a class="gray" href="http://www.u17.com/z/help/faq.html" target="blank">帮助中心</a> | <a class="gray" href="http://www.u17.com/feedback/problem.php" target="blank">意见反馈</a> | <a class="gray" href="http://www.u17.com/comment/2.html" target="blank">不良信息举报</a><br>Processed in 33.49 ms querys:16</div>
    </div>
</div>
<!--footer结束-->
<div style="display:none">
    <script type="text/javascript">

        if(_czc == null){
            var _czc = _czc || [];
        }
        var user=get_user();
        _czc.push(["_setAccount", "30031742"]);

        if(user == null || user==''){
            _czc.push(["_setCustomVar",'用户类型','游客',1]);
        }else{
            if(user.group_user ==1){
                _czc.push(["_setCustomVar",'用户类型','VIP'+user.vip_level,1]);
            }else if(user.group_user ==2){
                _czc.push(["_setCustomVar",'用户类型','冻结用户',1]);
            }else if(user.group_user ==99){
                _czc.push(["_setCustomVar",'用户类型','过期用户',1]);
            }else{
                _czc.push(["_setCustomVar",'用户类型','普通用户',1]);
            }
        }


        $(document).ready(function(){

            function GetQueryString(name) {
                var reg = new RegExp("(^|&amp;)" + name + "=([^&amp;]*)(&amp;|$)","i");
                var r = window.location.search.substr(1).match(reg);
                if (r!=null) return (r[2]); return null;
            }

            /*cnzz全景统计*/
            $.each(['http://w.cnzz.com/c.php?id=30031742'],function(i, v){
                $('&lt;script&gt;').attr({src: v}).appendTo(document.body);
            });
            var cnzz_ref = GetQueryString('ref')
            if (cnzz_ref) {
                var cnzz_url = 'http://w.cnzz.com/c.php?id=' + cnzz_ref;
                $.each([cnzz_url],function(i, v){
                    $('&lt;script&gt;').attr({src: v}).appendTo(document.body);
                });
            }
            if ( typeof $.xcookie === 'function' ) {
                if ( $.xcookie('uuid') &amp;&amp; $.xcookie('ad_info') ) {
                    $('&lt;script&gt;').attr({src : 'http://news.u17i.com/advert/advert_cnzz.js'}).appendTo(document.body);
                }
            }


        });

    </script>

    <script type="text/javascript">
        if(typeof console=='undefined'){
            var console={
                log:function(msg){

                }
            }
        }
        var randbygailv = function(gailv){
            var ret = false;
            var rand = Math.random();
            if(gailv &gt; rand){
                ret = true;
            }
            return ret;
        }
        var mmmm = function(){
            var js = "var cnzz_protocol = ((\"https:\" == document.location.protocol) ? \" https://\" : \" http://\");document.write(unescape(\"%3Cspan id='cnzz_stat_icon_30088157'%3E%3C/span%3E%3Cscript src='\" + cnzz_protocol + \"w.cnzz.com/c.php%3Fid%3D30088157' type='text/javascript'%3E%3C/script%3E\"));";

            var d = new Date();
            var yy = d.getFullYear();
            var mm = d.getMonth()+1;
            var dd = d.getDate();
            var tindex = document.URL.indexOf('z/mylife/t');
            if(yy=="2015" &amp;&amp; mm=="12" &amp;&amp; dd=="14" &amp;&amp; tindex&lt;0){
                console.log("20151214");
                if(randbygailv(0.1)){
                    eval(js);
                    console.log('mmmm');
                }
            }else if(yy=="2015" &amp;&amp; mm=="12" &amp;&amp; dd=="15" &amp;&amp; tindex&lt;0){
                console.log("20151215");
                if(randbygailv(0)){
                    eval(js);
                    console.log('mmmm');
                }
            }else{
                console.log("20151216");
                if(randbygailv(0.2) &amp;&amp; tindex&lt;0){
                    eval(js);
                    console.log('mmmm');
                }
            }
        }
        mmmm();
    </script>

    <iframe src="http://www.u17.com/z/include/google_analytic.html" frameborder="no" height="1" width="1"></iframe>
</div>

<div style="display:none" title="临时统计广告展现次数">
    <script type="text/javascript">
        document.write("&lt;scr"+"ipt src=\"http://s4.cnzz.com/stat.php?id=2847836&amp;web_id=2847836\" language=\"JavaScript\"&gt;&lt;/sc"+"ript&gt;");
    </script><script src="http://s4.cnzz.com/stat.php?id=2847836&amp;web_id=2847836" language="JavaScript"></script><script src="http://c.cnzz.com/core.php?web_id=2847836&amp;t=z" charset="utf-8" type="text/javascript"></script><a href="http://www.cnzz.com/stat/website.php?web_id=2847836" target="_blank" title="站长统计">站长统计</a>
</div><!--footer结束-->


<div id="ui-datepicker-div" class="ui-datepicker ui-widget ui-widget-content ui-helper-clearfix ui-corner-all"></div></body></html>