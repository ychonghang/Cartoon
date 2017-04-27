
$(function () {
      $("button[name=publish]").click(function () {

          $.ajax({
              type:"POST",
              url:"/home/author/Publish",
              data:{
                  "_token":$("input[name=_token]").val(),
                  "publish":$(this).attr('publish'),
              },
              success:function (data) {
                  publishChange(data.id,data.publish);
              },
              error:function () {
                  alert('修改失败');
              },
              dataType:'json',
          });

      });


      //修改发表状态
      function publishChange(id,publish) {
          if(publish){
              $(" button[publish="+id+"]").text('取消发表');
          } else {
              $(" button[publish="+id+"]").text('发表');
          }
      }


})