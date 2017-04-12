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