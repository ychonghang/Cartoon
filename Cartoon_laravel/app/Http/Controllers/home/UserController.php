<?php

namespace App\Http\Controllers\home;

use App\Forum;
use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Requests\UserUpdateRequest;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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

        $email = $request->input('email');
        $result = User::where('email',$email)->pluck('id')->toArray();
        $uid = $result[0];
        $arr = array(
            'uid'=>$uid
        );
        DB::table('userinfo')->insert($arr);
        return redirect('https://mail.qq.com/');
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
   //用户的个人中心
    public function PersonalUpdate()
    {
        if(Auth::check()){
            $id = Auth::user()->id;
            $query = DB::table('userinfo')
                ->join('users','userinfo.uid','=','users.id')
                ->select('userinfo.*','users.email','users.avatar','users.name','users.created_at')
                ->where('userinfo.uid','=',$id)
                ->get();
            $asd = Forum::all()
                ->where('uid','=',$id);
            return view('home.personal',['k'=>$query,'s'=>$asd]);
        }
    }
    //用户的信息修改
    public function DatumUpdate(Request $request)
    {
        if(Auth::check()){
            $id = Auth::user()->id;
            if ($request->avatar){
                $dir=public_path().'/image/homeimg';
                $name = time().'.jpg';
                $request->avatar->move($dir,$name);
                DB::table('users')
                    ->where('id','=',$id)
                    ->update(['avatar'=>'image/homeimg/'.$name,'name'=>$request->name]);
            }else{
                DB::table('users')
                    ->where('id','=',$id)
                    ->update(['name'=>$request->name]);
            }
            DB::table('userinfo')
                ->where('uid','=',$id)
                ->update(['tel'=>$request->tel,'sex'=>$request->sex,'birthday'=>$request->birthday?$request->birthday:null,'address'=>$request->address,'citylocation'=>$request->citylocation,'realname'=>$request->realname,]);
        }
        return redirect('home/personal');
    }
    //用户密码的修改
    public function PwdUpdate(UserUpdateRequest $password)
    {
//        dd($password->all());
        if(Auth::check()){
            $id = Auth::user()->id;
            DB::table('users')
                ->where('id','=',$id)
                ->update(['password'=>Hash::make($password->new_password)]);
        }
    }
  //用户个人论坛
    public function fornum(Request $request)
    {
        if(Auth::check()){
            DB::table('forum')->insert($request->toArray());
           $a['uid'] = $request->uid;
           $a['comment']= $request->comment;
           $a['likenum']= $request->likenum;
           return json_encode($a);
        }
    }
  //论坛点赞
    public function dianz(Request $request)
    {
        if(Auth::check()){
          $sd = DB::table('forum')
                ->where('id',$request->id)
                ->update(['likenum'=>'8']);
            return $sd;
        }
    }
    //用户评论
    public function pinlun(Request $request)
    {
       return view('home/amuse');

    }
    //游戏应用
    public function paladin()
    {
        return view('home.amuse');
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
}
