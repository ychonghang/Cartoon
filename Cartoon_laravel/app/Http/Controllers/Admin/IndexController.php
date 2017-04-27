<?php

namespace App\Http\Controllers\admin;

<<<<<<< HEAD
=======
use App\Admin_user;
>>>>>>> 2a495d62d85b26c7e884ed2b53912bb30be3cf57
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
<<<<<<< HEAD

class IndexController extends Controller
{
    public function index()
    {
        //显示后台首页
        return view('admin.index');
=======
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        //显示后台首页
        $id = $request->id;
      $use = DB::table('admin_users')
            ->where('id','=',$id)
            ->select('admin_users.*')
            ->get();
      $a = Admin_user::all();
        return view('admin.index',['use'=>$use],compact('a'));
>>>>>>> 2a495d62d85b26c7e884ed2b53912bb30be3cf57
    }
}
