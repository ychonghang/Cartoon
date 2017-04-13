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

Route::get('home/register','home\UserController@register');     //前台显示注册页面路由
Route::post('home/stoer','home\UserController@stoer');           //前台注册提交路由
Route::get('verify/{confirmed_code}','home\UserController@emailConfirm');   //前台给注册的邮箱验证
Route::get('home/login','home\UserController@login');               //前台邮箱跳转到登录页面
Route::post('home/setLogin','home\UserController@setLogin');       //前台登录的验证
Route::get('home/loginout','home\UserController@loginout');        //前台用户退出注销
Route::get('home/personal','home\UserController@personal');      //前台个人中心

//前台    S/A级漫画 页面
Route::get('home/S-A','home\UserController@SA');
//前台 排行榜页面
//Route::get('home/rank','home\UserController@rank');

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