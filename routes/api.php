<?php

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Type;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('test', 'UserController@show');

Route::group(['prefix' => 'v1'], function () {
    //轮播图
    Route::get('banner', 'BannerController@index');

    //查找：文本框，视频码
    Route::group(['prefix' => 'search'], function () {
        Route::get('text', 'SearchController@text');//文本框查询
        Route::get('code', 'SearchController@code');//视频码查询
    });

    Route::get('recommend','BookController@recommend' );//直接按顺序推荐，传参page


    Route::group(['prefix' => 'type'], function () {
        Route::get('/',function(){//分类左框
            return Type::limit(6)->get()->toArray();
        });
        Route::get('book','BookController@index');//分类内图书
    });

    Route::group(['prefix' => 'collect'], function () {
        Route::get('show','UserController@show_collection');//个人收藏界面
        Route::get('change', 'CollectionController@change');//个人收藏状态改变
    });

    Route::get('detail', 'Controller@detail');//图书详情页
    Route::get('video', 'Controller@video');//视频url跳转

    Route::group(['prefix' => 'user'], function () {
        //Route::put('users/{id}', function ($id) {});//登录功能
        Route::get('status', 'UserController@status');//用户认证状态查询
        Route::post('upload', 'UserController@upload');//用户认证
        Route::get('code','UserController@phone_code');//模拟获取验证码
        Route::get('set_code','UserController@set_code');//重置验证码
        Route::get('info','UserController@info');//用户中心信息查询
    });
});
