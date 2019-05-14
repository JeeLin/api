<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //通过认证
    // public function pass(Request $request)
    // {
    //     $id = $request->user_id;

    //     User::where('id',$id)->update(['status'=>3]);
    //     return ['success'=> true];
    // }

    public function show()
    {
        $user = User::find(1);
        $url = $user->image_url;
        return json_decode($url,true);
    }

    //个人中心界面信息获取
    public function info(Request $request)
    {
        $id = $request->user_id;
        $user = User::find($id);

        return response()->json([
            'phone' => $user->phone,
            'email' => $user->email,
            'url' => explode(";",$user->image_url)
        ]);
    }

    //用户认证信息
    public function upload(Request $request)
    {
        //判断验证码
        $id = $request->user_id;
        $code = $request->code;
        $user = User::find($id);
        $bool = $user->code;
        if($bool != $code){
            return 1;
        };
        //验证邮箱是否标准
        $email = $request->email;
        $mode = '/\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/';
        if(!preg_match($mode,$email)){
            return 2;
        }
        // 获取表单上传文件
        $file = $request->file('file');
        $extension = $file->getClientOriginalExtension();
        $path = 'upload/images/';
        $i = $request->index;
        $name = $id.'-'.($i+1).'.'.$extension;
        // 移动到框架应用根目录/public/upload/ 目录下
        //此目录需要权限
        $info = $file->move($path,$name);
        //取出用户邮箱信息
        $pic = $user->image_url;
        //第一张时邮箱地址初始化
        if(!$i){
            $pic = "";
        }
        $pic .= $path.$name.';';
        //存入邮箱、图片地址，并改变用户状态
        User::where('id',$id)->update(['status'=>2,'email'=>$email,'image_url'=>$pic]);
        return 3;

        // if ($info) {

        // } else {
        //     // 上传失败获取错误信息
        //     return 3;
        // }
    }

    //手机验证码模拟
    public function phone_code(Request $request)
    {
        $id = $request->user_id;
        $phone = $request->phone;

        $code = 111111;
        $code = rand(0,9);
        for ($i=1; $i < 6; $i++) {
            $code = $code.rand(0,9);
        }

        User::where('id',$id)->update(['phone'=>$phone,'code'=>$code]);
    }

    //重置验证码
    public function set_code(Request $request)
    {
        $id = $request->user_id;

        User::where('id',$id)->update(['code'=>88888888]);
    }

    //用户收藏页展示
    public function show_collection(Request $request)
    {
        $id = $request->user_id;
        return User::find($id)->books()->paginate(6);
    }

    //查询用户认证状态
    public function status(Request $request)
    {
        $id = $request->user_id;

        return User::find($id)->status;
    }
}
