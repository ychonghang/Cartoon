<?php

namespace App\Http\Controllers\Admin\author;

use App\Model\Admin\Author;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    //作者主页
    function index(Request $request)
    {
//        查询内容
       $search = $request->input('search','');
        $author = Author::join('users','authors.user_id','=','users.id')
            ->select('user_id','is_author','created_at','updated_at','users.name','authors.id')
            ->where('users.name','like','%'.$search.'%')->orderBy('authors.id','desc')->paginate(1);
        return view('/Admin/author/Index',compact('author','search'));
    }

//  删除作者
    function delAuthor($id)
    {
        $author = Author::where('id',$id)->delete();
//        返回影响行数
        return redirect('/admin/author/index');

    }

//    确认成为
    function via($id,Request $request)
    {
        $search = $request->input('search','');
        $page = $request->input('page','');
        $author = Author::find($id);
        $author->is_author = 1;
        $author->save();
        return redirect('/admin/author/index?search='.$search.'&page='.$page);
    }

}
