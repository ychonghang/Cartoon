<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\AdminLoginRequest;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
       Auth::attempt(['name'=> $request->input('name'),'password'=> $request->input('password')]);
        return view('admin/user-index');
    }
}
