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

//Route::get('/', function () {
//    return view('index');
//});
Route::get('/','home\UserController@index');


Route::get('home/register','home\UserController@register');     //显示注册页面路由
Route::post('home/stoer','home\UserController@stoer');           //注册提交路由
Route::get('verify/{confirmed_code}','home\UserController@emailConfirm');   //给注册的邮箱验证
Route::get('home/login','home\UserController@login');               //邮箱跳转到登录页面
Route::post('home/setLogin','home\UserController@setLogin');       //登录的验证
Route::get('home/loginout','home\UserController@loginout');        //用户退出注销

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
//后台用户添加
Route::post('admin/user-insert','Admin\UserController@userInsert');
Route::get('admin/user-insert','Admin\UserController@showInsert');

//权限管理
Route::get('admin/permission-list', 'PermissionController@permissionList')->middleware('rbac');
Route::any('admin/permission-add', 'PermissionController@permissionAdd');
Route::any('admin/permission-update/{permission_id}', 'PermissionController@permissionUpdate');
Route::get('admin/permission-delete/{permission_id}', 'PermissionController@permissionDelete');
//角色管理
Route::get('admin/role-list', 'RoleController@roleList')->middleware('rbac');
Route::any('admin/role-add', 'RoleController@roleAdd');
Route::any('admin/role-update/{role_id}', 'RoleController@roleUpdate')->middleware('rbac');
Route::get('admin/role-delete/{role_id}', 'RoleController@roleDelete')->middleware('rbac');
Route::any('admin/attach-permission/{role_id}', 'RoleController@attachPermission')->middleware('rbac');
//管理员管理
Route::get('admin/super-list', 'UserController@superList')->middleware('rbac');
Route::any('admin/super-add', 'UserController@superAdd');
Route::any('admin/super-role/{admin_id}', 'UserController@attachRole');
Route::get('admin/super-delete/{admin_id}','UserController@superDelete');
Route::any('admin/super-update/{admin_id}', 'UserController@superUpdate');

//轮播图管理
Route::get('admin/picture-list','Admin\UserController@pictureList');
Route::any('admin/picture-add','Admin\UserController@pictureAdd');
Route::get('admin/picture-delete/{id}','Admin\UserController@pictureDel');
Route::get('admin/picture-box','Admin\UserController@box');

//广告管理
Route::get('admin/advertisement-list','Admin\UserController@advertisementList');
Route::any('admin/advertisement-add','Admin\UserController@advertisementAdd');
Route::get('admin/advertisement-delete/{id}','Admin\UserController@advertisementDel');
Route::get('admin/advertisement-box','Admin\UserController@advertisementBox');
Route::get('admin/advertisement-position','Admin\UserController@advertisementPosition');

//友情链接管理
Route::get('admin/link-list','Admin\UserController@linkList');
Route::any('admin/link-add','Admin\UserController@linkAdd');
Route::get('admin/link-delete/{id}','Admin\UserController@linkDel');
Route::get('admin/link-box','Admin\UserController@linkBox');

//前台问题反馈
Route::any('home/feedback','home\UserController@afeed');
//后台问题反馈
Route::get('admin/feedback','Admin\UserController@feedBack');
Route::get('admin/feedback-delete/{id}','Admin\UserController@feedDel');
Route::any('admin/feedback-feed/{id}', 'Admin\UserController@feed');

//积分管理
Route::get('admin/integral','Admin\UserController@integral');
Route::get('admin/intetimme','Admin\UserController@intetime');