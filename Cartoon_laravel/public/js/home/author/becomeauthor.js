
$(function () {
   $("#getCode").click(function () {
          var phone = $("input[name=phone]").val();
       var reg=/[a-zA-Z]/g;
       var phone=phone.replace(reg,'');


        if( !(phone.length == 11)){
            alert("请输入11位值");
            return false;
        }

        $.ajax({
            "type":"post",
            "url":"/home/author/verify",
            "data":{
                "phone":phone,
                "_token":$("input[type=hidden]").val(),
            },
            "success":function (data) {
                 if(data){
                     alert('发送成功');
                 } else {
                     alert('发送失败');
                 }

            },
            "error":function () {
                alert('获取失败');
            },
        });



         return false;
   });
});