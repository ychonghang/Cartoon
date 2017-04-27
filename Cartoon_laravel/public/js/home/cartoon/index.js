$(function () {
    $("#chapter").click(function () {
        // if($(this).hasClass("up")){

            $(this).hasClass("up")?$(this).removeClass('up').addClass('down'):$(this).removeClass('down').addClass('up');
            $.ajax({
                "type":"post",
                "url":"/home/cartoon/getall",
                "data":{
                    "id":$("#opus_id").val(),
                    "_token":$("input[name=_token]").val(),
                    "desc":$(this).hasClass("up")?"ASC":"DESC",
                },
                "success":function (data) {
                    $("#ul_section").empty();
                    var li = document.createElement('li');
                    var a = document.createElement('a');
                    if(data.length){
                        for(var i in data){
                            $("#ul_section").append($(li).clone().append($(a).clone().text(data[i].chapternum).attr("href","/home/cartoon/looksection/"+data[i].id)));
                        }
                    }else {
                        $("#ul_section").append($(li).clone().text('当前无章节,请添加').css({margin:"0 auto",float:"none",fontSize:"18px"}));
                    }
                },
                "error":function () {
                    alert('错误');
                },
                "dataType":"json",

            });
    });






})