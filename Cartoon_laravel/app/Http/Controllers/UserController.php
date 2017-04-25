<?php

namespace App\Http\Controllers;

use App\Admin_user;
use App\Http\Middleware\Rbac;
use App\Permission;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //用户列表
    public function superList()
    {
        $users = Admin_user::all();
        foreach ($users as $user) {
            $roles = array();
            $a = DB::table('role_admin')->where('admin_id',$user['id'])->pluck('role_id');
            $user->roles = $a;
            foreach ($user->roles as $role) {
                $roles[] = DB::table('roles')->where('id',$role)->value('display_name');
            }
            $user->roles= implode(',', $roles);
        }
//        dd($users->toArray());
        return view('admin.superList', compact('users'));
    }
    //添加用户
    public function superAdd(Request $request)
    {
        if ($request->isMethod('post')) {
            $result = array(
                'name'=> 'required|unique:admin_users,name',
                'email'=>'required|email|unique:admin_users,email',
                'password'=>'required|confirmed|min:6',
                'password_confirmation'=>'required',
            );
            $mess = array(
                'name.required'=>'用户名不能为空',
                'email.required'=>'邮箱不能为空',
                'email.email'=>'邮箱格式不正确',
                'password.required'=>'密码不能空',
                'password.min'=>'密码不能少于六位',
                'password.confirmed'=>'两次密码不一致',
                'password_confirmation.required'=>'确认密码不能为空',
                'name.unique'=>'用户名已经被使用',
                'email.unique'=>'邮箱已经被使用',
            );
            $validate = Validator::make($request -> all(), $result, $mess);
            if ($validate -> fails()){
                    return  back() ->withErrors($validate);
                }else{
                    Admin_user::create(array_merge($request->all(),['icon'=>'image/default.jpg']));
                    return redirect('/admin/super-list');
                }

        }else{
            return view('admin.superAdd');
        }


    }

    //分配角色
    public function attachRole(Request $request,$admin_id)
    {
        if ($request->isMethod('post')) {
            //获取当前用户的角色
            $user = Admin_user::find($admin_id);
            DB::table('role_admin')->where('admin_id', $admin_id)->delete();
            foreach ($request->input('role_id') as $role_id){
                DB::insert('insert into `role_admin` (`admin_id`,`role_id`) value('.$admin_id.' , '.$role_id.')');
            }

            return redirect('/admin/super-list');
        }
        //查询所有的权限
        $roles = Role::all();

        return view('admin.attachRole', compact('roles'));
    }

    //删除管理员
    public function superDelete(Request $request,$admin_id)
    {
        //删除信息
        $role = Admin_user::find($admin_id);
        DB::table('admin_users')->where('id',$admin_id)->delete();
        return redirect('/admin/super-list');
    }

    //修改角色
    public function superUpdate(Request $request, $admin_id)
    {
        if($request->isMethod('post')){
            $user = Admin_user::findOrFail($admin_id);
            $user->update($request->all());
            return redirect('/admin/super-list');
        }
        $user = Admin_user::findOrFail($admin_id);
        return view('admin.superUpdate', compact('user'));
    }
}
