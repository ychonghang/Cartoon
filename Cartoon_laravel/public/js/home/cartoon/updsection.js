$(function () {
    $("#chapter_id").change(function () {
        $("input[name=name]").val($(this).children(":selected").text());
    });

    $('#del').click(function () {
        $.ajax({
            "type":"post",
            "url":"/home/cartoon/del",
            "data":{
                "_token":$('input[name=_token]').val(),
                "id":$("#chapter_id").val(),
            },
            "success":function (data) {
                  if(data == 1){
                      alert('删除成功');
                      $("#chapter_id").children(":selected").remove();
                      $("#chapter_id").change();

                  } else {
                      alert('删除失败');
                  }
            },

        });
        return false;
    });


});
