<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\AdminLoginRequest;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //显示用户信息
    public function userList()
    {
        $users = User::paginate(5);
        return view('admin.userList',compact('users'));
    }

    //用户修改
    public function showUpdate($id)
    {
        //根据id获取单个模型
        $user = User::find($id);
        return view('admin.userUpdate',compact('user'));
    }
    public function userUpdate(Request $request,$id)
    {
        $user = User::find($id);
        $user->name = $request->input('name','');
        $user->age = $request->input('age','');
        $user->class = $request->input('class','');
        $result = $user->save();
        //判断是否修改成功
        if($request){
            return redirect('admin/user-list');
        }else{
            return back();
        }
    }

    //删除用户
    public function userDelete($id)
    {
        //获取用户模型
        $user = User::find($id);
        $user->delete();
        return redirect('admin/user-list');
    }

    //用户详情
    public function userDetails($id)
    {
        //根据id获取单个模型
        $user = User::find($id);
        return view('admin.userDetails',compact('user'));
    }

    //新增用户
    public function showInsert()
    {
        return view('admin.userInsert');
    }

    public function userInsert(Request $request)
    {
        $user = new User();
        $user->name = $request->input('name','');
        $user->age = $request->input('age','');
        $user->class = $request->input('class','');
        $result = $user->save();
        //判断是否添加成功
        if($result){
            return redirect('admin/user-list');
        }else{
            return back();
        }
    }
    //显示后台的登录
    public function login()
    {
        return view('admin/Login');
    }
    //处理后台登录
    public function Setlogin(AdminLoginRequest $request)
    {

      $user=DB::table('admin_users')->select('admin_users.*')->get()->toArray()[0];
      if ($request->name == $user->name||$request->password == $user->password)
      {
         return redirect('admin/user-index');
      }else{
          return redirect('admin/login');
      }

    }
    //后台的退出
    public function OutLogin()
    {
        return redirect('admin/login');
    }

    //娱乐
    public function Game()
    {
        $users=DB::table('game')
            ->select('game.*')
            ->get();
        return view('admin/Game',compact('users'));
    }

    //游戏的添加
    public function Gameadds()
    {
        return view('admin/Gameadd');
    }
    public function Gameadd(Request $request)
    {
        $dir=public_path().'/image/game';
        $name = time().'.jpg';
        $request->img->move($dir,$name);
        DB::table('game')->insert(['img'=>'image/game/'.$name,'name'=>$request->name,'path'=>$request->path]);
        return redirect('admin/Game');
    }
    //删除游戏
    public function Gamedel(Request $request)
    {
        $del = DB::table('game')
            ->where('id',$request->id)
            ->delete();
        if ($del){
            return 111;
        }else{
            return 222;
        }
    }

    //通告
    public function Newpps()
    {
        $newp = DB::table('newpp')
            ->select('newpp.*')
            ->get();
        return view('admin/Newpp',['newp'=>$newp]);
    }
    public function Newp()
    {
        return view('admin/Newpadd');
    }
    //添加通告
    public function Newpadd(Request $request)
    {
        DB::table('newpp')
            ->insert(['path'=>$request->path,'contents'=>$request->contents]);
        return redirect('admin/Newpps');
    }
}
