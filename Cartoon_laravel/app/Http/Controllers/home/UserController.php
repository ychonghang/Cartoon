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


use App\Advertisement;
use App\Feedback;
use App\Friendlink;
use App\Integral;
use App\Picture;

use App\Forum;
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
            $qaz = DB::table('newpp')
                  ->select('newpp.*')
                  ->get();
            $phot = DB::table('photo')
                  ->where('uid','=',$id)
                  ->select('photo.*')
                  ->get();
            return view('home.personal',['k'=>$query,'s'=>$asd,'qaz'=>$qaz,'phot'=>$phot]);
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
    //论坛
    public function fors()
    {
       $use = DB::table('forum')
           ->join('users','forum.uid','=','users.id')
            ->select('forum.*','users.name','users.avatar')
            ->get();
        $ton = DB::table('newpp')
            ->select('newpp.*')->get();
        return view('home/Fornum',['use'=>$use,'qaz'=>$ton]);
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
        $like = DB::table('forum')
                ->where('id',$request->id)
                ->value('likenum');
          $sd = DB::table('forum')
                ->where('id',$request->id)
                ->update(['likenum'=>$like+1]);
            if ($sd){
                return 111;
            }else{
                return 222;
            }
        }
    }
    //差评赞
    public function cpin(Request $request)
    {
            $ss = DB::table('forum')
                ->where('id',$request->id)
                ->value('nolike');
            $df = DB::table('forum')
                ->where('id',$request->id)
                ->update(['nolike'=>$ss+1]);
            if($df){
                return 111;
            }else{
                return 222;
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
        $users = DB::table('game')->select('game.*')->get();
        $ton = DB::table('newpp')
            ->select('newpp.*')->get();
        return view('home.amuse',['users'=>$users,'pp'=>$ton]);
    }
    //相册的添加
    public function photo(Request $request)
    {
        $id = Auth::user()->id;
        $dir=public_path().'/image/photo';
        $name = time().'.jpg';
        $request->paths->move($dir,$name);
        DB::table('photo')->insert(['uid'=>$id,'paths'=>'image/photo/'.$name]);
        return redirect('home/personal');
    }
    //相册的删除
    public function photodel(Request $request)
    {
        $del = DB::table('photo')
            ->where('id',$request->id)
            ->delete();
        if ($del){
            return 111;
        }else{
            return 222;
        }
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


    //首页视图
    public function index(){
        if (Auth::check()){
            $email = Auth::user()->email;
            $gral = Integral::all()->where('email',$email)->toArray();
            if(count($gral) == 0){
                Integral::create([
                    'email'=>$email,
                    'gral'=> 1,
                    'time'=> date('Y-m-d',time()),
                ]);

            }else{
                $time = strtotime(date('Y-m-d',time()));
                foreach ($gral as $k){
                    $oldtime = strtotime($k['time']);
                    if (abs($time - $oldtime) >= 86400){
                        $gr = $k['gral'];
                        $gr += 1;
                        Integral::where('email',$email)->update([
                            'gral'=>$gr,
                            'time'=>date('Y-m-d',time()),
                        ]);
                    }
                }

            }

        }

        $icon = Picture::all()->where('status',1);
        $advertisement = Advertisement::all()->where('status',1)->where('position',1);
        $advertisement2 = Advertisement::all()->where('status',1)->where('position',2);
        $advertisement3 = Advertisement::all()->where('status',1)->where('position',3);
        $link = Friendlink::all()->where('status',1);
        return view('index',compact('icon','advertisement','advertisement2','advertisement3','link'));

    }

    //反馈视图
    public function afeed(Request $request){
        $id = Auth::user()->id;
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
