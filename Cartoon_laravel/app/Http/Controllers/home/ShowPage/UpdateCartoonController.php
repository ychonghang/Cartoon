<?php

namespace App\Http\Controllers\home\ShowPage;


use App\Common\Info;
use App\Common\REST;
use App\Model\Home\Cartoon\Chapter;
use App\Model\Home\Cartoon\ChapterImg;
use App\Model\Home\ShowPage\OpusComment;
use App\Model\Home\ShowPage\Reply;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;



class UpdateCartoonController extends Controller
{
    //
    function updateCartoon()
    {
        return view('home.showPage.updatecartoon');
    }

//    ajax获取更新数据
    function getChapterData(Request $request)
    {

        $chapter = Chapter::join('opuses','opuses.id','=','chapters.opus_id')
                        ->select('imagepath','opuses.user_id','opuses.id')
            //            作品审核已通过
                        ->where('opuses.adopt',1)
            //            作品已上架
                        ->where('opuses.display',0)
            //            作品已发表
                        ->where('opuses.publish',1)
            //            章节审核通过
                        ->where('chapters.adopt',1)
//                        修改时间升序
                        ->orderBy('chapters.updated_at','desc')
                        ->groupBy('opuses.id','opuses.user_id','imagepath')
                        ->offset($request->num)
                        ->limit(10)
                        ->get();
        $info = new Info;
        $imgs = [];

        if(count($chapter)){
            foreach ($chapter as $v){
//                拼接图片路径，和传送作品id
                $imgs[] = ['src' => '/'.$info->getCoverImg($v->user_id,
                    $v->id,$v->imagepath),'id' => $v->id];
            }
        }
//        dd(response()->json(['img' => $imgs]));
        return response()->json(['img' => $imgs]);
    }

//    获取章节内容
    function readSection($id)
    {
        //      获取章节名， 和作品名
        $chapter = Chapter::join('opuses','chapters.opus_id','opuses.id')
            ->select('chapternum','user_id','opus_id','name','chapters.id','chapters.updated_at')
            ->where('chapters.id',$id)->first();

        if(empty($chapter)){
            return redirect()->back();
        }

        $pre = Chapter::where("id","<",$id)->where('opus_id',$chapter->opus_id)->max('id');
        $next = Chapter::where("id",">",$id)->where('opus_id',$chapter->opus_id)->min('id');

        $chapterImg = ChapterImg::where('chapter_id',$id)->orderBy('order','ASC')->get();
        $info = new Info;

//        获取用户名
        $userName = DB::table('users')->select('name')->where('id',$chapter->user_id)->first();
        //        获取章节文件夹     1.用户id  2.作品id  3.章节id
        $imgpath =  $info->getChapterFile($chapter->user_id,$chapter->opus_id,$chapter->id);
        return view('home.showPage.sectionpage',compact('chapterImg','chapter','imgpath','pre','next','userName'));
    }

//    ajax发送评论
    function sendComment(Request $request)
    {
        $user_id = $request->input('userId','');
        $opus_id = $request->input('opusId','');
        $content = $request->input('contentstr','');
//        如果有一个是空就返回0
        if(empty($user_id) || empty($opus_id) || empty($content)){
            return response()->json([0]);
        }

//        保存评论信息
        $opusComment = new OpusComment();
        $opusComment->user_id = $user_id;   //用户id
        $opusComment->opus_id = $opus_id;   //作品id
        $opusComment->content = $content;   //评论内容
        $opusComment->storey = count($opusComment->where('opus_id',$opus_id)->get());
        $bool = $opusComment->save();

        if($bool){
//            用户名称
           $userName = DB::table('users')->select('name')->where('id',$user_id)->first();
//           图片信息
           $imgPath = "/image/home/showpage/topimg.jpg";

//           评论创建时间
         $date = date('Y-m-d H:i',time($opusComment->created_at));

//         评论几楼
         $storey = $opusComment->storey;

         return response()->json(['name' => $userName->name,'imgPath' => $imgPath,'date' => $date,'storey' => ($storey+1),
                'content' => $content,'user_id'=> $user_id]);


        }
        return response()->json([0]);
    }


//   ajax获取评论
    function getComment(Request $request)
    {
        $lisum = $request->linum;
        $opusId = $request->opusId;

        $opuscomment = OpusComment::join('users','users.id','=','opus_comments.user_id')
            ->select('users.name','content','storey','created_at','opus_comments.id','user_id')
            ->where('opus_id',$opusId)
            ->orderBy('created_at','desc')
            ->offset($lisum)
            ->limit(10)
            ->get();

        //        获取回复评论信息
        $reply = Reply::join('users','users.id','=','replys.user_id')->select('replys.content','users.name',
            "replys.created_at",'replys.touser_id','replys.storey')->where('opus_id',$opusId)
            ->orderBy('replys.created_at','ASC')->get();

        if(empty($opuscomment) || empty($reply)){
            return response()->json([0]);
        }

        //           评论创建时间
//        $date = date('Y-m-d H-i',time($opuscomment->created_at));
//
//        $imgPath = "/image/home/showpage/topimg.jpg";

        return response()->json([$opuscomment,$reply]);

    }





//   回复评论
    function replyMessage(Request $request)
    {
        $userId = $request->input('userId','');
        $toUserId = $request->input('touserId','');
        $opusId = $request->input('opusId','');
        $content = $request->input('replycontent','');
        $storey = $request->input('storey','');

//        如果有空值就返回错误
        if(empty($userId) || empty($toUserId) || empty($opusId) || empty($content)){
            return response()->json([0]);
        }

//        进行数据添加
        $reply = new Reply();
        $reply->user_id = $userId;
        $reply->touser_id = $toUserId;
        $reply->content = $content;
        $reply->opus_id = $opusId;
        $reply->storey = $storey;

        $bool = $reply->save();

//        查询用户的name
        $userName = DB::table('users')->whereIn("id",[$userId,$toUserId])->pluck('name','id');

//        查询被回复用户


        if($bool){
            return response()->json(['userId' => $userId,'toUserId' => $toUserId,'opusId' => $opusId,'content' => $content
                    ,'userNames' => $userName,'date' => date('Y-m-d H:i:s',time($reply->created_at)),'storey' => $storey]);
        }


    }


}
