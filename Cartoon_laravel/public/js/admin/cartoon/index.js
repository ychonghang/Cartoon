
$(function () {
    //审核是否通过
    $("button[adopt]").click(function () {
           var isAdopt = 0;
           if($(this).attr('adopt') == 'yes'){
               isAdopt = 1;
           } else if($(this).attr('adopt') == 'no') {
               isAdopt = 0;
           }


        var adopt = $(this).parent().parent().children(":first").children("input[type=hidden]").val();
        $.ajax({
            "type":"post",
            "url":"/admin/cartoon/adopt",
            "data":{
                "id":adopt,
                "_token":$("input[name=_token]").val(),
                "isAdopt":isAdopt,
            },
            "success":function (data) {
                    switch(data[0]){
                        case 1:
                            $("input[type=hidden][value="+data[1]+"]").parent().parent().children(".adopt ").text("通过");
                            break;
                        case 2:
                            $("input[type=hidden][value="+data[1]+"]").parent().parent().children(".adopt ").text("不通过");
                            break;
                        default: break
                    }
            },
            "error":function () {
                alert(修改失败);
            },
        });
    });

//    上下架
    $(".rack").click(function () {
        var opus_id = $(this).parent().parent().children(":first").children("input[type=hidden]").val();
        var handle = $(this).val();
        $.ajax({
            "type":"post",
            "url":"/admin/cartoon/israck",
            "data":{
                "id":opus_id,
                "_token":$("input[type=hidden]").val(),
                "isRack":handle,
            },
            "success":function (data) {
                switch (data[0]){
                    case 1:
                        $("input[type=hidden][value="+data[1]+"]").parent().parent().children(".handle")
                            .children(".rack").val(1).text("上架");
                        break;
                    case 0:
                        $("input[type=hidden][value="+data[1]+"]").parent().parent().children(".handle")
                            .children(".rack").val(0).text("下架");
                        break;
                    default: alert("修改错误"); break;

                }
            },
            "error":function () {
                alert("修改错误");
            },
        });

    });
});