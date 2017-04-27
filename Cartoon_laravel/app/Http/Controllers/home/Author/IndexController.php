<?php

namespace App\Http\Controllers\home\Author;

use App\Common\Info;
use App\Http\Requests\CartoonAddRequest;
use App\Http\Requests\CartoonUpdRequest;
use App\Model\Admin\Category;
use App\Model\Home\Author\Opus;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class IndexController extends Controller
{
    //添加漫画页面
    public function addPage()
    {
        $category = Category::get();
        return view('home.author.addcartoon',compact('category'));
    }

//    添加漫画数据
    public function add(CartoonAddRequest $request)
    {
        //        用户id8测试
        $user = 8;

        $file = $request->file('imagepath');
//        判断文件是否上传
        if(empty($file))
            return redirect()->back()->withErrors(['uperror' => '添加漫画失败，请从先上传封面']);

        if(!$file->isValid())
        {
            return redirect()->back()->withErrors(['uperror' => '添加漫画失败，封面上传失败']);
        }



//        把题材进行处理，,id,id,
        $theme = ','.implode(',',$request->input('theme')).',';

//         文件扩展名
        $ext = $file->getClientOriginalExtension();

//        文件的临时路径
        $realpath = $file->getRealPath();

        //        获取时间
        $time = time();

//        生成文件名   用户id_time()_uniqid组成
        $fileName = $user.'_'.$time.'_'.uniqid().'.'.$ext;

//        进行事务插入数据
        try{
        DB::beginTransaction();
            $opus = new Opus();
            $opus->user_id = $user;
            $opus->name = $request->name;
            $opus->desc = $request->desc;
            $opus->authornotice = $request->authornotice;
            $opus->theme_ids = $theme;
            $opus->cartoon_type_id = $request->cartoontype;
            $opus->user_group_id = $request->usergroup;
            $opus->create_schedule = $request->createschedule;
            $opus->imagepath = 'default';
            $opus->save();
            $id = $opus->id;

            //        封面图片存放路径  用户id/用户id+作品id/  不能作品会变
            $filePath =$user.'/'.($user+$id).'/';

//            把文件存到指定的位置
            $bool = Storage::disk('uploads')->put($filePath.$fileName,file_get_contents($realpath));
//            如果输出到指定位置成功提交
            if($bool)
            {
                $opus->imagepath = $fileName;
                $opus->save();
                DB::commit();
                return redirect('home/author/index');
            } else {
                DB::rollBack();
                return redirect()->back()->withErrors(['uperror' => '添加漫画失败']);
            }

        }catch (Exception $e){
            DB::rollBack();
        }

    }


//    漫画管理页
    public function index($type = 'publish')
    {
        //        用户id8测试
        $user = 8;

        $type = $type == "upd"?"updated_at":"created_at";

        $opus = Opus::where('user_id',$user)->orderBy($type,'desc')->get();

        $info = new Info;

        return view('home/author/index',compact('opus','info','user','type'));
    }


//    修改发表状态
    public function setPublish(Request $request)
    {
//        获取作品id
        $id = $request->publish;

//        修改发表状态
        $opus = Opus::find($id);
        $opus->publish?$opus->publish = 0:$opus->publish = 1;
        $opus->save();


//        返回发表状态
        return response()->json(['id' => $id,'publish' => $opus->publish]);
    }



//    删除漫画
    function del($id)
    {
        $user = 8;
//        获取作品id
        $opusId = $id;

        try{
//            开启事务
            DB::beginTransaction();
//          删除数据
            $opus = Opus::whereRaw('id =? and user_id = ?',[$opusId,$user])->first();

//            查询失败
            if(!$opus){
                DB::rollback();
                return redirect()->back()->withErrors(['error' => '删除失败']);
            }
            $del = $opus->delete();

//            删除失败返回0
            if(!$del){
                DB::rollback();
                return redirect()->back()->withErrors(['error' => '删除失败']);
            }

            $info = new Info;
//            结合 用户id/用户id+作品id 的路径
            $filePath = $info->getFile($user,$opusId);
//            删除该路径的文件夹
            Storage::disk('uploads')->deleteDirectory($filePath);


//        判断该目录下是否有文件如果没有，则删除成功
            $files = Storage::disk('uploads')->files($filePath);
//            如果还有文件则删除失败
            if($files){
                DB::rollback();
                return redirect()->back()->withErrors(['error' => '删除失败']);
            }

//            成功提交数据完成删除
            DB::commit();
            return redirect('home/author/index');

        }catch (Exception $e){
            DB::rollback();
            return redirect()->back()->withErrors(['error' => '删除失败']);
        }

        return redirect('home/author/index');












    }



//    修改漫画页面
    function updPage($id){
        $user = 8;
        $opus = Opus::find($id);
        if(!count($opus))
        {
            return redirect()->back()->withErrors(['error' => '无该作品信息']);
        }
        $category = Category::get();
        $info = new Info();
        return view('home/author/updcartoon',compact('category','opus','info','user'));
    }

//    修改漫画
    function upd(CartoonUpdRequest $request)
    {

        try {
            DB::beginTransaction();
            $theme = ',' . implode(',', $request->input('theme')) . ',';
            $opus = Opus::find($request->id);
            $opus->desc = $request->desc;
            $opus->authornotice = $request->authornotice;
            $opus->theme_ids = $theme;
            $opus->cartoon_type_id = $request->cartoontype;
            $opus->user_group_id = $request->usergroup;
            $opus->create_schedule = $request->createschedule;
            $bool = $opus->save();

//          如果为true这修改成功
            if(!$bool){
                DB::rollBack();
                return redirect()->back()->withErrors(['uperror' => '修改失败']);
            }

            $oriImg=$opus->imagepath;



            $file = $request->file('imagepath');
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

//        生成文件名   用户id_time()_uniqid组成
                    $fileName = $opus->user_id.'_'.$time.'_'.uniqid().'.'.$ext;

                    //        封面图片存放路径  用户id/用户id+作品id/  不能作品会变
                    $filePath =$opus->user_id.'/'.($opus->user_id+$opus->id).'/';

//            把文件存到指定的位置
                    $bool = Storage::disk('uploads')->put($filePath.$fileName,file_get_contents($realpath));

                    //            如果输出到指定位置成功提交
                    if($bool)
                    {
//                        保存新图片名
                        $opus->imagepath = $fileName;
                        $upImgSuccess = $opus->save();
//                        如果图片保存成功
                        if($upImgSuccess){
                            $info = new Info;
//                            删除原图片
                            $updimg = Storage::disk('uploads')->delete($info->getFile($opus->user_id,$opus->id).$oriImg);
//                            如果原图片删除失败则不提交执行数据
                            if(!$updimg){
                                Storage::disk('uploads')->delete($info->getFile($opus->user_id,$opus->id).$opus->imagepath);
                                DB::rollBack();
                                return redirect()->back()->withErrors(['uperror' => '修改失败']);
                            }
                        }

                    } else {
                        DB::rollBack();
                        return redirect()->back()->withErrors(['uperror' => '修改失败']);
                    }

                } else {
                    DB::rollBack();
                    return redirect()->back()->withErrors(['uperror' => '修改失败']);
                }
            }

            DB::commit();
            return redirect('home/author/index');

        }catch (Exception $e){
            DB::rollBack();
            return redirect()->back()->withErrors(['uperror' => '修改失败']);
        }



    }


//    漫画详情页面
    function detail(){
        return view('');
    }



}
