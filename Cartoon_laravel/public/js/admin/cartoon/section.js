
$(function () {

    //审核
    $("button[adopt]").click(function () {
         //获取要操作的指令
         var adopt = $(this).attr("adopt");
         var isAdopt = 0;
         if(adopt == "yes"){
             isAdopt = 1;
         } else {
             isAdopt = 2;
         }

         var chapters_id = $(this).parent().parent().children(":first")
             .children("input[type=hidden]").val();



         $.ajax({
             "type":"post",
             "url":"/admin/cartoon/sectionrack",
             "data":{
                 "id":chapters_id,
                 "isAdopt":isAdopt,
                 "_token":$("input[name=_token]").val(),
             },
             "success":function (data) {
                    switch (data[0]){
                        case "1":
                            $("input[type=hidden][value="+data[1]+"]").parent().parent()
                                .children(".handle").children("button[adopt]").remove();

                            $("input[type=hidden][value="+data[1]+"]").parent().parent()
                                .children(".adopt").text("通过");
                            break;
                        case "2":
                            $("input[type=hidden][value="+data[1]+"]").parent().parent()
                                .children(".handle").children("button[adopt]").remove();
                            $("input[type=hidden][value="+data[1]+"]").parent().parent()
                                .children(".adopt").text("不通过");
                            break;
                    }
             },
             "error":function () {
                  alert("修改错误");
             },
         });


    });


});


