<?php

namespace App\Http\Controllers\home\Cartoon;

use App\Common\Info;
use App\Http\Requests\SectionAddRequest;
use App\Http\Requests\SectionUpdRequest;
use App\Model\Admin\Category;
use App\Model\Home\Author\Opus;
use App\Model\Home\Cartoon\Chapter;
use App\Model\Home\Cartoon\ChapterImg;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Validator;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //
//    漫画详情页面
    function detail($id){
        $user = 8;
        $opus = Opus::find($id);

//        是否有漫画
        if(empty($opus)){
            return redirect()->back()->withErrors(['error'=>'无该作品信息']);
        }

        $info = new Info;
//        分解题材字符串
        $theme = explode(',',trim($opus->theme_ids,','));
        $user_group = $opus->user_group_id;  //读取用户群
        $cartoon_type = $opus->cartoon_type_id;  //漫画类型
        array_unshift($theme,$user_group);  //  把用户群放入题材里
        array_push($theme,$cartoon_type);  //把漫画类型放入题材
//        查询出id存在与theme变量里的数据
        $cType = Category::whereIn('id',$theme)->get();
        $classify = [];
//        数据不为空
        if(!empty($cType)){
            foreach ($cType as $k => $v){
//                如果等级为0就是漫画类型  把值赋给$type
                if($v->rank == 0){
                    $type = $v->name;
                    continue;
                }
//               如果为1就是用户组  放入到$classify变量里
                if($v->rank == 1){
                    array_unshift($classify,$v->name);
                    continue;
                }

//                其余就按顺序放入数组
                $classify[] = $v->name;


            }
        }

        $chapter = Chapter::where('opus_id',$opus->id)->get();

//                       1、作品  2、公共info  3、用户id  4、分类里  5、漫画类型  6、用户群+题材  \\7、所有章节
        return view('/home/Cartoon/index',compact('opus','info','user','cType','type','classify','chapter'));
    }

//    添加章节页面
    function addSection($id){
        $opus = Opus::select("name")->find($id);
        $name = $opus->name;
        return view('home.cartoon.addsection',compact('name','id'));
    }

//  add添加章节数据
    function add(SectionAddRequest $request){

//        验证错误消息
        $messages = array(
            "imagepath.image" => Info::info("图片格式不合法","notice_info"),
            "imagepath.dimensions" => Info::info("图片最大上限为800","notice_info"),
        );
//        验证规则
        $rules = array(
            "imagepath" => "image|dimensions:max_width=800",
        );

//        把传来的图片数组进行循环验证
        foreach ($request->imagepath as $k => $v){
//            弄成一个file一样的表单，如name=imagepath值为数组里的一个图片文件$v
            $file = ['imagepath' => $v];
//            验证
            $validator = Validator::make($file,$rules,$messages);
//            如果验证不通过
            if($validator->fails()){
//                返回上一个页面，并返回错误信息
                return redirect()->back()->withErrors($validator);
            }
        }

//        1.用获取作品id进行查询
        $opus = Opus::find($request->id);

        try{
            DB::beginTransaction();
//           添加章节名、作品id、第几章
            $chapter = new Chapter();
            $chapter->chapternum = $request->name;
            $chapter->opus_id = $request->id;
//            count返回原先有多少章节,不包含这次新加的
            $chapter->tochapter = count($chapter->where('opus_id',$opus->id)->get());
            $chapter->save();

            $insertList = [];
//            上传图片变转成插入sql语句的参数
            foreach ($request->imagepath as $k => $v){

//                图片文件、用户id、作品id、章节id
                $name = $this->addImg($v,$opus->user_id ,$request->id,$chapter->id);
                if(!is_string($name)){
                    DB::rollback();
                    return redirect()->back()->withErrors(['uperror'=>'上传图片失败']);
                }
                $newImg = ['imgname' => $name, 'order' => $k,'chapter_id' =>$chapter->id];
                $insertList[] = $newImg;
            }

           $result =  DB::table('chapterimgs')->insert($insertList);

           if($result){
               DB::commit();
               return redirect('/home/cartoon/index/'.$request->id);
           }


            //            删除该路径的文件夹
            $info = new Info;
            //        获取章节文件夹     1.用户id  2.作品id  3.章节id
           $filePath = $info->getChapterFile($opus->user_id,$request->id,$chapter->id);
           Storage::disk('uploads')->deleteDirectory($filePath);
           DB::rollback();
           return redirect()->back()->withErrors(['uperror'=>'添加图片失败']);


        }catch (Exception $e){
            DB::rollback();
        }


        return redirect()->back()->withErrors(['uperror'=>'添加章节失败']);


    }


//    ajax获取作品所有章节
    function getChapter(Request $request)
    {
            $opus_id = $request->id;
            $order = $request->desc;
            $chapter = Chapter::where('opus_id',$opus_id)->orderBy('tochapter',$order)->get();
            return response()->json($chapter);

    }




    /***
     * 1.$file        图片文件
     * 2.$id          用户id
     * 3.$opus    作品id
     * 4.$chapter  章节id
     *
     *
    */
    function addImg($file,$id,$opus,$chapter)
    {
        //        判断文件是否上传
        if(!empty($file)){
            if($file->isValid())
            {

//         文件扩展名
                $ext = $file->getClientOriginalExtension();

//        文件的临时路径
                $realpath = $file->getRealPath();

                //        获取时间
                $time = time();

//        生成文件名   (用户id+作品id+章节id)_time()_uniqid组成
                $fileName = ($id+$opus+$chapter).'_'.$time.'_'.uniqid().'.'.$ext;

                //        章节图片存放路径  用户id/(用户id+作品id)/(用户id+章节id)
                $filePath =$id.'/'.($id+$opus).'/'.($id+$chapter).'/';

//            把文件存到指定的位置
                $bool = Storage::disk('uploads')->put($filePath.$fileName,file_get_contents($realpath));

                //            如果输出到指定位置成功提交
                if($bool)
                {
//                        保存新图片名
                    return $fileName;


                } else {
                    return false;
                }

            } else {
                return false;
            }
        }

        return false;
    }

//  查看章节内容
    function lookSection($id){
//      获取章节名， 和作品名
        $chapter = Chapter::join('opuses','chapters.opus_id','opuses.id')
            ->select('chapternum','user_id','opus_id','name','chapters.id')
            ->where('chapters.id',$id)->first();

        if(empty($chapter)){
            return redirect()->back();
        }

        $pre = Chapter::where("id","<",$id)->where('opus_id',$chapter->opus_id)->max('id');
        $next = Chapter::where("id",">",$id)->where('opus_id',$chapter->opus_id)->min('id');

        $chapterImg = ChapterImg::where('chapter_id',$id)->orderBy('order','ASC')->get();
        $info = new Info;
        //        获取章节文件夹     1.用户id  2.作品id  3.章节id
        $imgpath =  $info->getChapterFile($chapter->user_id,$chapter->opus_id,$chapter->id);
        return view('home.Cartoon.sectionpage',compact('chapterImg','chapter','imgpath','pre','next'));
    }

//    修改章节页面
    function updPage($id){
//       获取作品名
        $opus = Opus::select("name")->find($id);
//        查询出所有该作品的章节
        $chapter = Chapter::where("opus_id",$id)->orderBy('id','desc')->get();
        $name = $opus->name;
        if(!count($chapter)){
            return redirect()->back();
        }
        $yi = $chapter->first();


        return view("home.Cartoon.updsection",compact('name','id','chapter','yi'));
    }


//    删除章节
    function delSection(Request $request){
        $id = $request->id;
        try{
            DB::beginTransaction();
            $sectionInfo = Opus::join('chapters','opuses.id','=','chapters.opus_id')
                ->select('opuses.user_id','chapters.opus_id','chapters.id')
                ->where('chapters.id',$id)->first();
            $chapter = Chapter::where('id',$id)->delete();
            $chapterImg = ChapterImg::where('chapter_id',$id)->delete();
            if($chapter && $chapterImg){
                //            删除该路径的文件夹
                $info = new Info;
                //        获取章节文件夹     1.用户id  2.作品id  3.章节id
                $filePath = $info->getChapterFile($sectionInfo->user_id,$sectionInfo->opus_id,$sectionInfo->id);
                Storage::disk('uploads')->deleteDirectory($filePath);

                //        判断该目录下是否有文件如果没有，则删除成功
                $files = Storage::disk('uploads')->files($filePath);
//            如果还有文件则删除失败
                if($files){
                    DB::rollback();
                    return 0;
                }
//            成功提交数据完成删除
                DB::commit();

                return 1;

            }

        }catch (Exception $e){
            DB::rollback();
        }

        return 0;

    }


//    修改章节数据
    function updSection(SectionUpdRequest $request){

        //        验证错误消息
        $messages = array(
            "imagepath.image" => Info::info("图片格式不合法","notice_info"),
            "imagepath.dimensions" => Info::info("图片最大上限为800","notice_info"),
        );
//        验证规则
        $rules = array(
            "imagepath" => "image|dimensions:max_width=800",
        );


        if($request->hasFile('imagepath')){
            //        把传来的图片数组进行循环验证
            foreach ($request->imagepath as $k => $v){
//            弄成一个file一样的表单，如name=imagepath值为数组里的一个图片文件$v
                $file = ['imagepath' => $v];
//            验证
                $validator = Validator::make($file,$rules,$messages);
//            如果验证不通过
                if($validator->fails()){
//                返回上一个页面，并返回错误信息
                    return redirect()->back()->withErrors($validator);
                }
            }
        }



//        1.用作品id查询该作品信息
        $opus = Opus::find($request->id);
        $chapterimg = ChapterImg::select('imgname')->where('chapter_id',$request->chapter_id)->get();
        $imgNames = [];
        if(!empty($chapterimg)){
            foreach ($chapterimg as $v){
                $imgNames[] = $v->imgname;
            }
        }

        $info = new Info;

        try{
            DB::beginTransaction();
//           修改章节名、第几章
            $chapter = Chapter::find($request->chapter_id);
            $chapter->chapternum = $request->name;
            $chapter->save();

            if($request->hasFile('imagepath')){
                $isSuccess = ChapterImg::where('chapter_id',$request->chapter_id)->delete();
                if(!$isSuccess){
                    DB::rollback();
                    return redirect()->back()->withErrors(['uperror'=>'修改图片失败']);
                }
                $insertList = [];
//            上传图片变转成插入sql语句的参数
                foreach ($request->imagepath as $k => $v){

//                图片文件、用户id、作品id、章节id
                    $name = $this->addImg($v,$opus->user_id ,$request->id,$chapter->id);
                    if(!is_string($name)){
                        DB::rollback();
                        return redirect()->back()->withErrors(['uperror'=>'上传图片失败']);
                    }
                    $newImg = ['imgname' => $name, 'order' => $k,'chapter_id' =>$chapter->id];
                    $insertList[] = $newImg;
                }

                $result =  DB::table('chapterimgs')->insert($insertList);
                //        获取章节文件夹     1.用户id  2.作品id  3.章节id
                $filePath = $info->getChapterFile($opus->user_id,$request->id,$chapter->id);

                if($result){
                    DB::commit();
                    for ($i =0;$i < count($imgNames); $i++){
                        $abc = Storage::disk('uploads')->delete($filePath.$imgNames[$i]);
                    }

                    return redirect('/home/cartoon/index/'.$request->id);
                }

                //            删除该路径的文件夹
                Storage::disk('uploads')->deleteDirectory($filePath);
                DB::rollback();
                return redirect()->back()->withErrors(['uperror'=>'修改图片失败']);
            } else {
                DB::commit();
                return redirect('/home/cartoon/index/'.$request->id);
            }



        }catch (Exception $e){
            DB::rollback();
        }


        return redirect()->back()->withErrors(['uperror'=>'修改章节失败']);
    }



}
