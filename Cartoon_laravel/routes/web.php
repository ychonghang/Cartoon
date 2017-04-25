<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('home/register','home\UserController@register');     //显示注册页面路由
Route::post('home/stoer','home\UserController@stoer');           //注册提交路由
Route::get('verify/{confirmed_code}','home\UserController@emailConfirm');   //给注册的邮箱验证
Route::get('home/login','home\UserController@login');               //邮箱跳转到登录页面
Route::post('home/setLogin','home\UserController@setLogin');       //登录的验证
Route::get('home/loginout','home\UserController@loginout');        //用户退出注销
Route::get('home/personal','home\UserController@PersonalUpdate');  //用户个人中心
Route::post('home/DatumUpdate','home\UserController@DatumUpdate');  //用户修改资料
Route::post('home/PwdUpdate','home\UserController@PwdUpdate');       //用户密码修改
Route::get('home/Fornum','home\UserController@fornum');              //用户论坛发送
Route::get('home/Dianz','home\UserController@dianz');                //点赞功能
Route::post('home/Pinlun','home\UserController@pinlun');             //评论功能
Route::get('home/Paladin','home\UserController@paladin');            //游戏应用

//前台    S/A级漫画 页面
Route::get('home/S-A','home\UserController@SA');
//前台 排行榜页面
Route::get('home/rank','home\UserController@rank');
//前台 漫画详情页面
Route::get('home/book','home\UserController@book');
//前台 个人中心 书架
Route::get('home/shelf','home\UserController@shelf');
//前台 个人资料
Route::get('home/data','home\UserController@data');

//后台的登录
Route::get('admin/login','Admin\UserController@login');
//后台的验证
Route::post('admin/Setlogin','Admin\UserController@Setlogin');
//后台首页显示
Route::get('admin/user-index','Admin\IndexController@index');
//后台用户信息
Route::get('admin/user-list','Admin\UserController@userList');
//后台用户修改
Route::get('admin/user-update/{id}','Admin\UserController@showUpdate');
Route::post('admin/user-update/{id}','Admin\UserController@userUpdate');
//后台用户删除
Route::get('admin/user-delete/{id}','Admin\UserController@userDelete');
//后台用户详情
Route::get('admin/user-details/{id}','Admin\UserController@userDetails');
//后台用户添
Route::post('admin/user-insert','Admin\UserController@userInsert');
Route::get('admin/user-insert','Admin\UserController@showInsert');






/*↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓hhhh↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓↓*/
//后台
Route::group(['prefix' => 'admin','namespace' => 'Admin'],function(){

//    作者管理
    Route::group(['prefix' => 'author','namespace' => 'author'],function (){
//        作者主页
        Route::get('index','IndexController@index');

//        删除作者
        Route::get('del/{id}','IndexController@delAuthor');

//        确认通过验证
        Route::get('via/{id}','Indexcontroller@via');

    });


//    分类管理
    Route::group(['prefix' => 'category','namespace' => 'Category'],function (){

//        分类主页
        Route::get('index','IndexController@index');

//        分类添加
        Route::post('add','IndexController@add');

//        分类添加页面
        Route::get('add','IndexController@addPage');

//        分类删除
        Route::get('delete/{id}','IndexController@del');

        Route::get('update/{id}','IndexController@updPage');

        Route::post('update','IndexController@upd');

    });

});











//前台
Route::group(['prefix' => 'home','namespace' => 'home'],function (){

//    作者
    Route::group(['prefix' => 'author','namespace' => 'Author'],function (){

//        漫画添加页
        Route::get('add','IndexController@addPage');

//        添加漫画
        Route::post('add','IndexController@add');

//        漫画管理页
        Route::get('index/{type?}','IndexController@index');

//        漫画发表状态转变
        Route::post('Publish','IndexController@setPublish');

//        删除漫画
        Route::get('del/{id}','IndexController@del');

//      修改漫画页面
        Route::get('upd/{id}','IndexController@updPage');

//        修改漫画
        Route::post('upd','IndexController@upd');


    });
});


/*↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑hhhh↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑*/




//权限管理
Route::get('admin/permission-list', 'PermissionController@permissionList');
Route::any('admin/permission-add', 'PermissionController@permissionAdd');
Route::any('admin/permission-update/{permission_id}', 'PermissionController@permissionUpdate');
Route::get('admin/permission-delete/{permission_id}', 'PermissionController@permissionDelete');
//角色管理
Route::get('admin/role-list', 'RoleController@roleList');
Route::any('admin/role-add', 'RoleController@roleAdd');
Route::any('admin/role-update/{role_id}', 'RoleController@roleUpdate');
Route::get('admin/role-delete/{role_id}', 'RoleController@roleDelete');
Route::any('admin/attach-permission/{role_id}', 'RoleController@attachPermission');
//管理员管理
Route::get('admin/super-list', 'UserController@superList');
Route::any('admin/super-add', 'UserController@superAdd');
Route::any('admin/super-role/{admin_id}', 'UserController@attachRole');
Route::get('admin/super-delete/{admin_id}','UserController@superDelete');
Route::any('admin/super-update/{admin_id}', 'UserController@superUpdate');

