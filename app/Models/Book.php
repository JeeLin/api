<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    //隐藏部分
    protected $hidden = [
        'created_at', 'updated_at',
    ];

    //书籍所属类型
    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    //图书与用户多对多
    public function users()
    {
        return $this->belongsToMany(User::class, 'collections', 'book_id', 'user_id');//注意参数格式
    }

   public function collections()
    {
        return $this->hasMany('App\Models\Collection', 'book_id', 'id');
    }


    //视频
    public function video()
    {
        return $this->hasMany(Video::class);
    }
}
