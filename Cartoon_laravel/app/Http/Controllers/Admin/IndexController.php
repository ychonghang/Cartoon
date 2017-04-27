<?php

namespace App\Http\Controllers\admin;

use App\Admin_user;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
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
    }
}
