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
    return view('welcome');
});
//第三周考试
//登录
//Route::get('/login',function (){
//    return view('three.login');
//});
//Route::post('/login','Three\LoginController@login');
//
////管理页面
//Route::get('/admin',function (){
//    return view('admin');
//});
//Route::get('/admin','Three\AdminController@index')->middleware('checklogin');

//通过路由地址访问控制器方法

//Route::get('/news','NewsController@index');
//Route::get('/news/add',function (){
//    return view('news.add');
//});
//Route::post('/news/save','NewsController@save');
//Route::get('/news/update/{id}','NewsController@update');
//Route::get('/news/delete/{id}','NewsController@delete');
//Route::post('/news/title','NewsController@updateTitle');

/**
 * 登陆
 */
Route::get('/login','LoginController@index');
Route::post('/login/login','LoginController@login');
//
///**
// * 后台的功能
// */
Route::group(['namespace'=>'admin','prefix'=>'admin','middleware'=>'adminlogin'],function (){
    Route::get('/','IndexController@index');
    //班级
    Route::get('/classes',function (){
        return 'this is classes';
    });
    //违纪
    Route::get('/discipline',function (){
        return 'this is discipline';
    });
    //成绩
    Route::get('/scores',function (){
        return 'this is scores';
    });
    //卫生
    Route::get('/health',function (){
        return 'this is health';
    });
    //安全
    Route::get('/safe',function (){
        return 'this is safe';
    });

//        //分页
//    Route::get('/goods',function (){
//        return view('admin.goods');
//    });
//    //分页-ajax数据获取
//    Route::get('/goods/ajaxlist','GoodsController@ajaxlist');
//    //批量删除-路由地址
//    Route::post('/goods/delete','GoodsController@ajaxdelete');
//    //商品上传
//    Route::get('/goods/add',function (){
//       return view('admin.goodsadd');
//    });
//    Route::post('/goods/save','GoodsController@save');
});
