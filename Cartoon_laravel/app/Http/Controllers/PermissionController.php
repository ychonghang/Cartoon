<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Rbac;
use App\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PermissionController extends Controller
{
    //显示权限列表
    public function permissionList()
    {
        //查询所有的权限
        $permissions = Permission::all();
        return view('admin.permissionList', compact('permissions'));
    }
    //添加权限表单
    public function permissionAdd(Request $request)
    {
        if ($request->isMethod('post')) {
            $result = array(
                'name'=> 'required|unique:roles,name',
                'display_name' => 'required',
                'description'  => 'required',
            );

            $mess = array(
                'name.required'=>'用户名不能为空',
                'name.unique'=>'用户名已经被使用',
                'display_name.required'=>'权限描述不能为空',
                'description.required'=>'描述不能为空',
            );
            $validate = Validator::make($request -> all(), $result, $mess);
            if ($validate -> fails()) {
                return  back() ->withErrors($validate);
            }else{
                //添加权限操作
                $permission = Permission::create($request->all());
                return redirect('/admin/permission-list');
            }
        }else{
            return view('admin.permissionAdd');
        }
    }

    //修改权限
    public function permissionUpdate(Request $request, $permission_id)
    {
        //修改用户信息
        if ($request->isMethod('post')) {
            $permission = Permission::findOrFail($permission_id);
            $permission->update($request->all());
            return redirect('/admin/permission-list');
        }
        //查询出当前的权限信息
        $permission = Permission::findOrFail($permission_id);
        return view('admin.permissionUpdate', compact('permission'));
    }

    //删除权限
    public function permissionDelete($permission_id)
    {
        //删除信息
        Permission::destroy([$permission_id]);
        return redirect('/admin/permission-list');
    }
}
