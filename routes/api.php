<?php

use Illuminate\Http\Request;

Route::get('test', 'UserController@show');

Route::group(['prefix' => 'v2'], function () {
    //用户
    Route::group(['prefix' => 'user'], function () {
        Route::get('onload', 'UserController@onload');//用户登录  done
        Route::get('info', 'UserController@info');//用户页信息
        Route::get('upload', 'UserController@upload');//用户认证信息 done
        //等待审核 https://console.cloud.tencent.com/sms/smsContent/1400211775/0/10
        Route::post('code', 'CodeController@code');//获取10分钟的验证码,需要连接接口 done
        // Route::get('set_code','UserController@set_code');//重置验证码，与上面整合

        Route::get('status', 'UserController@status');//用户认证状态查询 done

        // Route::get('pass', 'UserController@pass');//用户认证通过
    });

    //轮播图
    Route::get('banner', 'BannerController@index'); //   done

    //查找：文本框，视频码 done
    Route::group(['prefix' => 'search'], function () {
        Route::get('text', 'SearchController@text');//文本框查询  done
        Route::get('code', 'SearchController@code');//视频码查询  done
    });

    //推荐
    Route::get('recommend','BookController@recommend' );//需要大改

    //分类
    Route::group(['prefix' => 'type'], function () {
        // Route::get('/',function(){//分类左框
        //     return Type::limit(6)->get()->toArray();
        // });
        Route::get('type','BookController@show');//分类左框，大改
        Route::get('book','BookController@index');//分类内图书
    });

    //图书
    Route::group(['prefix' => 'book'], function () {
        Route::get('detail', 'Controller@show_detail');//图书详情页 done
        Route::get('video', 'Controller@video');//视频url跳转 done
    });

    //收藏
    Route::group(['prefix' => 'collect'], function () {
        Route::get('show','UserController@show_collection');//个人收藏界面 done
        Route::get('change', 'CollectionController@change');//个人收藏状态改变 done
    });

    //用户行为
    Route::group(['prefix' => 'return'], function () {
        Route::get('disincline', 'LogController@disincline');//不感兴趣 done
        //微信取消分享回调
        // Route::get('share', 'LogController@share');//分享行为
    });
});


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

    Route::get('detail', 'Controller@show_detail');//图书详情页
    Route::get('video', 'Controller@video');//视频url跳转

    Route::group(['prefix' => 'user'], function () {
        Route::get('onload', 'UserController@onload');//登录功能
        Route::get('status', 'UserController@status');//用户认证状态查询
        Route::post('upload', 'UserController@upload');//用户认证
        Route::get('code','UserController@phone_code');//模拟获取验证码
        Route::get('set_code','UserController@set_code');//重置验证码
        Route::get('info','UserController@info');//用户中心信息查询

        // Route::get('pass', 'UserController@pass');//用户认证通过
    });
    Route::group(['prefix' => 'return'], function () {
        Route::get('onload', 'LogController@disincline');//不感兴趣
        // Route::get('status', 'UserController@status');//用户认证状态查询
        // Route::post('upload', 'UserController@upload');//用户认证
        // Route::get('code','UserController@phone_code');//模拟获取验证码
        // Route::get('set_code','UserController@set_code');//重置验证码
        // Route::get('info','UserController@info');//用户中心信息查询

        // Route::get('pass', 'UserController@pass');//用户认证通过
    });
});
