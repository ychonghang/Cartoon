$(function () {
   // 在文本框抬起键盘时触发
   $("#textInfo").keyup(function () {
        //获取文字的数量
       var len = $("#textInfo").val().length;

       // 根据输入的文字改变字数
       $(".btn-content-text").text("输入字数"+len+"/200字");

       if(len > 200){
           $("#sendbtn").addClass("send-txt-ccc");
       } else{
           $("#sendbtn").removeClass("send-txt-ccc");
       }
   });

    //发评论
    $("#sendbtn").click(function () {
        if(!$("#sendbtn").hasClass("send-txt-ccc")){
            var len = $("#textInfo").val().length;
            if(len <= 0){
                alert('评论内容不能为空');
                return;
            }
        // *     userId    用户id
        //     *   route     路由
        //     *   opusId    作品id
        //     *   content   评论内容
        //     *
        //     *   succcess  成功函数
        //     *   error     失败函数
        //    取9号用户测试
            var opusId = $("input[type=hidden]").eq(1).val();
            var content = $("#textInfo").val();
            sendData(9,"/home/showpage/sendcomment",opusId,content,function (data) {
                    if(data == 0){
                        alert('评论失败');
                        return;
                    }

                    var datas = eval(data);
                    createLi(datas.imgPath,datas.storey,datas.name,datas.date,datas.content,true,datas.user_id,[]);
                    $("#textInfo").val("");
            },function () {
                alert("评论失败");
            });

        }
    });

    //滚动掉到底时,刷出评论信息
    $(window).scroll(function () {
        //  滚动条滚动的高度
        var scrollTop = $(document).scrollTop();
        //返回评论上的元素部分的到文档的顶部高度
        var dheight = $(document).height()-$("#contentInfo").height();

        //整个文档的高度
        var maxHeight = $(document).height();

        //屏幕的高度
        var pmheight = $(window).height();

        if((scrollTop + pmheight) > (maxHeight - 50))
        {
            // alert('你好');
            layComment();
        }

    });





//    点击回复显示输入框
    $(document).on('click','a[replytag=reply]',function (e) {
        // var en = e || window.event;
        // en.stopPropagation();
        $btn = $(this).parent().parent().parent().children(".self");
        if($(".reply").length){
            $(".reply").remove();
            // $btn.children(".reply").remove();
            replyInput($btn);
        } else{
            replyInput($btn);
        }
    });

    //   文本域  按键抬起事件
    $(document).on('keyup','#replyInfo',function () {
        var len = $(this).val().length;
        // 根据输入的文字改变字数
        $(".btn-content-text").text("输入字数"+len+"/200字");

        if(len > 200){
            $("#replybtn").addClass("send-txt-ccc");
        } else{
            $("#replybtn").removeClass("send-txt-ccc");
        }
    });




});


   /*
   *     回复单击显示输入框
   *        
   * */
   function replyInput($e) {
       //1级  回复输入框总框
       var totalDiv = document.createElement("div");
       $(totalDiv).addClass("reply");

   //    2级  包裹输入框div
       var wrapDiv = document.createElement('div');

   //    3级  输入框
       var textInput = document.createElement('textarea');
       $(textInput).attr('id','replyInfo');
       $(textInput).addClass('textInfo');

//------------包裹输入框
       $(wrapDiv).append(textInput);


   //   2级 包裹按钮与记数标签
       var wrapDivTag = document.createElement('div');
       $(wrapDivTag).addClass("btn-content");

   //   3级 显示输入数
       var span = document.createElement('span');
       $(span).addClass('btn-content-text reply');
       $(span).text("还可以输入200字");

   //    3级  回复按钮
       var replyBtn = document.createElement("button");
       $(replyBtn).attr('id','replybtn');
       $(replyBtn).addClass('send-txt');
       $(replyBtn).text('回复');


   //    3级   取消按钮
       var cancelBtn = document.createElement('button');
       $(cancelBtn).addClass('send-txt');
       $(cancelBtn).attr('id','cancelbtn');
       $(cancelBtn).text('取消');

//--------包裹回复按钮与显示计数标签
       $(wrapDivTag).append(span);
       $(wrapDivTag).append(replyBtn);
       $(wrapDivTag).append(cancelBtn);




//---------------总框包裹文件
       $(totalDiv).append(wrapDiv);
       $(totalDiv).append(wrapDivTag);


       //根据点击回复，把输入框放入到到内容div内
       $e.append(totalDiv);

       $(textInput).focus();
       // $(textInput).focusout(function () {
       //      setTimeout(function () {
       //          $(textInput).parent().parent().remove();
       //      },1000);
       // });






   }

  //   回复评论之取消按钮事件
  $(document).on('click',"#cancelbtn",function () {
     $(this).parent().parent().remove();
  });

//   回复评论时，回复按钮实践
  $(document).on('click',"#replybtn",function () {

        if($(this).hasClass("send-txt-ccc")){
            return;
        }

        if($("#replyInfo").val().length <= 0){
             alert("回复内容不能为空");
             return;
        }



        //被回复用户id
        var toUser = $("div[class=reply]").parentsUntil("li").parent().children(":first").children('img[u]').attr('u');

        //作品id
        var opusId = $("input[type=hidden]").eq(1).val();

        //回复内容
        var content = $("#replyInfo").val();

      //  获取回复楼层
        var storey = $(this).parentsUntil("li").parent().children(":first").children("div").text();
        //去除楼层里的数字
        var reg=/[\u4E00-\u9FA5]/g;
        // 别忘了减一,因为我遍历页面时是给楼层加1的
        var storey=storey.replace(reg,'');


      sendReply(8,toUser,"/home/showpage/replymessage",opusId,content,function (data) {
          if(data == 0){
              alert("回复失败");
              return;
          }
          var datas = eval(data);


          //获取到该区域的comment-content类名的div
          var parent = $("#replybtn").parentsUntil("li").parent().children(".comment-content");

          //执行自定义函数，追加回复框
          replyFrame(parent,datas.userNames[datas.userId],datas.date,datas.content,datas.user_id);

          $("div[class=reply]").remove();
      },function () {
          alert('回复失败');
      },(storey-1));

  });



  /*
  *   回复框
  *   parent            父元素
  *   userName          回复用户名
  *   date              回复时间
  *   content           回复内容
  *   userid            用户id
   *
  * */

  function replyFrame(parent,userName,date,content,userid) {
        //1级   包裹回复总信息div
        var otherDiv = document.createElement('div');
        $(otherDiv).addClass("inputcontent other");

        //2级   包裹姓名与时间
        var span = document.createElement('span');
        $(span).text('的回复');

  //      3级  姓名标签
         var nameA = document.createElement('a');
         $(nameA).text(userName).attr('r',userid);



  //       3级   时间
         var dateI = document.createElement('i');
         $(dateI).text(date);

  //----------包裹姓名与日期
        $(span).prepend(nameA);
        $(span).append(dateI);



  //----------用总框包裹内容
      $(otherDiv).append(span).append(content);



      parent.append(otherDiv);



  }















/*
*     ajax 发送评论
*     userId    用户id
  *   route     路由
  *   opusId    作品id
  *   content   评论内容
  *
  *   succcess  成功函数
  *   error     失败函数
* */

    function sendData(userId,route,opusId,content,succcess,error) {
        $.ajax({
            "type":"post",
            "url":route,
            "data":{
                "_token":$("input[name=_token]").val(),
                "userId":userId,
                "opusId":opusId,
                "contentstr":content,
            },
            "success":succcess,
            "error":error,
            "dataType":"json",
        });
    }






/*
*    评论框结构
*    li框
*    pimg        图片路径
*    pstorey     楼层数
*    pname       评论用户名
*    pdate       时间
*    pcontent    评论内容
*    is_bool     true标签前面追加,false后面追加
*    user_id     评论用户id
*    replys       回复数据
* */
    function createLi(pimg,pstorey,pname,pdate,pcontent,is_bool,user_id,replys) {
       // 0级 创建li元素
       var li = document.createElement('li');
       $(li).addClass('clear');

    //  1级 创建包含‘头像’与‘楼层’的div
        var wrapDiv = document.createElement('div');
        $(wrapDiv).addClass('topimg-area');

    // 2级   创建头像img
        var img = document.createElement('img');
        $(img).attr('src',pimg);
        $(img).attr('u',user_id);

    // 2级   创建div存放楼层
        var storeyDiv = document.createElement('div');
        $(storeyDiv).text("第"+pstorey+"楼");

//---------------包裹头像与楼层
        $(wrapDiv).append(img);
        $(wrapDiv).append(storeyDiv);
        // ↑头像div已好


        //1级 主内容区
        var contentDiv = document.createElement('div');
        $(contentDiv).addClass("comment-content clear");

        //2级 内容上部区
        var contentTop = document.createElement('div');
        $(contentTop).addClass('comment-title clear');

        //3级 姓名时间区
        var nameDate = document.createElement('dt');
        $(nameDate).addClass('dt-left');

        //4级 姓名
        var nameA = document.createElement('a');
        $(nameA).text(pname);


        //4级 时间
        var dateI = document.createElement('i');
        $(dateI).text(pdate);

//----------------包裹姓名与时间
        $(nameDate).append(nameA);
        $(nameDate).append(dateI);


        //3级  回复按钮区
        var reply = document.createElement('dd');
        $(reply).addClass('dd-right');

        //4级  回复
        var replyA = document.createElement('a');
        $(replyA).text('回复').attr('replytag',"reply").attr("href","javascript:;");


//-------------包裹回复
        $(reply).append(replyA);


//-------------------包裹所有上部内容
        $(contentTop).append(nameDate);
        $(contentTop).append(reply);


        //2级  评论内容区
        var commentContent = document.createElement('div');
        $(commentContent).addClass('inputcontent self');
        $(commentContent).text(pcontent);



//------------------包裹主内容里的所有内容
        $(contentDiv).append(contentTop);
        $(contentDiv).append(commentContent);

        if(replys.length > 0){
            for(var i in replys){
                //判断回复表里的楼层数与被回复用户id  与 评论表里的楼层数与评论用户id是否一致
                if(replys[i].storey == pstorey && replys[i].touser_id == user_id){
                    replyFrame($(contentDiv),replys[i].name,replys[i].created_at,replys[i].content,replys[i].userid)
                }
            }
        }



//-----------包裹所有评论内容
        $(li).append(wrapDiv);
        $(li).append(contentDiv);



        // 测试样品
        if(is_bool){
            $("#contentInfo").prepend(li);
        } else {
            $("#contentInfo").append(li);
        }



    }






    /*
    *
    *    发送信息,接收数据
    *    linum           li的数量
    *    route           路由
    *
    *    success         成功函数
    *    error           错误函数
    *
    * */
    function loadData(linum,route,success,error)
    {
        $.ajax({
            "type":"post",
            "url":route,
            "data":{
                "linum":linum,
                "opusId":$("input[type=hidden]").eq(1).val(),
                "_token":$("input[name=_token]").val(),
            },
            "success":success,
            "error":error,
            "dataType":"json",
            "async":false,
        });
    }





 /*
    *    评论瀑布
    *
    *
    * */

    function layComment() {
        //li个数
        var linum = $("#contentInfo").children("li").length;
        loadData(linum,"/home/showpage/getComment",function (data) {
              // alert(data);
                if(data[0] == 0){
                    return;
                }
              var datas = eval(data[0]);

              //  表单
              var datasOne = eval(data[1])

              for(var i in datas){
                  createLi("/image/home/showpage/topimg.jpg",(datas[i].storey+1),datas[i].name,datas[i].created_at,datas[i].content,false,datas[i].user_id,datasOne);
              }
        },function () {
            alert('获取失败');
        });
    }




    /*
    *   回复评论函数
    *   userId       用户id
    *   toUserId     被回复用户id    $(".topimg-area").children('img[u]').attr('u')
    *   route        路由  "/home/showpage/replymessage"
    *   opusId       作品id  $("input[type=hidden]").eq(1).val()
    *   content      回复内容
    *   seccuss      成功处理
    *   error        错误处理
    *
    *
    * */
    function sendReply(userId,toUserId,route,opusId,content,success,error,storey) {
        $.ajax({
            "type":"post",
            "url":route,
            "data":{
                "_token":$("input[name=_token]").val(),
                "touserId":toUserId,  //获取被回复者id
                "opusId":opusId,  //作品id
                "userId":userId,
                "replycontent":content,
                "storey":storey,
            },
            "success":success,
            "error":error,
            "dataType":"json",
        });
    }



