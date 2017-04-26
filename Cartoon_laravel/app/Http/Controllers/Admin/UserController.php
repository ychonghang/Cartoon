<?php

namespace App\Http\Controllers\Admin;

use App\Advertisement;
use App\Feedback;
use App\Friendlink;
use App\Integral;
use App\Picture;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\AdminLoginRequest;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

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
        return view('admin.index');
    }

    //显示图片
    public function pictureList()
    {

        $pic = Picture::all();
        return view('admin.pictureList',compact('pic'));

    }
    //轮播图状态
    public function box(Request $request)
    {
           $id=$request->id;
           if ($id){
               $sta = Picture::find($id);
               $sta->status = $sta->status == 1? 0 :1;
               $result = $sta->save();
           }

    }

    //添加图片
    public function pictureAdd(Request $request)
    {
        if ($request->isMethod('post')) {
            $result = array(
                'name' => 'required|unique:advertisements,name',
                'pic' => 'required',
            );
            $mess = array(
                'name.required' => '用户名不能为空',
                'name.unique' => '用户名已经被使用',
                'pic.required' => '图片不能为空，上传图片 一、268*355     二、398*175',
            );
            $validate = Validator::make($request->all(), $result, $mess);
            if ($validate->fails()) {
                return back()->withErrors($validate);
            } else {
                $file = $request->file('pic');
                // 文件是否上传成功
                if ($file->isValid()) {
                    // 获取文件相关信息
                    $originalName = $file->getClientOriginalName(); // 文件原名
                    $ext = $file->getClientOriginalExtension();     // 扩展名
                    $realPath = $file->getRealPath();   //临时文件的绝对路径
                    $type = $file->getClientMimeType();     // image/jpeg
                    // 上传文件
                    $aa = date('Y-m-d-H-i-s') . '-' . uniqid() . '.' . $ext;
                    $filename = array(
                        'pic' => $aa,
                    );
                    $result = Picture::create(array_merge($request->all(), $filename));
                    // 使用我们新建的uploads本地存储空间（目录）
                    $bool = Storage::disk('uploads')->put($aa, file_get_contents($realPath));
                }
                return redirect('/admin/picture-list');
            }
        }else{
            return view('admin.pictureAdd');
        }
    }

    //删除图片
    public function pictureDel(Request $request,$id)
    {
        //删除信息
        $pic = Picture::find($id);
        DB::table('pictures')->where('id',$id)->delete();
        return redirect('/admin/picture-list');
    }

    //显示广告
    public function advertisementList()
    {
        $pic = Advertisement::all();
        return view('admin.advertisementList',compact('pic'));
    }

    //添加广告
    public function advertisementAdd(Request $request)
    {
        if ($request->isMethod('post')) {
            $result = array(
                'name'=> 'required|unique:advertisements,name',
                'pic'=>'required',
                'af'=>'required',
            );
            $mess = array(
                'name.required'=>'用户名不能为空',
                'name.unique'=>'用户名已经被使用',
                'af.required'=>'链接不能为空',
                'pic.required'=>'图片不能为空，上传图片 头部:1920*147 左边:960*90 右边:218*208',
            );
            $validate = Validator::make($request -> all(), $result, $mess);
            if ($validate -> fails()) {
                return  back() ->withErrors($validate);
            }else{
                $file = $request->file('pic');
                // 文件是否上传成功
                if ($file->isValid()) {
                    // 获取文件相关信息
                    $originalName = $file->getClientOriginalName(); // 文件原名
                    $ext = $file->getClientOriginalExtension();     // 扩展名
                    $realPath = $file->getRealPath();   //临时文件的绝对路径
                    $type = $file->getClientMimeType();     // image/jpeg
                    // 上传文件
                    $aa = date('Y-m-d-H-i-s') . '-' . uniqid() . '.' . $ext;
                    $filename = array(
                        'pic' => $aa,
                    );
                    $result = Advertisement::create(array_merge($request->all(),$filename));
                    // 使用我们新建的uploads本地存储空间（目录）
                    $bool = Storage::disk('uploads')->put($aa, file_get_contents($realPath));
                }
                return redirect('/admin/advertisement-list');
            }
        }else{
            return view('admin.advetisementAdd');
        }
    }

    //删除广告
    public function advertisementDel(Request $request,$id)
    {
        //删除信息
        $pic = Advertisement::find($id);
        DB::table('advertisements')->where('id',$id)->delete();
        return redirect('/admin/advertisement-list');
    }

    //广告状态
    public function advertisementBox(Request $request)
    {
        $id=$request->id;
        if ($id){
            $sta = Advertisement::find($id);
            $sta->status = $sta->status == 1? 0 :1;
            $result = $sta->save();
        }
    }

    //广告位置
    public function advertisementPosition(Request $request)
    {
        $id = $request->id;
        if( $request->position == '头部'){
            $pos = Advertisement::find($id);
            $pos->position = 1;
            $result = $pos->save();
        }elseif ($request->position == '左边'){
            $pos = Advertisement::find($id);
            $pos->position = 2;
            $result = $pos->save();
        }elseif($request->position == '右边'){
            $pos = Advertisement::find($id);
            $pos->position = 3;
            $result = $pos->save();
        }
    }




    //合作小伙伴
    public function linkList()
    {
        $pic = Friendlink::all();
        return view('admin.linkList',compact('pic'));
    }

    //添加链接
    public function linkAdd(Request $request)
    {
        if ($request->isMethod('post')) {
            $result = array(
                'name'=> 'required|unique:advertisements,name',
                'pic'=>'required',
                'af'=>'required',
            );
            $mess = array(
                'name.required'=>'用户名不能为空',
                'name.unique'=>'用户名已经被使用',
                'af.required'=>'链接不能为空',
                'pic.required'=>'图片不能为空，上传图片 200*60',
            );
            $validate = Validator::make($request -> all(), $result, $mess);
            if ($validate -> fails()) {
                return  back() ->withErrors($validate);
            }else{
                $file = $request->file('pic');
                // 文件是否上传成功
                if ($file->isValid()) {
                    // 获取文件相关信息
                    $originalName = $file->getClientOriginalName(); // 文件原名
                    $ext = $file->getClientOriginalExtension();     // 扩展名
                    $realPath = $file->getRealPath();   //临时文件的绝对路径
                    $type = $file->getClientMimeType();     // image/jpeg
                    // 上传文件
                    $aa = date('Y-m-d-H-i-s') . '-' . uniqid() . '.' . $ext;
                    $filename = array(
                        'pic' => $aa,
                    );
                    $result = Friendlink::create(array_merge($request->all(),$filename));
                    // 使用我们新建的uploads本地存储空间（目录）
                    $bool = Storage::disk('uploads')->put($aa, file_get_contents($realPath));
                }
                return redirect('/admin/link-list');
            }
        }else{
            return view('admin.linkAdd');
        }
    }

    //删除链接
    public function linkDel(Request $request,$id)
    {
        //删除信息
        $pic = Friendlink::find($id);
        DB::table('friendlinks')->where('id',$id)->delete();
        return redirect('/admin/link-list');
    }

    //链接状态
    public function linkBox(Request $request)
    {
        $id=$request->id;
        if ($id){
            $sta = Friendlink::find($id);
            $sta->status = $sta->status == 1? 0 :1;
            $result = $sta->save();
        }
    }

    //问题反馈
    public function feedBack(){
        $feed = Feedback::all();
        return view('admin.feedBack',compact('feed'));
    }

    //删除反馈
    public function feedDel(Request $request,$id){
        $idd = Feedback::find($id);
            DB::table('feedbacks')->where('id',$id)->delete();
        return redirect('admin.feedBack');
    }

    //回复反馈
    public function feed(Request $request,$id){
        if($request->isMethod('post')){
            $back = Feedback::findOrFail($id);
            $back->update($request->all());
            return redirect('/admin/feedback');
        }
        $back = Feedback::find($id);
        return view('admin.feed',compact('back'));
    }

    //积分视图
    public function integral(){
        $inted = Integral::all();
        return view('admin.inteGral',compact('inted'));
    }

    //积分删除
    public function inteDel(Request $request,$id){
        $idd = Integral::find($id);
        DB::table('integrals')->where('id',$id)->delete();
        return redirect('admin.integral');
    }

}



