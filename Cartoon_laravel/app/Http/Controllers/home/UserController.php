<?php

namespace App\Http\Controllers\home;

use App\Common\Info;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Model\Admin\Category;
use App\Model\Home\Author\Opus;
use App\Model\Home\Cartoon\Chapter;
use App\Model\Home\ShowPage\OpusComment;
use App\Model\Home\ShowPage\Reply;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    //显示注册页面
    public function register(){
        return view('home.register');
    }
    //保存用户信息
    public function stoer(UserRegisterRequest $request)
    {
        $data = [
            'avatar'=>'image/121.jpg',
            'confirmed_code'=>str_random(10)
        ];
       $user = User::create(array_merge($request->all(),$data));
        //发送邮件  给注册的邮箱发送
        $view = 'home.emailConfired';    //发送的视图
        $subject = '请验证邮箱';  //标题
        $this->sendEmail($user,$view,$subject,$data);
        return redirect('/');
        //$this->sendEmail(用户信息，视图，标题，验证信息)
    }
    public function sendEmail($user,$view,$subject,$data)
    {
        Mail::send($view,$data,function($m) use ($subject,$user){
            $m->to($user->email)->subject($subject);
        });
    }

    //验证邮箱
    public function emailConfirm($code)
    {
        //查询与之匹配的这个用户
        $user = User::where('confirmed_code',$code)->first();
        //判断是否空值 空返回首页  有值就改is_cofirmed  为1 默认是0
        if(is_null($user)){
            return redirect('/');
        }
        $user->confirmed_code = str_random(10);
        $user->is_cofirmed = 1;
        $user->save();
        return redirect('/home/login');  //跳转到登录页面
    }

    //显示登录视图
    public function login()
    {
        return view('home.login');
    }
    //处理登录
        public function setLogin(UserLoginRequest $request)
    {
       //dd($request->all());
        //验证
        $flag = Auth::attempt(['email'=> $request->input('email'),'password'=> $request->input('password')]);
        return redirect('/');
    }
    //用户的退出注销
    public function loginout()
    {
        Auth::logout();
        return redirect('/');
    }

    // 显示S/A漫画  页面
    public function SA()
    {
        return view('home.sss');
    }
    //显示前台个人中心视图
    public function personal()
    {
        return view('home.personal');
    }

    //显示排行榜页面
    public function rank(){
        return view('home.rank');
    }

    //显示漫画详情页
    public function  book($id){
//        接受作品id
        $opus = Opus::find($id);
        if(empty($opus)){
            return redirect()->back();
        }
        $info = new Info();

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

        $strclass = implode(' /',$classify);


        $chapters = Chapter::where('opus_id',$id)->orderBy('created_at','ASC')->orderBy('tochapter','ASC')->get();

        $user = DB::table('users')->select('name')->where('id',$opus->user_id)->first();

//        作者有几个作品
        $opusCount = Opus::where('user_id',$opus->user_id)->count();

//     该作品下有及格评论
        $opuscomment = OpusComment::join('users','users.id','=','opus_comments.user_id')
            ->select('users.name','content','storey','created_at','opus_comments.id',"user_id")
            ->where('opus_id',$id)
            ->orderBy('created_at','desc')
            ->offset(0)
            ->limit(10)
            ->get();

//        获取回复评论信息
        $reply = Reply::join('users','users.id','=','replys.user_id')->select('replys.content','users.name',
            "replys.created_at",'replys.touser_id','replys.storey','replys.user_id')->where('opus_id',$id)
            ->orderBy('replys.created_at','ASC')->get();


//                           1.作品信息  2.章节信息  3.自定义Info 4.漫画类型   5.用户群+题材  6.用户名  7作者有几个作品  8该作品评论
        return view('home.book',compact('opus','chapters','info','type','strclass','user','opusCount','opuscomment','reply'));
    }

    //显示个人中心书架
    public function shelf()
    {
        return view('home.shelf');
    }
    //显示个人资料
    public function data(){
        return view('home.data');
    }
}
