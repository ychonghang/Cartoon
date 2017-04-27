<?php

namespace App\Http\Controllers\home\Author;

use App\Common\Info;
use App\Common\REST;
use App\Http\Requests\CartoonAddRequest;
use App\Http\Requests\CartoonUpdRequest;
use App\Model\Admin\Author;
use App\Model\Admin\Category;
use App\Model\Home\Author\Opus;
use App\Model\Home\Cartoon\Chapter;
use App\Model\Home\Cartoon\ChapterImg;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class IndexController extends Controller
{

    public function becomeAuthor()
    {
         return view('home.author.becomeauthor');
    }

    public function become(Request $request)
    {

            $id = $request->id;
            $author = Author::where('user_id',$id)->first();
            if(count($author)){
                return redirect('/home/author/index');
            }

            $phone = $request->phone;
            $code = $request->code;
            $sessionCode = $request->session()->get('code');

            if($code != $sessionCode){
                return redirect()->back()->withErrors(['uperror' => '验证码输入错误']);
            }

            $author = new Author;
            $author->user_id = $id;
            $author->is_author = 1;
            $bool = $author->save();

            if($bool){
                $request->session()->put('home.user.id',$id);
                return redirect('/home/author/index');
            }

            return redirect()->back()->withErrors(['uperror' => '验证失败']);




    }

    //    发送短信验证
    function verify(Request $request){
        $phone = $request->input('phone','');
        if(empty($phone)){
            return 0;
        }

//        组成数组值
        $randomNum = array_merge(range('a','z'),range('A','Z'),range(0,9));
//        置换键值，在随机取出4个值。
        $randomNum = array_rand(array_flip($randomNum),4);
//        把数组组成字符串
        $randomNum = implode('',$randomNum);
//        发送验证码
        $bool =  $this->sendTemplateSMS($phone,array($randomNum,"1"),"1");

        if($bool){
//            如果发送成功就存session
            $request->session()->put('code',$randomNum);
            return 1;
        }

        return 0;

    }

//    发送验证的验证码
    function sendTemplateSMS($to,$datas,$tempId)
    {

        $accountSid= '8aaf070859aa48b00159acae1d6a020b';

//主帐号Token
        $accountToken= 'b4f112613e5c415792cbce78f486bd88';

//应用Id
        $appId='8aaf070859aa48b00159acae1dfa020f';

//请求地址，格式如下，不需要写https://
        $serverIP='app.cloopen.com';

//请求端口
        $serverPort='8883';

//REST版本号
        $softVersion='2013-12-26';
        // 初始化REST SDK
//        global $accountSid,$accountToken,$appId,$serverIP,$serverPort,$softVersion;
        $rest = new REST($serverIP,$serverPort,$softVersion);
        $rest->setAccount($accountSid,$accountToken);
        $rest->setAppId($appId);

        // 发送模板短信
        // echo "Sending TemplateSMS to $to <br/>";
        $result = $rest->sendTemplateSMS($to,$datas,$tempId);
        if($result == NULL ) {
            echo "result error!";
//             break;
        }
        if($result->statusCode!=0) {
//             echo "error code :" . $result->statusCode . "<br>";
//             echo "error msg :" . $result->statusMsg . "<br>";
            //TODO 添加错误处理逻辑
            return 0;
        }else{
            // echo "Sendind TemplateSMS success!<br/>";
            // 获取返回信息
            $smsmessage = $result->TemplateSMS;
//             echo "dateCreated:".$smsmessage->dateCreated."<br/>";
//             echo "smsMessageSid:".$smsmessage->smsMessageSid."<br/>";
            return 1;
            //TODO 添加成功处理逻辑
        }
    }




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
         $id = session()->get('home.user.id');



        $type = $type == "upd"?"updated_at":"created_at";

        $opus = Opus::where('user_id',$id)->orderBy($type,'desc')->get();

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
//        $user = 8;
////        获取作品id
//        $opusId = $id;


        DB::beginTransaction();
//        作品表
        $result = Opus::where('id',$id)->first();


//        所有的章节id
        $chapter_id = Chapter::select('id')->where('opus_id',$result->id)->get();

        $value = [];
//        如果章节id不为空
        if(!empty($chapter_id)){

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
                            return redirect('/home/author/index');
                        } else {
                            DB::rollBack();
                            return redirect()->back()->withErrors(['uperror' => '删除失败']);
                        }

                    }
                }
            }
        } else {
            if($this->delAllFile($result->user_id,$result->id)){
                DB::commit();
                return redirect('/home/author/index');
            } else {
                DB::rollBack();
                return redirect()->back()->withErrors(['uperror' => '删除失败']);
            }
        }

        DB::rollBack();
        return redirect()->back()->withErrors(['uperror' => '删除失败']);


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





//删除所有文件自定义方法
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



}
