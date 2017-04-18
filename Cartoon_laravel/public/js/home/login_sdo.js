// JavaScript Document

//回调函数验证登录态
function checkstat(stat){
	if(stat.CAS_LOGIN_STATE=="1"){
		//alert("目前 CAS是登录态，登录状态啦！");
		//跳转并进行接口认证
		cas_sdo_go();
	}
}

//登录状态接口验证
function checkLoginStat(){
	var script = document.createElement('script');
	script.type = 'text/javascript';
	script.src = 'http://cas.sdo.com/cas/loginStateService?method=checkstat';
	document.getElementsByTagName('head')[0].appendChild(script);
}

//进行接口认证
function cas_sdo_go(){
	//AppId
	var app_id = 200020500;
	var return_url = window.location.href;
	return_url = encodeURIComponent(return_url);
	//认证之后，回调页面
	var service_url = _cfg_host_passport+"/sdo/snda_login_signature.php?url="+return_url;
	//var service_url = _cfg_host_base;
	//跳转地址
	var url = "http://cas.sdo.com/cas/login?appId="+app_id+"&appArea=1&customSecurityLevel=2&gateway=true&service="+service_url;
	//alert(url);
	window.location.href=url;
}

//把有妖气账号 与 盛大账号进行绑定(检查用户输入的U17账号及密码是否正确)
function snda_manual_bind_ajax(){
	var u17_u_obj = $("#u17_username");
	var u17_p_obj = $("#u17_password");
	var snda_u_obj = $("#snda_username");
	var snda_p_obj = $("#snda_password");

	var u17_username = $.trim(u17_u_obj.val());
	var u17_password = u17_p_obj.val();

	var snda_username = $.trim(snda_u_obj.val());
	var snda_password = snda_p_obj.val();

	$(".text_curr").removeClass("text_curr");
	$(".text_false").removeClass("text_false");
	$(".col_orange").html('&nbsp;');

	if(u17_username == ''){
		$("#u17_error_info").html("请输入用户名。");
		u17_u_obj.addClass("text_false");
		return false;
	}else if(u17_password == ''){
		$("#u17_error_info").html("请输入用密码。");
		u17_p_obj.addClass("text_false");
		return false;
	}else if(snda_username == ''){
		$("#snda_error_info").html("请输入用户名。");
		snda_u_obj.addClass("text_false");
		return false;
	}else if(snda_password == ''){
		$("#snda_error_info").html("请输入用密码。");
		snda_p_obj.addClass("text_false");
		return false;
	}


	$.ajax({
		url:'/passport/ajax.php?mod=sdo&act=check_user',
		data:{u17_username:u17_username,u17_password:u17_password,snda_username:snda_username,snda_password:snda_password},
		dataType:'json',
		type:'POST',
		cache:false,
		success:function(o){
			//alert(o);
			if(o.code>0){
				window.location.href=o.return_url;
			}else if(o.code> -10){
				$("#u17_error_info").html(o.message);
				//alert(o.message);
			}else{
				$("#snda_error_info").html(o.message);
				//alert(o.message);
			}
		},
		error:function(){showMsg('服务器通信错误');}
	});

}

//用户个性账号升级(盛大注册账号)
function snda_username_register_ajax(){


	var snda_username = $.trim($("#snda_username").val());
	var snda_password = $("#snda_password").val();
	var checkcode     = $("#checkcode").val();

	var err_0_10 = $("#error_0_10");
	var err_10_20 = $("#error_10_20");
	var err_20_30 = $("#error_20_30");
	var err_30_40 = $("#error_30_40");

	err_0_10.hide();
	err_10_20.hide();
	err_20_30.hide();
	err_30_40.hide();
	$("#send_code_info").hide();


	if($.trim($("#snda_username").val()) == ''){
		$("#error_0_10").show();
		$("#error_0_10").html("请输入账号。");
		$("#error_0_10").parent().find("input").addClass("text_false");
		//$("#error_0_10").parent().parent().find(".input_info").show().next(".warn").show();
		return false;
	}
	
	//个性账号存在下划线  或  账号以数字开头
	if(typeof($("#username_flag").val()) != 'undefined'){

		if(!/^[a-zA-Z]+[a-zA-Z0-9]*$/.test(snda_username)){
			$("#error_0_10").show();
			$("#error_0_10").html("用户名规则不合法。");
			$("#error_0_10").parent().find("input").addClass("text_false");
			return false;
		}
	}


	var username_type = $("#username_type").val();
	if(typeof(username_type) != 'undefined'){	//先检测邮箱验证码是否输入
		if($.trim($("#checkcode").val()) == ''){
			$("#error_20_30").show();
			$("#error_20_30").html("请输入验证码。");
			$("#error_20_30").parent().find("input").addClass("text_false");
			return false;
		}
	}


	$.ajax({
		url:'/passport/ajax.php?mod=sdo&act=snda_register',
		data:{snda_username:snda_username,snda_password:snda_password,checkcode:checkcode},
		dataType:'json',
		type:'POST',
		cache:false,
		success:function(o){
			//alert(o.message);
			if(o.code>0){	//成功
				window.location.href=o.return_url;
			}else if(o.code> -10){		//用户名
				//$("#u17_error_info").html(o.message);
				err_0_10.html(o.message);
				err_0_10.show();
				err_0_10.parent().find("input").addClass("text_false");
			}else if(o.code> -20 && o.code < -10){	//验证码按钮
				$("#error_10_20").html(o.message);
				$("#error_10_20").show();
				err_10_20.parent().find("input").addClass("text_false");
			}else if(o.code> -30 && o.code < -20){	//验证码输入框
				$("#error_20_30").html(o.message);
				$("#error_20_30").show();
				err_20_30.parent().find("input").addClass("text_false");
			}else if(o.code> -40 && o.code < -30){	//密码
				$("#error_30_40").html(o.message);
				$("#error_30_40").show();
				err_30_40.parent().find("input").addClass("text_false");
			}else{
				showMsg(o.message);
			}
		},
		error:function(){showMsg('服务器通信错误');}
	});

}

//发送邮箱验证码
function send_email_checkcode(){
	$("#error_0_10").hide();
	$("#error_10_20").hide();
	$("#error_20_30").hide();
	$("#error_30_40").hide();
	$("#send_code_info").hide();
	var snda_email = $.trim($("#snda_username").val());
	if(!check_email(snda_email)){
		$("#error_0_10").html("请输入正确的邮箱");
		$("#error_0_10").show();
		return false;
	}

	$.ajax({
		url:'/passport/ajax.php?mod=sdo&act=send_email_checkcode',
		data:{snda_email:snda_email},
		type:'POST',
		dataType:'json',
		success:function(o){

			if(o.code> 10){
				$("#send_code_info").show();
			}else if(o.code> -10){		//用户名
				//$("#u17_error_info").html(o.message);
				$("#error_0_10").html(o.message);
				$("#error_0_10").show();
			}else if(o.code> -20 && o.code < -10){	//验证码按钮
				$("#error_10_20").html(o.message);
				$("#error_10_20").show();
			}else{
				showMsg(o.message);
			}


			//alert(o.message);
			//showMsg(o.message);
			/*if(o.code>0){
				//$('#email_check_bind').html('等待验证&nbsp;&nbsp;<a href="javascript:void(0);" onclick="check_email_bind()">重新验证</a>');
			}*/
		},
		error:function(){showMsg('服务器通信错误');}
	})
}

//用正则表达式判断是否为Email
function check_email(el){
	var regu = "^(([0-9a-zA-Z]+)|([0-9a-zA-Z]+[_.0-9a-zA-Z-]*[0-9a-zA-Z-]+))@([a-zA-Z0-9-]+[.])+([a-zA-Z]|net|NET|asia|ASIA|com|COM|gov|GOV|mil|MIL|org|ORG|edu|EDU|int|INT|cn|CN|cc|CC)$"
	var re = new RegExp(regu);
	if(el.search(re) != -1){
		return true; //正确
	}
	return false;//非法
}


//发送手机验证码
function send_mobile_checkcode(){
	var mobile_str = $.trim($("#snda_username").val());
	var mobile_num = parseInt(mobile_str);				//手机号码

	if(mobile_str == ''){
		//alert("手机号码不能为空！");
		$("#error_0_10").html("手机号码不能为空");
		$("#error_0_10").show();
		return false;
	}
	if(snda_verify(mobile_num)){
		//alert(mobile_num);
		$.ajax({
			url:"/passport/ajax.php?mod=sdo&act=send_mobile_checkcode",
			data:{mobile_num:mobile_num},
			type:'POST',
			dataType:'json',
			cache:false,
			success:function(o){


				if(o.code> 10){
					$("#send_code_info").show();
				}else if(o.code> -10){		//用户名
					//$("#u17_error_info").html(o.message);
					$("#error_0_10").html(o.message);
					$("#error_0_10").show();
				}else if(o.code> -20 && o.code < -10){	//验证码按钮
					$("#error_10_20").html(o.message);
					$("#error_10_20").show();
				}else{
					showMsg(o.message);
				}

			}
		});

	}else{
		$("#error_0_10").html("机号码格式错误！");
		$("#error_0_10").show();
		$("#error_0_10").parent().find("input").addClass("text_false");
		return false;
	}
}

//js判断手机号
function snda_verify(phone){
   // var phone = document.getElementById("mobile").value;
    var tmp = /^13[0-9]{9}$|^15[0|1|2|3|5|6|7|8|9]\d{8}$|^18[0|1|2|3|4|5|6|7|8|9]\d{8}$|^147[0-9]{8}$/;     //支持11位手机号码验证
    var flag=tmp.test(phone);
    if(!flag){
        //alert("手机号输入不合法");
    	return false;
    }else{
		return true;
	}
}

//选择切换注册方式
function snda_switch_display(flag){
	if(flag == 'show'){

		$("#switch").addClass("open");
		$("#phone").html("手机账号");
		$("#mail").html("邮箱账号");
		$("#gexing").html("个性账号");

	}else{

		$("#switch").removeClass("open");
		$("#phone").html("");
		$("#mail").html("");
		$("#gexing").html("");
	}
}

//升级表单选中样式添加、移除功能
function form_cur_style(){
	$("form input").bind("focus",function(){
		$("form input").removeClass("text_curr text_false");
		$(this).removeClass('text_curr text_false');
		$(this).addClass('text_curr');
		$(".false").hide();

		var exists_value = $(this).attr('exists-value');
		if(typeof exists_value!='undefined'&&$(this).val()==exists_value){
			$(this).parent().parent().find(".warn").hide().siblings(".input_info").show();
		}else{
			//console.log($(this).parent().parent().find(".input_info"));
			$(this).parent().parent().find(".input_info").show().next(".warn").show();
		}

	}).bind("blur",function(){
		$(this).removeClass('text_curr text_false');
		$(this).parent().parent().find(".warn,.input_info").hide();
	}).bind("keyup",function(){
		var exists_value = $(this).attr('exists-value');
		if(typeof exists_value!='undefined'&&$(this).val()==exists_value){
			$(this).parent().parent().find(".warn").hide().siblings(".input_info").show();
		}else{
			$(this).parent().parent().find(".input_info").hide().next(".warn").show();
		}
	});
}

//关联绑定输入框默认显示提示语
function input_bind_style(){
	var u17_u = $("#u17_username");
	var u17_p = $("#u17_password");
	var snda_u = $("#snda_username");
	var snda_p = $("#snda_password");
	var u17_username = u17_u.val();
	var u17_password = u17_p.val();
	var snda_username = snda_u.val();
	var snda_password = snda_p.val();
	if(u17_username == ''){
		u17_u.next().show();
	}
	if(u17_password == ''){
		u17_p.next().show();
	}
	if(snda_username == ''){
		snda_u.next().show();
	}
	if(snda_password == ''){
		snda_p.next().show();
	}

	//绑定事件
	$("#content input").bind("focus",function(){
		$(this).addClass('text_curr');

	}).bind("blur",function(){
		$(this).removeClass('text_curr text_false');

	}).bind("keyup",function(event){
		if($(this).val()==''){
			$(this).next().show();
		}else{
			$(this).next().hide();
		}

		if(event.which == 13){
			snda_manual_bind_ajax();
		}
	});

	$("#content input").next().bind("click",function(){
		$(this).siblings().focus();
	})
}

//解除绑定
var bind_flag = 0;
function remove_bind(flag){

	var snda_u_obj = $("#snda_username");
	var snda_p_obj = $("#snda_password");

	var snda_username = $.trim(snda_u_obj.val());
	var snda_password = snda_p_obj.val();

	$(".text_curr").removeClass("text_curr");
	$(".text_false").removeClass("text_false");
	//$(".col_orange").html('&nbsp;');

	if(snda_username == ''){
		$("#snda_error_info").html("请输入用户名。");
		snda_u_obj.addClass("text_false");
		return false;
	}else if(snda_password == ''){
		$("#snda_error_info").html("请输入用密码。");
		snda_p_obj.addClass("text_false");
		return false;
	}
	
	$.ajax({
		url:'/passport/ajax.php?mod=sdo&act=remove_bind',
		data:{snda_username:snda_username,snda_password:snda_password,flag:flag},
		dataType:'json',
		type:'POST',
		cache:false,
		success:function(o){
			//alert(o);
			var html = '您真的要解除绑定吗？ \n\n解除绑定后，旧有妖气帐号仍被保留，可以重新通过升及流程进行升级。';
			
			//var html = '重要提示：旧帐号如果已经被盛大通行证绑定，解除绑定时，有妖气旧帐号会消失，无法再次绑定到其它盛大通行证帐号。旧有妖气帐号将只能联系客服人工找回';
			
			
			if(bind_flag == '0'){
				if(confirm(html)){
					bind_flag++;
					if(bind_flag == '1'){
						remove_bind('del');
					}
					return false;
				}else{
					return false;	
				}
			}
			
			
			//if(o.code> 0){
			$("#snda_error_info").html(o.message);
				//alert(o.message);
			//}
		},
		error:function(){showMsg('服务器通信错误');}
	});
}

//输入U17用户名和密码 解除绑定
function u17_remove_bind(type){
	var type_flag = typeof(type);
	if(type_flag=='undefined'){
		type = 1;
	}
	
	var u17_u = $("#u17_username");
	var u17_p = $("#u17_password");
	
	var u17_username = $.trim(u17_u.val());
	var u17_password = u17_p.val();

	$(".text_curr").removeClass("text_curr");
	$(".text_false").removeClass("text_false");
	//$(".col_orange").html('&nbsp;');

	if(u17_username == ''){
		$("#u17_error_info").html("请输入用户名。");
		u17_u.addClass("text_false");
		return false;
	}else if(u17_password == ''){
		$("#u17_error_info").html("请输入用密码。");
		u17_p.addClass("text_false");
		return false;
	}
	
	if(type == 1){	//第一步询问框
		$.ajax({
			url:'/passport/ajax.php?mod=sdo&act=u17_remove_bind',
			data:{u17_username:u17_username,u17_password:u17_password,type:type},
			dataType:'json',
			type:'POST',
			cache:false,
			success:function(o){
				
				if(o.code>0){
					$(".text_curr").removeClass("text_curr");
					$(".text_false").removeClass("text_false");
					$("#u17_error_info").html('&nbsp;');
					$('.phone_bd').remove();
					$('.phone_pop').remove();
					var newphoneuser_show_dialog = $('<div id="phone_bd" class="phone_pop"></div>');
					$('body').append(newphoneuser_show_dialog);
					var html='<div style="width:auto;min-height:0px;" class="ui-dialog-content">';
					html+='<div class="alert_pop jb_tip2 cf" id="u17_remove_bind_div">';
					html+='<p>您的有妖气账号：<span class="col_red">'+o.u17_username+'</span><br/>';
					if(o.snda_username!='' && o.snda_username!='null'){
						html+='绑定的盛大账号为号：<span class="col_red">'+o.snda_username+'</span>'
					}
					html+='</p>';
					html+='<h4>确定进行解绑</h4>';
					html+='<a href="javascript:;" onclick="u17_remove_bind(\'2\');" class="btn">确定</a>';
					html+='<a href="javascript:;" onclick="$(\'.ui-dialog\').remove();" class="btn cancel">取消</a>';
					html+='</div>';  
					html+='</div>';
					newphoneuser_show_dialog.html(html);
					$('#phone_bd').dialog({width:380,modal:true,title:'账号解绑'}).dialog('autoHeight').dialog('open');
				}else if(o.code>-10){
					
					$("#u17_error_info").html(o.message);
					u17_u.addClass("text_false");
					return false;

				}else{
					
					$("#u17_error_info").html(o.message);
					u17_p.addClass("text_false");
					return false;
				}
				
			},
			error:function(){showMsg('服务器通信错误');}
		});
	
	}else if(type == 2){	//第二步确认解绑
	
		$.ajax({
			url:'/passport/ajax.php?mod=sdo&act=u17_remove_bind',
			data:{u17_username:u17_username,u17_password:u17_password,type:type},
			dataType:'json',
			type:'POST',
			cache:false,
			success:function(o){
				if(o.code>0){	//解绑成功
					$('.ui-dialog').remove();
					showMsg(o.message);
					
					$(function(){
						$(".left").html('进入首页');	
						$(".left").click(function(){
							window.location.href=_cfg_host_base;
						});
					})
					
					u17_u.val('');
					u17_p.val('');
					input_bind_style();
					
					return false;
				}else{
					$('.ui-dialog').remove();
					showMsg(o.message);	
				}
				//alert(o.message);
			},
			error:function(){showMsg('服务器通信错误');}
		});
		
	}else{
		showMsg("数据异常，请刷新重试。");
	}
}







