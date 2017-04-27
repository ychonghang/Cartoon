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

<<<<<<< HEAD

//Route::get('/', function () {
//    return view('index');
//});
Route::get('/','home\UserController@index');


=======
Route::get('/', function () {
    return view('/home/index');
});

Route::get('home/index','home\UserController@index');
>>>>>>> 2a495d62d85b26c7e884ed2b53912bb30be3cf57
Route::get('home/register','home\UserController@register');     //显示注册页面路由
Route::post('home/stoer','home\UserController@stoer');           //注册提交路由
Route::get('verify/{confirmed_code}','home\UserController@emailConfirm');   //给注册的邮箱验证
Route::get('home/login','home\UserController@login');               //邮箱跳转到登录页面
Route::post('home/setLogin','home\UserController@setLogin');       //登录的验证
Route::get('home/loginout','home\UserController@loginout');        //用户退出注销
<<<<<<< HEAD
=======
Route::get('home/personal','home\UserController@PersonalUpdate');  //用户个人中心
Route::post('home/DatumUpdate','home\UserController@DatumUpdate');  //用户修改资料
Route::post('home/PwdUpdate','home\UserController@PwdUpdate');       //用户密码修改

Route::post('home/photo','home\UserController@photo');                 //相册添加
Route::get('home/photodel','home\UserController@photodel');           //相册删除

Route::get('home/fors','home\UserController@fors');                 //论坛遍历
Route::get('home/fornum','home\UserController@fornum');              //用户论坛发送
Route::get('home/Dianz','home\UserController@dianz');                //点赞功能
Route::get('home/cpin','home\UserController@cpin');                  //差评赞
Route::post('home/Pinlun','home\UserController@pinlun');             //评论功能
Route::get('home/Paladin','home\UserController@paladin');            //游戏应用
>>>>>>> 2a495d62d85b26c7e884ed2b53912bb30be3cf57

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
<<<<<<< HEAD
//后台用户添加
Route::post('admin/user-insert','Admin\UserController@userInsert');
Route::get('admin/user-insert','Admin\UserController@showInsert');

//权限管理
Route::get('admin/permission-list', 'PermissionController@permissionList')->middleware('rbac');
=======
//后台用户添
Route::post('admin/user-insert','Admin\UserController@userInsert');
Route::get('admin/user-insert','Admin\UserController@showInsert');

//后台游戏添加
Route::get('admin/Game','Admin\UserController@Game');
Route::get('admin/Gameadds','Admin\UserController@Gameadds');
Route::get('admin/Gamedel','Admin\UserController@Gamedel');   //删除
Route::post('admin/Gameadd','Admin\UserController@Gameadd');  //添加
Route::get('admin/Newpps','Admin\UserController@Newpps');     //通告
Route::get('admin/Newp','Admin\UserController@Newp');  //添加通告
Route::post('admin/Newpadd','Admin\UserController@Newpadd');  //添加通告




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
>>>>>>> 2a495d62d85b26c7e884ed2b53912bb30be3cf57
Route::any('admin/permission-add', 'PermissionController@permissionAdd');
Route::any('admin/permission-update/{permission_id}', 'PermissionController@permissionUpdate');
Route::get('admin/permission-delete/{permission_id}', 'PermissionController@permissionDelete');
//角色管理
<<<<<<< HEAD
Route::get('admin/role-list', 'RoleController@roleList')->middleware('rbac');
=======
Route::get('admin/role-list', 'RoleController@roleList');
>>>>>>> 2a495d62d85b26c7e884ed2b53912bb30be3cf57
Route::any('admin/role-add', 'RoleController@roleAdd');
Route::any('admin/role-update/{role_id}', 'RoleController@roleUpdate');
Route::get('admin/role-delete/{role_id}', 'RoleController@roleDelete');
Route::any('admin/attach-permission/{role_id}', 'RoleController@attachPermission');
//管理员管理
<<<<<<< HEAD
Route::get('admin/super-list', 'UserController@superList')->middleware('rbac');
=======
Route::get('admin/super-list', 'UserController@superList');
>>>>>>> 2a495d62d85b26c7e884ed2b53912bb30be3cf57
Route::any('admin/super-add', 'UserController@superAdd');
Route::any('admin/super-role/{admin_id}', 'UserController@attachRole');
Route::get('admin/super-delete/{admin_id}','UserController@superDelete');
Route::any('admin/super-update/{admin_id}', 'UserController@superUpdate');

<<<<<<< HEAD
//轮播图管理
Route::get('admin/picture-list','Admin\UserController@pictureList')->middleware('rbac');
Route::any('admin/picture-add','Admin\UserController@pictureAdd');
Route::get('admin/picture-delete/{id}','Admin\UserController@pictureDel');
Route::get('admin/picture-box','Admin\UserController@box');

//广告管理
Route::get('admin/advertisement-list','Admin\UserController@advertisementList')->middleware('rbac');
Route::any('admin/advertisement-add','Admin\UserController@advertisementAdd');
Route::get('admin/advertisement-delete/{id}','Admin\UserController@advertisementDel');
Route::get('admin/advertisement-box','Admin\UserController@advertisementBox');
Route::get('admin/advertisement-position','Admin\UserController@advertisementPosition');

//友情链接管理
Route::get('admin/link-list','Admin\UserController@linkList')->middleware('rbac');
Route::any('admin/link-add','Admin\UserController@linkAdd');
Route::get('admin/link-delete/{id}','Admin\UserController@linkDel');
Route::get('admin/link-box','Admin\UserController@linkBox');

//前台问题反馈
Route::any('home/feedback','home\UserController@afeed');
//后台问题反馈
Route::get('admin/feedback','Admin\UserController@feedBack')->middleware('rbac');
Route::get('admin/feedback-delete/{id}','Admin\UserController@feedDel');
Route::any('admin/feedback-feed/{id}', 'Admin\UserController@feed');

//积分管理
Route::get('admin/integral','Admin\UserController@integral')->middleware('rbac');
Route::get('admin/integral-delete/{id}','Admin\UserController@inteDel');
=======
>>>>>>> 2a495d62d85b26c7e884ed2b53912bb30be3cf57
