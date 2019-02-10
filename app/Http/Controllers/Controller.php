<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Video;
use App\Models\Collection;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    //图书详情页
    //参数 图书id 用户id
    //返回数组包含 图书信息 章节信息 收藏状态
    public function show_detail(Request $request)
    {
        $user_id = $request->user_id;
        $book_id = $request->book_id;

        $book = Book::where('id',$book_id)->get()->toArray();
        $catalog = Video::where('book_id',$book_id)->orderBy('order','asc')->get();
        $array = array('user_id' => $user_id,'book_id' => $book_id);
        $res = Collection::where($array)->get()->count()?1:0;

        return response()->json(['book'=>$book,'catalog'=>$catalog,'coll_status'=>$res]);
    }

    //获取视频url，播放视频
    public function video(Request $request)
    {
        $book_id = $request->book_id;
        $order = $request->order;

        return Video::where('book_id',$book_id)->where('order',$order)->select('video_url')->get();
    }
}
