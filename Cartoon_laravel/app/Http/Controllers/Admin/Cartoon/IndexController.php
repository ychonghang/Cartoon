<?php

namespace App\Http\Controllers\Admin\Cartoon;

use App\Common\Info;
use App\Model\Home\Author\Opus;
use App\Model\Home\Cartoon\Chapter;
use App\Model\Home\Cartoon\ChapterImg;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class IndexController extends Controller
{
    //
//    漫画管理中心页面
    function index(Request $request){
        $search = $request->input('search','');
        $rank = $request->input('rank','');
        $sql = [
            '' => '',
            1 => '`display` = 0 and',
            '`display` = 1 and',
            '`adopt` = 1 and',
            '`adopt` = 2 and',
            '`adopt` = 0 and',
        ];

        $opus = Opus::join('users','users.id','=','opuses.user_id')
            ->select('users.id as user_id','opuses.id as opus_id','imagepath','opuses.name as opuses_name','users.name as users_name','adopt','create_schedule'
            ,'opuses.display')
//            如果发表
            ->where('publish',1)
//            根据漫画名与作者昵称搜索
            ->whereRaw($sql[$rank]." (`opuses`.`name` like '%".$search."%' or `users`.`name` like '%".$search."%')")
            ->orderBy('created_at','desc')->paginate(2);
//        dd($opus);
        $info = new Info;
        return view('admin.cartoon.index',compact('opus','info','search','rank'));
    }


//    更改审核
    function isAdopt(Request $request)
    {
//        作品id
        $id = $request->id;
//        接受指令   是通过，还是不通过
        $isAdopt = $request->isAdopt;
//        查询作品
        $opus = Opus::find($id);

        switch ($isAdopt){
            case 1:$opus->adopt = 1; break;
            case 0:$opus->adopt = 2; break;
            default: $opus->adopt = 0; break;
        }
        $result = $opus->save();

        if($result){
            return response()->json([$opus->adopt,$id]);
        } else {
            return response()->json([0,$id]);
        }
    }

//    是否上下架
    function isRack(Request $request){
//        获取作品id
        $id = $request->id;
//        接受上下架操作
        $isRack = $request->isRack;
        $opus = Opus::find($id);
        switch ($isRack){
            case 0:
//                1下架
                $opus->display = 1;
                break;
            case 1:
//                上架
                $opus->display = 0;
                break;
        }
        $result = $opus->save();

        if($request){
            return response()->json([$opus->display,$id]);
        } else {
            return response()->json([3,$id]);
        }

    }

//    删除作品
    function delOpus($id)
    {
        DB::beginTransaction();
//        作品表
        $result = Opus::where('id',$id)->first();


//        所有的章节id
        $chapter_id = Chapter::select('id')->where('opus_id',$result->id)->get();


        $value = [];
//        如果章节id不为空
        if(count($chapter_id)){

            foreach ($chapter_id as $v){
                $value[] = $v->id;
            }


//          删除章节图片
            $delImg = ChapterImg::whereIn('chapter_id',$value)->delete();

            if($delImg){
                $chapters = Chapter::where('opus_id',$id)->delete();
//                删除章节
                if($chapters){
//                    删除作品
                   $opus = $result->delete();

                    if($opus){
//                        如果全部删除成功
//                       ($result->user_id,$result->id);
//
                       if($this->delAllFile($result->user_id,$result->id)){
                           DB::commit();
                           return redirect('/admin/cartoon/index');
                       } else {
                           DB::rollBack();
                           return redirect()->back()->withErrors(['uperror' => '删除失败']);
                       }

                   }
                }
            }
        } else {
//            获取用户id和作品id
            $user_id = $result->user_id;
            $opus_id = $result->id;
            $delOpus = $result->delete();

            if($delOpus){
                if($this->delAllFile($user_id ,$opus_id)){
                    DB::commit();
                    return redirect('/admin/cartoon/index');
                } else {
                    DB::rollBack();
                    return redirect()->back()->withErrors(['uperror' => '删除失败']);
                }
            }

        }

        DB::rollBack();
        return redirect()->back()->withErrors(['uperror' => '删除失败']);


    }


//    //删除所有作品文件
    function delAllFile($user_id,$opus_id)
    {
        $info = new Info;

        $filePath = $info->getFile($user_id,$opus_id);

        Storage::disk('uploads')->deleteDirectory($filePath);

        $files = Storage::disk('uploads')->files($filePath);

        if($files){
            return false;
        }

        return true;
    }


//    章节管理中心
    function sectionManage(Request $request)
    {
        $search = $request->input('search','');
//        查询漫画名、漫画封面、审核状态、第几章、章节名

        $rank = $request->input('rank','');

        $sql = [
            '' => '',
            1 => '`chapters`.`adopt` = 0 and',
            '`chapters`.`adopt` = 1 and',
            '`chapters`.`adopt` = 2 and',

        ];


        $chapter = Chapter::join('opuses','opuses.id','=','chapters.opus_id')
                    ->select('opus_id','chapternum','tochapter','chapters.adopt as chapters_adopt',
                        'user_id','name','imagepath','chapters.id')
                    ->where('opuses.adopt',1)
                    ->where('opuses.publish',1)
                    ->whereRaw($sql[$rank]." (`opuses`.`name` like '%".$search."%' or `chapters`.`chapternum` like '%".$search."%')")
                    ->orderBy('chapters.created_at','desc')
                    ->paginate(2);
        $info = new Info();
        return view('admin.cartoon.section',compact('chapter','info','search','rank'));
    }

//    ajax章节审查通过率
    function sectionRack(Request $request)
    {
//        章节id
        $id = $request->id;
        $chapters = Chapter::find($id);

//        根据是否通过，来修改

        $chapters->adopt = $request->isAdopt;

        $chapters->save();

        return response()->json([$chapters->adopt,$id]);
    }

//    删除章节
    function delSection($id)
    {
//        开启事务
        DB::beginTransaction();
        try{
//            章节信息
            $chapter = Chapter::where('id',$id)->first();
//            获取作品id、用户id
            $opus = Opus::select('id','user_id')->find($chapter->opus_id);

//            删除章节图片
            $delImg = ChapterImg::where('chapter_id',$chapter->id)->delete();
            if($delImg){
//                删除作品
                if($chapter->delete()){
                     $delFile = $this->delSectionFile($opus->user_id,$opus->id,$chapter->id);

//                     如果章节文件夹删除成功，就提交删除数据的信息,不然就不删除
                     if($delFile){
                         DB::commit();
                         return redirect('/admin/cartoon/section');
                     } else {
                         DB::rollBack();
                         return redirect()->back()->withErrors(['uperror' => '删除失败']);
                     }

                }
            }


        }catch (Exception $e){
            DB::rollBack();
        }
        DB::rollBack();
        return redirect()->back()->withErrors(['uperror' => '删除失败']);
    }



//    删除章节文件
        function delSectionFile($user,$opus,$chapter)
        {
            $info = new Info;
            //        获取章节文件夹     1.用户id  2.作品id  3.章节id
            $chapterPath = $info->getChapterFile($user,$opus,$chapter);

//            删除章节文件夹
            Storage::disk('uploads')->deleteDirectory($chapterPath);

            $files = Storage::disk('uploads')->files($chapterPath);

            if($files){
                return false;
            }

            return true;
        }


//

}

