<?php

namespace App\Http\Controllers\Admin\Category;

use App\Common\Info;
use App\Http\Requests\CategoryRequest;
use App\Model\Admin\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{
    //分类主页
    public function index(Request $request)
    {
        $rank = $request->input('rank','');
        $search = $request->input('search','');
        $category = Category::whereRaw("`name` like ? and rank like ?",['%'.$search.'%','%'.$rank.'%'])->paginate(5);
        $category_rank = Category::select('rank')->groupBy('rank')->get();
        return view('admin.category.index',compact('category','search','category_rank','rank'));
    }

//    添加分类
    public function add(CategoryRequest $request)
    {

        Category::create(
            $request->all()
        );

        return redirect('/admin/category/index');

    }

//    查询页面
    public function addPage()
    {
        $category = Category::select('rank')->groupBy('rank')->get();

        return view('admin.category.addpage',compact('category'));
    }

//    删除分类
    public function del($id)
    {
          $category = Category::find($id);
          $category->delete();
          return redirect('/admin/category/index');
    }


//    修改页面
    public function updPage($id)
    {
        $category = Category::select('rank')->groupBy('rank')->get();
        $verify = Category::find($id);
        if($verify)
        {
            return view('admin.category.update',compact('category','verify'));
        }

        return redirect('/admin/category/index');

    }

//    修改数据
    public function upd(Request $request)
    {

        $is_name = Category::whereRaw('name = ? and id <> ?',[$request->name,$request->id])->get();
        if(count($is_name))
        {
            return redirect('/admin/category/update/'.$request->id)
                ->withErrors(['name' => Info::info('分类名已存在')]);
        }

        $category = Category::find($request->input('id'));
        if(!$category){
            return redirect('/admin/category/update/'.$request->id)
                ->withErrors(['handle' => Info::info('修改失败')]);
        }
        $category->name = $request->name;
        $category->rank = $request->rank;
        $result = $category->save();
        if(!$result){
            return redirect('/admin/category/update/'.$request->id)
                ->withErrors(['handle' => Info::info('修改失败')]);
        }

        return redirect('/admin/category/index');
    }




}
