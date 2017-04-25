<?php

namespace App\Http\Controllers\home;

use App\Advertisement;
use App\Feedback;
use App\Friendlink;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Picture;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
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
        return redirect('');
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
    public function  book(){
        return view('home.book');
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

    //首页视图
    public function index(){
        $icon = Picture::all()->where('status',1);
        $advertisement = Advertisement::all()->where('status',1)->where('position',1);
        $advertisement2 = Advertisement::all()->where('status',1)->where('position',2);
        $advertisement3 = Advertisement::all()->where('status',1)->where('position',3);
        $link = Friendlink::all()->where('status',1);
        return view('index',compact('icon','advertisement','advertisement2','advertisement3','link'));
    }

    //反馈视图
    public function afeed(Request $request){
        $id=10;
        $r=User::where('id',$id)->get()->toArray();
        if($r==[]){
            return back()->withErrors('此用户不存在');
        }
        $name=$r[0]['name'];
        if($request->isMethod('post')){
            $back= Feedback::create([
                'back'=>$request->back,
                'name'=>$name,
            ]);
            return redirect('/home/feedback');
        }
        $a = Feedback::all();
//        dd($a->toArray());
        return view('home.feedback',compact('a'));
    }

}
